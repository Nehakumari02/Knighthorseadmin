<?php

namespace App\Http\Controllers\User\Auth;

use App\Constants\GlobalConst;
use App\Http\Controllers\Controller;
use App\Providers\Admin\BasicSettingsProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Support\Str;
use App\Traits\User\RegisteredUsers;
use Exception;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use RegisteredUsers;

    protected $basic_settings;

    public function __construct()
    {
        $this->basic_settings = BasicSettingsProvider::get();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $client_ip    = request()->ip()                             ?? false;
        $user_country = geoip()->getLocation($client_ip)['country'] ?? "";

        $page_title = setPageTitle("User Registration");
        return view('user.auth.register', compact(
            'page_title',
            'user_country'
        ));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validated = $this->validator($request->all())->validate();

        $basic_settings              = $this->basic_settings;
        $validated['email_verified'] = ($basic_settings->email_verification == true) ? false : true;
        $validated['sms_verified']   = ($basic_settings->sms_verification == true) ? false : true;
        $validated['password']       = Hash::make($validated['password']);
        $validated['full_mobile']    = $request->full_mobile;
        $validated['driver']         = GlobalConst::EMAIL;
        if ($request->full_mobile) {
            $validated['driver'] = GlobalConst::MOBILE;
        }
        $validated['username'] = make_username(Str::slug($validated['firstname']), Str::slug($validated['lastname']));




        if ($this->basic_settings->user_registration == 0) {
            return redirect()->back()->with(['error' => ['User Registration not Available Now! Please try again']]);
        } else {
            event(new Registered($user = $this->create($validated)));
            $this->guard()->login($user);
            return $this->registered($request, $user);
        }
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {

        $basic_settings = $this->basic_settings;
        $password_rule  = "required|string|min:6";
        if ($basic_settings->secure_password) {
            $password_rule = ["required", Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()];
        }
        $agree_rule = $basic_settings->agree_policy ? 'required|in:on' : 'in:on';

        return Validator::make($data, [
            'firstname'      => 'required|string|max:60',
            'lastname'       => 'required|string|max:60',
            'full_mobile'    => 'nullable',
            'email'          => 'required|string|email|max:150|unique:users,email',
            'password'       => $password_rule,
            'refer'          => 'sometimes|nullable|string|exists:users,referral_id',
            'agree'          => $agree_rule,
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create($data);
    }


    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

        try {
            $this->createUserWallets($user);
        } catch (Exception $e) {
            $this->guard()->logout();
            $user->delete();
            return redirect()->back()->with(['error' => ['Something went wrong! Please try again']]);
        }

        return redirect()->intended(route('user.dashboard'));
    }
}
