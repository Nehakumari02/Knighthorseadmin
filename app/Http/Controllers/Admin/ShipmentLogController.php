<?php

namespace App\Http\Controllers\Admin;

use App\Constants\GlobalConst;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Admin\BasicSettings;
use App\Models\Admin\OrderShipment;
use App\Models\Admin\ProductOrder;
use App\Models\User;
use App\Models\User\UserWallet;
use Exception;

class ShipmentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delivered()
    {
        $page_title   = __("Delivered Logs");
        $transactions = OrderShipment::with(
            'product_order',
            'shipment',
        )->where('shipment_status', GlobalConst::DELIVERED)
            ->paginate(20);

        return view('admin.sections.shipment-log.index', compact(
            'page_title',
            'transactions'
        ));
    }


    /**
     * Pending booking-log Logs View.
     * @return view $pending-booking-log-logs
     */
    public function booked()
    {
        $page_title   = __("Booked Logs");
        $transactions = OrderShipment::with(
            'product_order',
            'shipment',
        )->where('shipment_status', GlobalConst::BOOKED)->paginate(20);
        return view('admin.sections.shipment-log.index', compact(
            'page_title',
            'transactions'
        ));
    }

    /**
     * Complete booking-log Logs View.
     * @return view $complete-booking-log-logs
     */
    public function shipment()
    {
        $page_title   = __("Shipment Logs");
        $transactions = OrderShipment::with(
            'product_order',
            'shipment',
        )->where('shipment_status', GlobalConst::READY_FOR_SHIPPING)->paginate(20);
        return view('admin.sections.shipment-log.index', compact(
            'page_title',
            'transactions'
        ));
    }

    /**
     * Canceled booking-log Logs View.
     * @return view $canceled-booking-log-logs
     */
    public function way()
    {
        $page_title   = __("Canceled Logs");
        $transactions = OrderShipment::with(
            'product_order',
            'shipment',
        )->where('shipment_status', GlobalConst::ON_THE_WAY)->paginate(20);
        return view('admin.sections.shipment-log.index', compact(
            'page_title',
            'transactions'
        ));
    }

    /**
     * Method for booking log details
     * @param $trx_id
     * @param \Illuminate\Http\Request $request
     */
    public function details(Request $request, $id)
    {
        $page_title = "Shipment Details";
        $data       = OrderShipment::with(
            'product_order.user',
            'shipment',
        )->where('id', $id)->first();
        if (!$data) {
            return back()->with(['error' => ['Data Not Found!']]);
        }
        return view('admin.sections.shipment-log.details', compact(
            'page_title',
            'data',
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
            'id'        => 'required'
        ]);
        $data = OrderShipment::where('id', $request->id)->first();
        if (!$data) {
            return back()->with(['error' =>  ['Data Not Found!']]);
        }

        if ($validator->fails()) {
            return Response::error(['error' => $validator->errors()]);
        }
        $validated     = $validator->validate();
        $basic_setting = BasicSettings::first();

        try {
            $data->update([
                'shipment_status'    => $validated['status'],
            ]);
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success'  => ['Shipment Status Updated Successfully.']]);
    }
}
