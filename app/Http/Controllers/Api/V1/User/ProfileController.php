<?php

namespace App\Http\Controllers\Api\V1\User;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Providers\Admin\BasicSettingsProvider;

class ProfileController extends Controller
{
    public function profileInfo()
    {
        $user = auth()->guard("api")->user();
        $user->load('wallets');

        $response_data = $user->only([
            'id',
            'firstname',
            'lastname',
            'username',
            'email',
            'mobile_code',
            'mobile',
            'image',
            'user_type'

        ]);


        $response_data['mobile_code'] = $user->mobile_code ?? "";
        $response_data['address']     = $user->address     ?? "";

        $image_paths = [
            'base_url'          => url("/"),
            'path_location'     => files_asset_path_basename("user-profile"),
            'default_image'     => files_asset_path_basename("profile-default"),
        ];



        return Response::success([__('Profile info fetch successfully!')], [
            'user_info'     => $response_data,
            'user_wallet'   => $user->wallets,
            'image_paths'   => $image_paths,
            'countries'     => get_all_countries(['id', 'name', 'mobile_code']),
        ], 200);
    }

    public function profileInfoUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstname'     => "required|string|max:60",
            'lastname'      => "required|string|max:60",
            'phone'         => "nullable|string|max:20",
            'otp_country'   => "nullable|string|max:20",
            'address'       => "nullable|string|max:250",
            'image'         => "nullable|image|mimes:jpg,png,svg,webp|max:10240",
            'user_type'      => "nullable|string|max:250",
        ]);

        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), []);
        }

        $validated                = $validator->validate();
        $validated['mobile']      = remove_speacial_char($validated['phone']);
        $validated['mobile_code'] = remove_speacial_char($validated['otp_country']);
        $complete_phone           = $validated['mobile_code'] . $validated['mobile'];
        $validated['full_mobile'] = $complete_phone;

        $user = auth()->guard(get_auth_guard())->user();

        if (User::whereNot('id', $user->id)->where("full_mobile", $validated['full_mobile'])->exists()) {
            return Response::error([__('Phone number already exists')], [], 400);
        }

        if ($request->hasFile("image")) {
            $image        = upload_file($validated['image'], 'junk-files', $user->image);
            $upload_image = upload_files_from_path_dynamic([$image['dev_path']], 'user-profile');
            delete_file($image['dev_path']);
            $validated['image'] = $upload_image;
        }

        try {
            $user->update($validated);
        } catch (Exception $e) {

            return Response::error([__("Something went wrong! Please try again")], [], 500);
        }

        return Response::success([__('Profile successfully updated!')], [], 200);
    }

    public function profilePasswordUpdate(Request $request)
    {
        $basic_settings = BasicSettingsProvider::get();
        $password_rule  = "required|string|min:6|confirmed";
        if ($basic_settings->secure_password) {
            $password_rule = ["required", Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(), "confirmed"];
        }

        $validator = Validator::make($request->all(), [
            'current_password'      => "required|string",
            'password'              => $password_rule,
        ]);

        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), []);
        }
        $validated = $validator->validate();

        if (!Hash::check($validated['current_password'], auth()->guard("api")->user()->password)) {
            return Response::error([__("Current password didn't match")], [], 400);
        }

        try {
            auth()->guard("api")->user()->update([
                'password'  => Hash::make($validated['password']),
            ]);
        } catch (Exception $e) {
            return Response::error([__('Something went wrong! Please try again')], [], 500);
        }

        return Response::success([__('Password successfully updated!')], [], 200);
    }

    public function logout(Request $request)
    {
        $user  = Auth::guard(get_auth_guard())->user();
        $token = $user->token();
        try {
            $token->revoke();
        } catch (Exception $e) {
            return Response::error([__('Something went wrong! Please try again')], [], 500);
        }
        return Response::success([__('Logout success!')], [], 200);
    }

    /**
     * Account Delete
     *
     * @method POST
     * @return \Illuminate\Http\Response
     */
    public function deleteAccount()
    {
        $user = Auth::guard(get_auth_guard())->user();
        if (!$user) {
            $message = ['success' =>  [__('No user found')]];
            return Response::error($message, []);
        }

        try {
            $user->status     = 0;
            $user->deleted_at = now();
            $user->save();
        } catch (\Throwable $th) {
            $message = ['success' =>  [__('Something went wrong! Please try again')]];
            return Response::error($message, []);
        }

        $message = ['success' =>  [__('User deleted successful')]];
        return Response::success($message, $user);
    }
}
