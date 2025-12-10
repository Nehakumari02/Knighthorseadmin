<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DeliverySettings;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Http\Helpers\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DeliverySettingsController extends Controller
{
    /**
     * Method for show the setup area page
     * return view
     */
    public function index()
    {
        $page_title = __("Setup Delivery");
        $delivery   = DeliverySettings::orderBYDESC('id')->first();

        return view('admin.sections.delivery.index', compact(
            'page_title',
            'delivery'
        ));
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
           
            'bag_price'       => 'numeric',
             'amount_spend'   => 'numeric',
             'delivery_count' => 'numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        $basic_settings = DeliverySettings::first();

        if (!$basic_settings) {
            return back()->with(['error' => [__('Data not found!')]]);
        }

        try {
          
            $basic_settings->bag_price       = $validated['bag_price'];
            $basic_settings->amount_spend    = $validated['amount_spend'];
            $basic_settings->delivery_count  = $validated['delivery_count'];
            $basic_settings->save();



            return back()->with(['success' => [__('Settings updated successfully!')]]);
        } catch (Exception $e) {
                    dd($e);
            return back()->with(['error' => [__('Something went wrong! Please try again.')]]);
        }
    }

     public function deliveryActivationUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status'                    => 'required|boolean',
            'input_name'                => 'required|string',
        ]);

        if ($validator->stopOnFirstFailure()->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error, null, 400);
        }
        $validated = $validator->validate();

        $delivery_settings = DeliverySettings::first();
      

        $validated['status'] = ($validated['status'] == true) ? false : true;

        if (!$delivery_settings) {
            $error = ['error' => [__('settings not found!')]];
            return Response::error($error, null, 404);
        }


        try {
            $delivery_settings->update([
                $validated['input_name'] => $validated['status'],
            ]);
        } catch (Exception $e) {
         
            $error = ['error' => [__('Something went wrong!. Please try again.')]];
            return Response::error($error, null, 500);
        }

        $success = ['success' => [__('Basic settings status updated successfully!')]];
        return Response::success($success, null, 200);
    }
}
