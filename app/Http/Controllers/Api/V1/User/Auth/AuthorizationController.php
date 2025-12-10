<?php

namespace App\Http\Controllers\Api\V1\User\Auth;

use Exception;
use Illuminate\Http\Request;
use App\Constants\GlobalConst;
use App\Http\Helpers\Response;
use Illuminate\Support\Carbon;
use App\Models\UserAuthorization;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\ControlDynamicInputFields;
use Illuminate\Support\Facades\Validator;
use App\Providers\Admin\BasicSettingsProvider;
use App\Notifications\User\Auth\SendAuthorizationCode;
use App\Http\Helpers\SmsProviders\Twilio;
use App\Models\Admin\SmsProvider;
use App\Models\TemporaryData;
use App\Models\User;
use Illuminate\Support\Str;

class AuthorizationController extends Controller
{
    use ControlDynamicInputFields;

    public static function sendCodeToMail($user = null)
    {

        if (!$user && auth()->guard("api")->check() == false) {
            throw new Exception(__("Access denied! Unauthenticated"));
        }
        if (!$user) {
            $user = auth()->guard("api")->user();
        }

        $data = [
            'user_id'       => $user->id,
            'code'          => generate_random_code(),
            'token'         => generate_unique_string("user_authorizations", "token", 200),
            'created_at'    => now(),
        ];

        DB::beginTransaction();
        try {
            UserAuthorization::where("user_id", $user->id)->delete();
            DB::table("user_authorizations")->insert($data);
            $user->notify(new SendAuthorizationCode((object) $data));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception(__("Something went wrong! Please try again"));
        }

        return $data;
    }

    public function resendCodeToMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token'     => "required|string|exists:user_authorizations,token"
        ]);
        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), []);
        }
        $validated      = $validator->validate();
        $user_authorize = UserAuthorization::where("token", $validated['token'])->first();

        if (!$user_authorize) {
            return Response::error([__("Request token is invalid")], [], 404);
        }

        if (Carbon::now() <= $user_authorize->created_at->addMinutes(GlobalConst::USER_PASS_RESEND_TIME_MINUTE)) {
            return Response::error([__('You can resend verification code after ') . Carbon::now()->diffInSeconds($user_authorize->created_at->addMinutes(GlobalConst::USER_PASS_RESEND_TIME_MINUTE)) . __(' seconds')], ['token' => $validated['token'], 'wait_time' => (string) Carbon::now()->diffInSeconds($user_authorize->created_at->addMinutes(GlobalConst::USER_PASS_RESEND_TIME_MINUTE))], 400);
        }

        $resend_code = generate_random_code();
        try {
            $user_authorize->update([
                'code'          => $resend_code,
                'created_at'    => now(),
            ]);
            $data = $user_authorize->toArray();
            $user_authorize->user->notify(new SendAuthorizationCode((object) $data));
        } catch (Exception $e) {
            return Response::error([__("Something went wrong! Please try again")], [], 500);
        }

        return Response::success([__("Verification code resend successfully!")], ['token' => $validated['token'], 'wait_time' => ""], 200);
    }

    public function verifyMailCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token'     => "required|string|exists:user_authorizations,token",
            'code'      => "required|integer",
        ]);
        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), [], 400);
        }
        $validated = $validator->validate();

        if (!UserAuthorization::where("code", $request->code)->exists()) {
            return Response::error([__("Invalid OTP. Please try again")], [], 404);
        }

        $otp_exp_sec = BasicSettingsProvider::get()->otp_exp_seconds ?? GlobalConst::DEFAULT_TOKEN_EXP_SEC;
        $auth_column = UserAuthorization::where("token", $request->token)->where("code", $request->code)->first();
        if ($auth_column->created_at->addSeconds($otp_exp_sec) < now()) {
            $auth_column->delete();
            $this->authLogout($request);
            return Response::error([__("Session expired. Please try again")], [], 440);
        }

        try {
            $auth_column->user->update([
                'email_verified'    => true,
            ]);
            $auth_column->delete();
        } catch (Exception $e) {
            $auth_column->delete();
            $this->authLogout($request);
            return Response::error([__("Something went wrong! Please try again")], [], 500);
        }

        return Response::success([__("Account successfully verified")], [], 200);
    }

    public function authLogout(Request $request)
    {
        $user_token = Auth::guard(get_auth_guard())->user()->token();
        $user_token->revoke();
    }

    // User 2Fa authorization
    public function get2FaStatus()
    {
        $user      = auth()->guard(get_auth_guard())->user();
        $qr_code   = generate_google_2fa_auth_qr();
        $qr_secret = $user->two_factor_secret;
        $message   = __("Your account secure with google 2FA");
        if ($user->two_factor_status == false) {
            $message = __("To enable two factor authentication (powered by google) please visit your web dashboard Click here:") . " " . setRoute("user.authorize.google.2fa");
        }

        return Response::success([__('Request response fetch successfully!')], [
            'qr_secret'  => $qr_secret,
            'qr_code'    => $qr_code,
            'status'     => $user->two_factor_status,
            'message'    => $message,
        ], 200);
    }

    public function google2FAStatusUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status'        => "required|numeric",
        ]);
        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), [], 400);
        }
        $validated = $validator->validated();
        $user      = Auth::guard(get_auth_guard())->user();
        try {
            $user->update([
                'two_factor_status'         => $validated['status'],
                'two_factor_verified'       => true,
            ]);
        } catch (Exception $e) {
            return Response::error([__('Something went wrong! Please try again')], [], 500);
        }
        return Response::success([__('Google 2FA Updated Successfully!')], [], 200);
    }

    public function verifyGoogle2Fa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code'      => "required|integer",
        ]);
        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), []);
        }
        $validated = $validator->validate();

        $code = $validated['code'];

        $user = auth()->guard(get_auth_guard())->user();

        if (!$user->two_factor_secret) {
            return Response::error([__('Your secret key not stored properly. Please contact with system administrator')], [], 400);
        }

        if (google_2fa_verify($user->two_factor_secret, $code)) {

            $user->update([
                'two_factor_verified'   => true,
            ]);

            return Response::success([__('Google 2FA successfully verified!')], [], 200);
        } elseif (google_2fa_verify($user->two_factor_secret, $code) === false) {
            return Response::error([__('Invalid authentication code')], [], 400);
        }

        return Response::error([__('Failed to login. Please try again')], [], 500);
    }

    public function sendCodeToPhone(Request $request)
    {

        $validator = $request->validate([
            'otp_country' => 'required',
            'number'      => 'required',
        ]);


        $provider = SmsProvider::where('slug', 'twilio')->active()->first();

        if (!$provider) {
            return Response::error([__('SMS provider not configured')], [], 400);
        }



          $otp_country = ltrim($request->otp_country, '+');
        $receiver = '+' . $otp_country . $request->number;
        $user     = User::where('full_mobile', $receiver)->first();

        if ($user) {
            $receiver = $user->full_mobile;
        }


        $otp = rand(100000, 999999);

        try {
            $twilio  = new Twilio($provider);
            $message = 'Your verification code is: ' . $otp;

            $tempData = TemporaryData::create([
                'type'       => 'phone_verification',
                'identifier' => $receiver,
                'data'       => [
                    'token' => Str::uuid(),
                    'otp'   => [
                        'sended'      => false,
                        'otp'         => $otp,
                        'message_sid' => null
                    ]
                ]
            ]);

            $result = $twilio->send($receiver, $message, $otp, $tempData);

            if ($result instanceof TemporaryData) {
                return Response::success([
                    'message' => __('Verification code sent to your phone'),

                ], [ 'token' => $tempData->data->token], 200);
            }

            return Response::error([__('Failed to send verification code')], [], 400);
        } catch (Exception $e) {

            return Response::error([__('Failed to send SMS. Please try again later.')], [], 500);
        }
    }

    public function verifyPhoneCode(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'code.*'  => "required|integer",
            'token.*' => "required|integer",
        ]);

        if ($validated->fails()) {
            return Response::error($validated->errors()->all(), [], 400);
        }


        $validatedData         = $validated->validated();
        $validatedData['code'] = $request->code;

        $temp_data = TemporaryData::where("data->token", $request->token)->first();
        if ($request->token && $temp_data->created_at->diffInMinutes(Carbon::now()) > 15) {
            $request->token->revoke(); // Revoke the token

            return response()->json([
                'message' => 'Token expired',
                'error'   => 'token_expired'
            ], 401);
        }

        if (!$temp_data) {
            return Response::error([__('Invalid verification token')], [], 400);
        }

        if ($temp_data->data->otp->otp !== $validatedData['code']) {
            return Response::error([__('Verification OTP is invalid')], [], 400);
        }

        $user = User::where('full_mobile', $temp_data->identifier)->first();

        if ($user) {
            $token = $user->createToken('API Token')->accessToken;
            $user->update([
                'mobile_code' => $temp_data->data->country_code,
                'mobile'      => $temp_data->data->number,
                'full_mobile' => $temp_data->identifier,
            ]);
            $temp_data->delete();

            return Response::success([
                'message' => __('Login successful'),
            ], [
                 'access_token'     => $token,
                'user_status_value' => '1 = new, 0 = old',
                'user_status'       => '0',
                'user'              => $user->only(['id', 'name', 'email', 'full_mobile']),
            ], 200);
        } else {
            return Response::success([
                'message' => __('User registration required'),

            ], [
                'user_status_value' => '1 = new, 0 = old',
                'user_status'       => '1',
                'phone_number'      => $temp_data->identifier,
            ], 200);
        }
    }

    public function resendCodeToPhone(Request $request)
    {
        $temp_data = TemporaryData::where("data->token", $request->token)->first();

        if (!$temp_data) {
            return Response::error([__('Request token is invalid')], [], 400);
        }

        $provider = SmsProvider::where('slug', 'twilio')->active()->first();

        if (!$provider) {
            return Response::error([__('SMS provider not configured')], [], 400);
        }

        $receiver = $temp_data->identifier;
        $user     = User::where('full_mobile', $receiver)->first();

        if ($user) {
            $receiver = $user->full_mobile;
        }

        $otp = rand(100000, 999999);

        try {
            $twilio  = new Twilio($provider);
            $message = 'Your verification code is: ' . $otp;

            $newTempData = TemporaryData::create([
                'type'       => 'phone_verification',
                'identifier' => $receiver,
                'data'       => [
                    'token' => Str::uuid(),
                    'otp'   => [
                        'sended'      => false,
                        'otp'         => $otp,
                        'message_sid' => null
                    ]
                ]
            ]);

            $result = $twilio->send($receiver, $message, $otp, $newTempData);

            if ($result instanceof TemporaryData) {
                return Response::success([
                    'message' => __('Verification code sent to your phone'),

                ], [
                    'new_token' => $newTempData->data->token
                ], 200);
            }

            return Response::error([__('Failed to send verification code')], [], 400);
        } catch (Exception $e) {
            return Response::error([__('Failed to send SMS. Please try again later.')], [], 500);
        }
    }
}
