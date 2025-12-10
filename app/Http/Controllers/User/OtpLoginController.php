<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\Auth\LoginController;
use Illuminate\Http\Request;
use App\Http\Helpers\SmsProviders\Twilio;
use App\Models\Admin\SmsProvider;
use App\Models\TemporaryData;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class OtpLoginController extends Controller
{
    public function showLoginForm()
    {
        $page_title = "OTP Login";
        return view('user.otp.login', compact('page_title'));
    }

    public function loginSubmit(Request $request)
    {
        $validated = $request->validate([
            'otp_country' => 'required',
            'number'      => 'required',
        ]);

        $page_title = "OTP Login";
        $provider   = SmsProvider::where('slug', 'twilio')->active()->first();

        if (!$provider) {
            return back()->with(['error' => [__('SMS provider not configured')]]);
        }
         $otp_country = ltrim($request->otp_country, '+');
        $receiver = '+' . $otp_country . $request->number;
        $user     = User::where('full_mobile', $receiver)->first();

        if ($user) {
            $receiver = $user->full_mobile;
        }


        $otp = rand(100000, 999999);
        // Format phone number in E.164 format (e.g., +15551234567)

        try {
            $twilio  = new Twilio($provider);
            $message = 'Your verification code is: ' . $otp;

            $tempData = TemporaryData::create([
                'type'       => 'phone_verification',
                'identifier' => $receiver,
                'data'       => [
                    'token'        => Str::uuid(),
                    'country_code' => $request->otp_country,
                    'number'       => $request->number,
                    'otp'          => [
                        'sended'      => false,
                        'otp'         => $otp,
                        'message_sid' => null
                    ]
                ]
            ]);

            $result = $twilio->send($receiver, $message, $otp, $tempData);

            if ($result instanceof TemporaryData) {
                return redirect()->route('user.otp.login.verify', $tempData->data->token)
                    ->with(['success' => [__('Verification code sent to your phone')]]);
            }

            return back()->with(['error' => [__('Failed to send verification code')]]);
        } catch (Exception $e) {

            return back()->with(['error' => [__('Failed to send SMS. Please try again later.')]]);
        }
    }

    public function otpVerifyForm($token)
    {
        $page_title = 'Verify OTP';
        $temp_data  = TemporaryData::where("data->token", $token)->first();

        return view('user.otp.verify', compact('page_title', 'temp_data'));
    }


    public function otpVerifyCode(Request $request, $token)
    {
        $page_title = 'otp verification';
        $validated  = Validator::make($request->all(), [
            'code.*' => "required|integer",
        ])->validate();

        $validated['code'] = implode("", $request->code);

        $temp_data = TemporaryData::where("data->token", $token)->first();

        if ($temp_data->data->otp->otp !== $validated['code']) {
            throw ValidationException::withMessages([
                'code' => "Verification Otp is Invalid",
            ]);
        }

        $user = User::where('full_mobile', $temp_data->identifier)->first();

        if ($user) {
            $user->update([
                'mobile_code' => $temp_data->data->country_code,
                'mobile'      => $temp_data->data->number,
                'full_mobile' => $temp_data->identifier,
            ]);
            Auth::guard('web')->login($user);
            $temp_data->delete();

            return redirect()->intended(route('user.dashboard', compact('page_title')));
        } else {
            return view('user.auth.register', [
                'phone_number' => $temp_data->identifier,
                'page_title'   => $page_title
            ]);
        }
    }

    public function resendCode($token)
    {
        $temp_data = TemporaryData::where("data->token", $token)->first();
        if (!$temp_data) {
            return back()->with(['error' => ['Request token is invalid']]);
        }

        $provider = SmsProvider::where('slug', 'twilio')->active()->first();

        if (!$provider) {
            return back()->with(['error' => [__('SMS provider not configured')]]);
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
                return redirect()->route('user.otp.login.verify', $tempData->data->token)
                    ->with(['success' => [__('Verification code sent to your phone')]]);
            }

            return back()->with(['error' => [__('Failed to send verification code')]]);
        } catch (Exception $e) {

            return back()->with(['error' => [__('Failed to send SMS. Please try again later.')]]);
        }
    }
}
