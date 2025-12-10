<?php

namespace App\Http\Controllers\User\Auth;

use App\Constants\GlobalConst;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SocialAuthDriver;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Traits\User\RegisteredUsers;

class SocialAuthController extends Controller
{
    use  RegisteredUsers;
    public function redirectToGoogle()
    {
        try {
            $driver = SocialAuthDriver::where('driver_slug', 'google')
                ->where('panel', SocialAuthDriver::PANEL_USER)
                ->firstOrFail();


            $credentials = is_array($driver->credentials)
                ? $driver->credentials
                : json_decode(json_encode($driver->credentials), true);


            if (empty($credentials['client_id']['value']) || empty($credentials['client_secret']['value'])) {
                throw new \Exception('Google OAuth credentials not configured');
            }


            $config = [
                'client_id'     => $credentials['client_id']['value'],
                'client_secret' => $credentials['client_secret']['value'],
                'redirect'      => route('user.auth.google.callback'),
            ];

            // Apply configuration
            config(['services.google' => $config]);

            return Socialite::driver('google')
                ->with(['prompt' => 'select_account'])
                ->redirect();
        } catch (\Exception $e) {
            return redirect()->route('frontend.index')
                ->with('error', 'Google login is currently unavailable. Please try another method.');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            $driver = SocialAuthDriver::where('driver_slug', 'google')
                ->where('panel', SocialAuthDriver::PANEL_USER)
                ->firstOrFail();

            $credentials = is_array($driver->credentials)
                ? $driver->credentials
                : json_decode(json_encode($driver->credentials), true);

            if (empty($credentials['client_id']['value']) || empty($credentials['client_secret']['value'])) {
                throw new \Exception('Google OAuth credentials not configured');
            }

            config(['services.google' => [
                'client_id'     => $credentials['client_id']['value'],
                'client_secret' => $credentials['client_secret']['value'],
                'redirect'      => route('user.auth.google.callback'),
            ]]);

            $googleUser = Socialite::driver('google')->user();


            $nameParts = explode(' ', $googleUser->getName(), 2);
            $firstName = $nameParts[0] ?? '';
            $lastName  = $nameParts[1] ?? null;

            $baseUsername = Str::slug($firstName);
            $username     = $baseUsername;
            $counter      = 1;

            while (User::where('username', $username)->exists()) {
                $username = $baseUsername . $counter;
                $counter++;
            }

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'firstname'            => $firstName,
                    'lastname'             => $lastName,
                    'username'             => $username,
                    'email'                => $googleUser->getEmail(),
                    'password'             => bcrypt(Str::random(24)),
                    'email_verified'       => true,
                    'email_verified_at'    => now(),
                    'status'               => true,
                    'driver'               => GlobalConst::GMAIL,
                    'image'                => $googleUser->getAvatar(),
                    'free_delivery_status' => true,
                    'sms_verified'         => false,
                    'kyc_verified'         => 0,
                    'two_factor_status'    => false,
                ]
            );

            if (empty($user->image) && $googleUser->getAvatar()) {
                $user->image = $googleUser->getAvatar();
                $user->save();
            }

            try {
                $this->createUserWallets($user);
                Auth::login($user);
            } catch (Exception $e) {
                $this->guard()->logout();
                $user->delete();
                return redirect()->back()->with(['error' => ['Something went wrong! Please try again']]);
            }

            return redirect()->intended('user/dashboard');
        } catch (\Exception $e) {

            return redirect()->route('frontend.index')->withErrors([
                'social_auth' => 'Failed to authenticate with Google. Please try another method.'
            ]);
        }
    }

}
