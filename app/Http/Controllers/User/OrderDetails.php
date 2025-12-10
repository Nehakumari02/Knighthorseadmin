<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\OrderShipment;
use App\Models\Admin\ProductOrder;
use Illuminate\Http\Request;

class OrderDetails extends Controller
{
    /**
     * Method for view the users history page
     */
    public function index()
    {
        $page_title   = __("Order List");
        $transactions = ProductOrder::where('user_id', auth()->user()->id)->with(['payment_gateway', 'user', 'shipments', 'order'])
            ->orderByDesc('id')
            ->paginate(10);

        return view('user.sections.my-booking.index', compact(
            'page_title',
            'transactions',
        ));
    }

    public function Details($uuid)
    {
        $page_title   = __("Order Details");
        $transactions = ProductOrder::where('uuid', $uuid)->where('user_id', auth()->user()->id)->with(['payment_gateway', 'user', 'shipments.shipment'])
            ->first();
        $shipment = OrderShipment::with(['shipment', 'product_order'])
            ->where('product_order_id', $transactions->id)
            ->get()
            ->unique('shipment_id');

        return view('user.sections.my-booking.details', compact(
            'page_title',
            'transactions',
            'shipment'
        ));
    }

    public function paymentHistory()
    {
        $page_title   = __("Payment History");
        $transactions = ProductOrder::where('user_id', auth()->user()->id)->with(['payment_gateway', 'user'])
            ->get();


        return view('user.sections.payment-history.details', compact(
            'page_title',
            'transactions',
        ));
    }
}
