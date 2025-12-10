<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Response;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Admin\BasicSettings;
use App\Models\Admin\OrderShipment;
use App\Models\Admin\Product;
use App\Models\Admin\ProductOrder;
use App\Models\User;
use App\Models\User\UserWallet;
use Exception;

class BookingLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title   = __("All Logs");
        $transactions = ProductOrder::with(
            'user',
            'gateway_currency:id,name',
        )
            ->paginate(20);

        return view('admin.sections.booking-log.index', compact(
            'page_title',
            'transactions'
        ));
    }


    /**
     * Pending booking-log Logs View.
     * @return view $pending-booking-log-logs
     */
    public function pending()
    {
        $page_title   = __("Pending Logs");
        $transactions = ProductOrder::with(
            'user:id,firstname,email,username,mobile',
            'gateway_currency:id,name',
        )->where('status', 2)->paginate(20);
        return view('admin.sections.booking-log.index', compact(
            'page_title',
            'transactions'
        ));
    }

    /**
     * Complete booking-log Logs View.
     * @return view $complete-booking-log-logs
     */
    public function complete()
    {
        $page_title   = __("Complete Logs");
        $transactions = ProductOrder::with(
            'user:id,firstname,email,username,mobile',
            'gateway_currency:id,name',
        )->where('status', 1)->paginate(20);
        return view('admin.sections.booking-log.index', compact(
            'page_title',
            'transactions'
        ));
    }

    /**
     * Canceled booking-log Logs View.
     * @return view $canceled-booking-log-logs
     */
    public function canceled()
    {
        $page_title   = __("Canceled Logs");
        $transactions = ProductOrder::with(
            'user:id,firstname,email,username,mobile',
            'gateway_currency:id,name',
        )->where('status', 4)->paginate(20);
        return view('admin.sections.booking-log.index', compact(
            'page_title',
            'transactions'
        ));
    }

    /**
     * Method for booking log details
     * @param $trx_id
     * @param \Illuminate\Http\Request $request
     */
    public function details(Request $request, $trx_id)
    {
        $page_title = "Booking Details";
        $data       = ProductOrder::with(['payment_gateway','shipments.shipment'])->where('trx_id', $trx_id)->first();
         $shipments = OrderShipment::with(['shipment', 'product_order'])
            ->where('product_order_id', $data->id)
            ->get()
            ->unique('shipment_id');
        if (!$data) {
            return back()->with(['error' => ['Data Not Found!']]);
        }
        return view('admin.sections.booking-log.details', compact(
            'page_title',
            'data',
            'shipments'
        ));
    }

    /**
     * Method for update Status for Booking Logs
     * @param $trx_id
     * @param \Illuminate\Http\Request $request
     */
    public function statusUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status'    => 'required|integer',
            'trxId'     => 'required'
        ]);
        $data = ProductOrder::with(['payment_gateway'])->where('trx_id', $request->trxId)->first();


        $user_cart = $data->booking_data->data->user_cart;

        foreach ($user_cart->data as $item) {
            $id                 = $item->id;
            $product            = Product::where('id', $id)->first();
            $available_quantity = $product->available_quantity;
            $product->update([
                'available_quantity' => $available_quantity + $item->quantity,
            ]);
        }

        if (!$data) {
            return back()->with(['error' =>  ['Data Not Found!']]);
        }

        if ($validator->fails()) {
            return Response::error(['error' => $validator->errors()]);
        }
        $validated     = $validator->validate();
        $basic_setting = BasicSettings::first();
        $user          = User::where('id', $data->user_id)->first();
        $user_wallet   = $user->wallets;

        try {
            $data->update([
                'status'    => $validated['status'],
            ]);

            if ($request->status == '4' &&  $data->type != "cash" ) {

                UserWallet::where('user_id', $user->id)->update([
                    'balance' => $user_wallet->balance + $data->price,
                ]);

            }

        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }

        return redirect()->route('admin.booking.log.index')->with(['success'  => ['Booking Status Updated Successfully.']]);
    }
}
