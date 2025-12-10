<?php

namespace App\Http\Controllers\Api\V1\User\Auth;

use App\Constants\GlobalConst;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Admin\SocialAuthDriver;
use Illuminate\Support\Facades\Config as FacadesConfig;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * get redirect
     * @param \Illuminate\Http\Request $request
     * @param string $driver
     */
    public function getRedirect(Request $request, string $driver)
    {
        if (!$request->redirect_url) {
            return Response::error([__("Redirect URL is required!")]);
        }

        $config = config('services.' . $driver);
        if (!$config) {
            return Response::error([__("Not configured this driver, please contact with system administrator")]);
        }

        $driver_record = SocialAuthDriver::where('driver_slug', $driver)->first();
        if (!$driver_record) {
            return Response::error([__("Request driver is invalid, Please try again.")]);
        }

        $credentials = $driver_record->credentials;

        if ($request->client_type === "app") {
            $client_id     = $credentials->client_id_app->value     ?? "";
            $client_secret = $credentials->client_secret_app->value ?? "";
        } else {
            $client_id     = $credentials->client_id->value     ?? "";
            $client_secret = $credentials->client_secret->value ?? "";
        }
        FacadesConfig::set('services.' . $driver . ".client_id", $client_id);
        FacadesConfig::set('services.' . $driver . ".client_secret", $client_secret);
        FacadesConfig::set('services.' . $driver . ".redirect", $request->redirect_url);

        try {
            $redirect_url = Socialite::driver($driver)->stateless()->redirect()->getTargetUrl();
        } catch (Exception $e) {
            return Response::error([__("Something went wrong! Please try again")]);
        }
        return Response::success(__("Data Fetch Successfully!"), [
            'redirect_url'  => $redirect_url,
        ]);
    }

    /**
     * receive user redirect response
     * @param \Illuminate\Http\Request $request
     */
    public function redirectResponse(Request $request, $driver)
    {
        $validator = Validator::make(array_merge($request->all(), ['client_type' => $request->header('X-client-type')]), [
            'client_type'       => 'nullable|string|in:app,web',
            'redirect_url'      => 'nullable|required_if:client_type,null,web',
            'token'             => 'nullable|required_if:client_type,app'
        ]);

        if ($validator->fails()) {
            return Response::error($validator->errors()->all(), [], 400);
        }

        $validated = $validator->validate();

        $driver_record = SocialAuthDriver::where('driver_slug', $driver)->first();
        if (!$driver_record) {
            return Response::error([__("Request driver is invalid, Please try again.")]);
        }

        $credentials = $driver_record->credentials;

        if ($request->client_type === "app") {
            $client_id     = $credentials->client_id_app->value     ?? "";
            $client_secret = $credentials->client_secret_app->value ?? "";
        } else {
            $client_id     = $credentials->client_id->value     ?? "";
            $client_secret = $credentials->client_secret->value ?? "";
        }

        // update redirect url to config
        FacadesConfig::set('services.' . $driver . ".client_id", $client_id);
        FacadesConfig::set('services.' . $driver . ".client_secret", $client_secret);
        FacadesConfig::set('services.' . $driver . ".redirect", $validated['redirect_url'] ?? null);

        try {
            if ($request->header('X-client-type') == 'app') { // get user information for
                $user = Socialite::driver($driver)->stateless()->userFromToken($validated['token']);
            } else {
                $user = Socialite::driver($driver)->stateless()->user();
            }
        } catch (Exception $e) {

            return Response::error([__("Something went wrong! Please try again")]);
        }

        $email = $user->getEmail();

        if ($user && $email) {
            $user_exists = User::where('email', $email)->first();

            if ($user_exists) {
                return $this->handleExistingUser($user_exists, $driver);
            } else {
                return $this->handleNewUser($user, $driver);
            }
        }

        return Response::error([__("Something went wrong! Please try again")]);
    }

    /**
     * handle existing user
     * @param $user
     * @param $driver
     */
    public function handleExistingUser($user, string $driver)
    {
        return (new LoginController())->authenticated(new Request(), $user, $driver);
    }

    /**
     * register new user using social information
     * @param $user
     * @param string $driver
     */
    public function handleNewUser($user, string $driver)
    {
        return (new RegisterController($driver))->register(new Request([
            'firstname'              => $user->name,
            'lastname'               => $user->name,
            'username'               => $user->name,
            'email'                  => $user->email,
            'image'                  => $user->picture,
            'free_delivery_status'   => false,
            'sms_verified'           => false,
            'driver'                 => GlobalConst::GMAIL,
            'kyc_verified'           => 0,
            'two_factor_status'      => false,
            'password'               => uniqid(),
        ]));
    }
}
