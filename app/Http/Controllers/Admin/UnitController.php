<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Http\Helpers\Response;
use App\Models\Admin\Product;
use App\Models\Admin\Unit;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UnitController extends Controller
{
    /**
     * Method for show the setup area page
     * return view
     */
    public function index()
    {
        $page_title = __("Setup Unit");
        $unit       = Unit::orderBYDESC('id')->paginate(10);

        return view('admin.sections.unit.index', compact(
            'page_title',
            'unit'
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
            'name'     => 'required|string',
            'unit'     => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with("modal", "add-unit");
        }

        $validated         = $validator->validate();
        $validated['slug'] = Str::slug($request->name);
        if (Unit::where('name', $validated['name'])->exists()) {
            throw ValidationException::withMessages([
                'name'   => 'Unit already exists',
            ]);
        }
        try {
            Unit::create($validated);
        } catch (Exception $e) {
            return back()->with(['error'  => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Unit Added Successfully']]);
    }

    /**
     * Method for delete Remittance Bank
     * @param string
     * @param \Illuminate\Http\Request $request
     */
    public function delete(Request $request)
    {
        $request->validate([
            'target'    => 'required|numeric|',
        ]);
        $unit = Unit::find($request->target);
      
        // Check if any product has this unit as area_id
    $product_exists = Product::where('unit_id', $unit->id)->exists();

    if ($product_exists) {
        return back()->with(['error' => ['Cannot delete this unit. It is used in one or more products.']]);
    }

        try {
            $unit->delete();
        } catch (Exception $e) {
            return back()->with(['error' => ['Something went wrong! Please try again.']]);
        }
        return back()->with(['success' => ['Unit Deleted Successfully!']]);
    }
    /**
     * Method for status update for remittance bank
     * @param string
     * @param \Illuminate\Http\Request $request
     */
    public function statusUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data_target'       => 'required|numeric|exists:units,id',
            'status'            => 'required|boolean',
        ]);

        if ($validator->fails()) {
            $errors = ['error' => $validator->errors() ];
            return Response::error($errors);
        }

        $validated = $validator->validate();


        $unit = Unit::find($validated['data_target']);

        try {
            $unit->update([
                'status'        => ($validated['status']) ? false : true,
            ]);
        } catch (Exception $e) {
            $errors = ['error' => ['Something went wrong! Please try again.'] ];
            return Response::error($errors, null, 500);
        }

        $success = ['success' => ['Unit status updated successfully!']];
        return Response::success($success);
    }
}
