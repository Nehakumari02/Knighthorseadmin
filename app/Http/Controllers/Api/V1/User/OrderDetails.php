<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Models\Admin\OrderShipment;
use App\Models\Admin\ProductBooking;
use App\Models\Admin\ProductOrder;

class OrderDetails extends Controller
{
    public function index()
    {
        try {
            $transactions = ProductOrder::where('user_id', auth()->user()->id)
                ->with(['payment_gateway', 'user'])
                ->orderByDesc('id')
                ->get()->map(function ($item) {
                    return [
                        'id'                    => $item->id,
                        'date'                  => $item->date,
                        'trx_id'                => $item->trx_id ?? "",
                        'default_currency_code' => get_default_currency_code(),
                        'amount'                => get_amount($item->payable_price ?? ""),
                        'status'                => $item->status,
                        'status_value'          => 'STATUS_SUCCESS = 1, STATUS_PENDING = 2, STATUS_HOLD = 3, STATUS_REJECTED = 4',
                        'uuid'                  => $item->uuid ?? "",
                        'created_at'            => $item->created_at,
                        'updated_at'            => $item->updated_at,

                    ];
                });

            return Response::success([__("Order details fetched successfully")], [
                'order_list' => $transactions,
            ], 200);
        } catch (\Exception $e) {
            return Response::error([__("Something went wrong! Please try again")], [], 500);
        }
    }



    public function Details(Request $request)
    {
        try {
            $transaction = ProductOrder::where('uuid', $request->uuid)
                ->where('user_id', auth()->user()->id)
                ->with(['payment_gateway', 'user', 'shipments'])
                ->first();

            if (!$transaction) {
                return Response::error([__("Transaction not found")], [], 404);
            }
            $bookingData = $transaction->booking_data->data;
            $shipment    = OrderShipment::with(['shipment', 'product_order'])
            ->where('product_order_id', $transaction->id)
            ->get()
            ->unique('shipment_id');


            $responseData = [
                'transaction' => [
                    'id'                     => $transaction->id,
                    'uuid'                   => $transaction->uuid,
                    'trx_id'                 => $transaction->trx_id,
                    'payment_method'         => $transaction->payment_method,
                    'payment_gateway_charge' => $transaction->total_charge,
                    'status'                 => $transaction->status,
                    'status_value'           => 'STATUS_SUCCESS = 1, STATUS_PENDING = 2, STATUS_HOLD = 3, STATUS_REJECTED = 4',
                    'created_at'             => $transaction->created_at->format('M d, Y h:i A'),
                    'payment_gateway'        => $transaction->payment_gateway,
                    'user'                   => $transaction->user,
                    'order_shipment'         => $shipment,
                ],
                'booking_data' => [
                    'products' => $bookingData->user_cart->data ?? [],

                    'delivery_info' => $bookingData->delivery_info ?? null,
                    'user_cart'     => [
                        'sub_total'       => $bookingData->user_cart->sub_total           ?? 0,
                        'delivery_charge' => $bookingData->delivery_info->delivery_charge ?? 0,
                        'total'           => get_amount($transaction->payable_price ?? 0),
                    ],
                ],
                'currency_symbol' => get_default_currency_symbol(),
            ];

            return Response::success([__("Order details fetched successfully")], $responseData, 200);
        } catch (\Exception $e) {
            return Response::error([__("Something went wrong! Please try again")], [], 500);
        }
    }

    public function paymentHistory()
    {
        try {
            $transactions = ProductOrder::where('user_id', auth()->user()->id)
                ->with(['payment_gateway', 'user'])
                ->get()->map(function ($item) {
                    return [
                        'id'                    => $item->id,
                        'date'                  => $item->date,
                        'order_number'          => $item->trx_id ?? "",
                        'default_currency_code' => get_default_currency_code(),
                        'amount'                => get_amount($item->payable_price ?? ""),
                        'method'                => $item->payment_method ?? "",
                        'uuid'                  => $item->uuid           ?? "",
                        'created_at'            => $item->created_at,
                        'updated_at'            => $item->updated_at,

                    ];
                });

            return Response::success([__("Payment history fetched successfully")], [
                'payment_history' => $transactions,
            ], 200);
        } catch (\Exception $e) {
            return Response::error([__("Something went wrong! Please try again")], [], 500);
        }
    }
}
