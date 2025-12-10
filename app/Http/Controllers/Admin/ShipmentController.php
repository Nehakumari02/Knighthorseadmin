<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Shipment;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Http\Helpers\Response;
use App\Models\Admin\Unit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ShipmentController extends Controller
{
    /**
     * Method for show the setup area page
     * return view
     */
    public function index()
    {
        $page_title = __("Setup Shipment");
        $shipment   = Shipment::orderBYDESC('id')->paginate(10);

        return view('admin.sections.shipment.index', compact(
            'page_title',
            'shipment'
        ));
    }
    /**
     * Method for store Remittance Bank
     * @param string
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                    => 'required|string',
            'delivery_delay_days'     => 'required|numeric|min:1',
            'delivery_charge'         => 'required|string',
            'star_time'               => 'required|string',
            'end_time'                => 'required|string|after:star_time',
            'time_range'              => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validate();
        if (Shipment::where('name', $validated['name'])->exists()) {
            throw ValidationException::withMessages([
                'name'   => 'Unit already exists',
            ]);
        }

        if ($request->default) {
            $validated['default'] = true;
        } else {
            $validated['default'] = false;
        }
        try {
            Shipment::create($validated);
        } catch (Exception $e) {

            return back()->with(['error'  => ['Something went wrong! Please try again.']]);
        }
        return redirect()->route('admin.shipment.index')->with(['success' => ['Shipment Added Successfully']]);
    }

    public function create()
    {
        $page_title = __("Create Shipment");

        return view('admin.sections.shipment.create', compact('page_title'));
    }


    /**
     * Delete the specified sports category.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'target' => 'required|string',
        ]);

        $validated = $validator->validate();
        $package   = Shipment::find($validated['target']);

        try {
            // Delete the sports category
            $package->delete();
            return back()->with(['success' => [__('Shipment deleted successfully!')]]);
        } catch (Exception $e) {
            return back()->with(['error' => [__('Something went wrong! Please try again.')]]);
        }
    }


}
