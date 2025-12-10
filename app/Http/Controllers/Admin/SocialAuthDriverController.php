<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Admin\SocialAuthDriver;
use Illuminate\Support\Facades\Validator;

class SocialAuthDriverController extends Controller
{
    /**
     * show social driver list
     * @param \Illuminate\Http\Request $request
     */
    public function index(Request $request)
    {
        $page_title = __("User Panel Auth Drivers");
        $drivers    = SocialAuthDriver::userPanel()->get();
        return view('admin.sections.social-auth-driver.index', compact('page_title', 'drivers'));
    }

    /**
     * update driver status
     * @param \Illuminate\Http\Request $request
     */
    public function statusUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status'                    => 'required|boolean',
            'data_target'               => 'required|string',
        ]);
        if ($validator->stopOnFirstFailure()->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error, null, 400);
        }
        $validated = $validator->validate();
        $item_id   = $validated['data_target'];

        $driver = SocialAuthDriver::find($item_id);
        if (!$driver) {
            $error = ['error' => ['Driver is not found!.']];
            return Response::error($error, null, 404);
        }

        try {
            $driver->update([
                'status' => ($validated['status'] == true) ? false : true,
            ]);
        } catch (Exception $e) {
            $error = ['error' => ['Something went wrong!. Please try again.']];
            return Response::error($error, null, 500);
        }

        $success = ['success' => ['Driver status is updated successfully!']];
        return Response::success($success, null, 200);
    }

    /**
     * update social auth
     * @param \Illuminate\Http\Request $request
     */
    public function update(Request $request, string $ulid)
    {
        $driver = SocialAuthDriver::where('ulid', $ulid)->first();

        $validation_rule = [];
        foreach ($driver->credentials as $key => $val) {
            $validation_rule[$key] = "required";
        }

        $request->validate($validation_rule);

        $credentials = json_decode(json_encode($driver->credentials), true);
        foreach ($credentials as $key => $code) {
            $credentials[$key]['value'] = $request->$key;
        }

        $driver->credentials = $credentials;
        $driver->update();

        return back()->with(['success' => ['Information updated successfully']]);
    }

}
