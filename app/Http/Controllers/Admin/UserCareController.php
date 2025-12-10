<?php

namespace App\Http\Controllers\Admin;

use App\Constants\GlobalConst;
use Exception;
use App\Models\User;
use App\Models\UserLoginLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserMailLog;
use App\Notifications\User\SendMail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\Response;
use App\Models\User\UserWallet;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;
use App\Constants\PaymentGatewayConst;
use App\Models\Admin\Admin; 


class UserCareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = __("All Users");
        $users      = User::orderBy('id', 'desc')->paginate(12);
        return view('admin.sections.user-care.index', compact(
            'page_title',
            'users'
        ));
    }

    /**
     * Display Active Users
     * @return view
     */
    public function active()
    {
        $page_title = __("Active Users");
        $users      = User::active()->orderBy('id', 'desc')->paginate(12);
        return view('admin.sections.user-care.index', compact(
            'page_title',
            'users'
        ));
    }


    /**
     * Display Banned Users
     * @return view
     */
    public function banned()
    {
        $page_title = __("Banned Users");
        $users      = User::banned()->orderBy('id', 'desc')->paginate(12);
        return view('admin.sections.user-care.index', compact(
            'page_title',
            'users',
        ));
    }

    /**
     * Display Email Unverified Users
     * @return view
     */
    public function emailUnverified()
    {
        $page_title = __("Email Unverified Users");
        $users      = User::active()->orderBy('id', 'desc')->emailUnverified()->paginate(12);
        return view('admin.sections.user-care.index', compact(
            'page_title',
            'users'
        ));
    }

    /**
     * Display SMS Unverified Users
     * @return view
     */
    public function SmsUnverified()
    {
        $page_title = __("SMS Unverified Users");
        return view('admin.sections.user-care.index', compact(
            'page_title',
        ));
    }


    /**
     * Display Send Email to All Users View
     * @return view
     */
    public function emailAllUsers()
    {
        $page_title = __("Email To Users");
        return view('admin.sections.user-care.email-to-users', compact(
            'page_title',
        ));
    }

    /**
     * Display Specific User Information
     * @return view
     */
    public function userDetails($username)
    {
        $page_title = __("User Details");
        $user       = User::where('username', $username)->with('wallets')->first();
        if (!$user) {
            return back()->with(['error' => [__('Oops! User does not exists')]]);
        }
        // --- ADD THIS LINE ---
        // Fetch all admins (you can select specific columns if needed)
        $admins = Admin::select('username', 'firstname', 'lastname')->get();
        return view('admin.sections.user-care.details', compact(
            'page_title',
            'user',
            'admins' // <--- Pass the variable here
        ));
    }

    public function sendMailUsers(Request $request)
    {
        $request->validate([
            'user_type'     => "required|string|max:30",
            'subject'       => "required|string|max:250",
            'message'       => "required|string|max:2000",
        ]);

        $users = [];
        switch ($request->user_type) {
            case "active":
                $users = User::active()->get();
                break;
            case "all":
                $users = User::get();
                break;
            case "email_verified":
                $users = User::emailVerified()->get();
                break;
            case "banned":
                $users = User::banned()->get();
                break;
        }

        try {
            Notification::send($users, new SendMail((object) $request->all()));
        } catch (Exception $e) {
            return back()->with(['error' => [__('Something went wrong! Please try again')]]);
        }

        return back()->with(['success' => [__('Email successfully sended')]]);
    }

    public function sendMail(Request $request, $username)
    {
        $request->merge(['username' => $username]);
        $validator = Validator::make($request->all(), [
            'subject'       => 'required|string|max:200',
            'message'       => 'required|string|max:2000',
            'username'      => 'required|string|exists:users,username',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with("modal", "email-send");
        }
        $validated            = $validator->validate();
        $user                 = User::where("username", $username)->first();
        $validated['user_id'] = $user->id;
        $validated            = Arr::except($validated, ['username']);
        $validated['method']  = "SMTP";
        try {
            UserMailLog::create($validated);
            $user->notify(new SendMail((object) $validated));
        } catch (Exception $e) {
            return back()->with(['error' => [__('Something went wrong! Please try again')]]);
        }
        return back()->with(['success' => [__('Mail successfully sended')]]);
    }

    public function userDetailsUpdate(Request $request, $username)
    {
        $request->merge(['username' => $username]);
        $validator = Validator::make($request->all(), [
            'username'              => "nullable|exists:users,username",
            'firstname'             => "nullable|string|max:60",
            'lastname'              => "nullable|string|max:60",
            'mobile_code'           => "nullable|string|max:10",
            'mobile'                => "nullable|string|max:20",
            'address'               => "nullable|string|max:250",
            'country'               => "nullable|string|max:50",
            'state'                 => "nullable|string|max:50",
            'city'                  => "nullable|string|max:50",
             'assign_to'    =>"nullable|string|max:100",
            'zip_code'              => "nullable|numeric|max_digits:8",
            'user_type'    =>"nullable|string|max:100",
            'verificationStatus'    =>"nullable|string|max:100",
            'email_verified'        => 'nullable|boolean',
            'two_factor_verified'   => 'nullable|boolean',
            'status'                => 'nullable|boolean',
        ]);
        $validated            = $validator->validate();
        $validated['address'] = [
            'country'       => $validated['country']  ?? "",
            'state'         => $validated['state']    ?? "",
            'city'          => $validated['city']     ?? "",
            'zip'           => $validated['zip_code'] ?? "",
            'address'       => $validated['address']  ?? "",
        ];
        $validated['mobile_code'] = remove_speacial_char($validated['mobile_code']);
        $validated['mobile']      = remove_speacial_char($validated['mobile']);
        $validated['full_mobile'] = $validated['mobile_code'] . $validated['mobile'];

        $user = User::where('username', $username)->first();
        if (!$user) {
            return back()->with(['error' => [__('Oops! User does not exists')]]);
        }
        if (isset($validated['address']) && is_array($validated['address'])) {
    $validated['address'] = json_encode($validated['address']);
}


       try {
        //   dd($validated);

    $user->update($validated);
} catch (Exception $e) {
    return back()->with([
        'error' => [
            __('Something went wrong! Please try again.'),
            'Error Details: ' . $e->getMessage(),
        ],
    ]);
}


        return back()->with(['success' => [__('Profile Information Updated Successfully!')]]);
    }

    public function loginLogs($username)
    {
        $page_title = __("Login Logs");
        $user       = User::where("username", $username)->first();
        if (!$user) {
            return back()->with(['error' => [__("Oops! User doesn't exists")]]);
        }
        $logs = UserLoginLog::where('user_id', $user->id)->paginate(12);
        return view('admin.sections.user-care.login-logs', compact(
            'logs',
            'page_title',
        ));
    }

    public function mailLogs($username)
    {
        $page_title = __("User Email Logs");
        $user       = User::where("username", $username)->first();
        if (!$user) {
            return back()->with(['error' =>  [__("Oops! User doesn't exists")]]);
        }
        $logs = UserMailLog::where("user_id", $user->id)->paginate(12);
        return view('admin.sections.user-care.mail-logs', compact(
            'page_title',
            'logs',
        ));
    }

    public function loginAsMember(Request $request, $username)
    {
        $request->merge(['username' => $username]);
        $request->validate([
            'target'            => 'required|string|exists:users,username',
            'username'          => 'required_without:target|string|exists:users',
        ]);

        try {
            $user = User::where("username", $request->username)->first();
            Auth::guard("web")->login($user);
        } catch (Exception $e) {
            return back()->with(['error' => [$e->getMessage()]]);
        }
        return redirect()->intended(route('user.dashboard'));
    }







    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text'  => 'required|string',
        ]);

        if ($validator->fails()) {
            $error = ['error' => $validator->errors()];
            return Response::error($error, null, 400);
        }

        $validated = $validator->validate();
        $users     = User::search($validated['text'])->limit(10)->get();
        return view('admin.components.search.user-search', compact(
            'users',
        ));
    }

    public function walletBalanceUpdate(Request $request, $username)
    {
        $validator = Validator::make($request->all(), [
            'type'      => "required|string|in:add,subtract",
            'wallet'    => "required|numeric|exists:user_wallets,id",
            'amount'    => "required|numeric",
            'remark'    => "required|string|max:200",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('modal', 'wallet-balance-update-modal');
        }

        $validated = $validator->validate();
        $user_wallet = UserWallet::whereHas('user', function ($q) use ($username) {
            $q->where('username', $username);
        })->find($validated['wallet']);
        if (!$user_wallet) return back()->with(['error' => [__("User wallet not found!")]]);
        DB::beginTransaction();
        try {

            $user_wallet_balance = 0;

            switch ($validated['type']) {
                case "add":
                    $type = "Added";
                    $user_wallet_balance = $user_wallet->balance + $validated['amount'];
                    $user_wallet->balance += $validated['amount'];
                    break;

                case "subtract":
                    $type = "Subtracted";
                    if ($user_wallet->balance >= $validated['amount']) {
                        $user_wallet_balance = $user_wallet->balance - $validated['amount'];
                        $user_wallet->balance -= $validated['amount'];
                    } else {
                        return back()->with(['error' => [__("User do not have sufficient balance")]]);
                    }
                    break;
            }

            $inserted_id = DB::table("transactions")->insertGetId([
                'user_id'           => $user_wallet->user->id,
                'wallet_id'         => $user_wallet->id,
                'type'              => PaymentGatewayConst::TYPEADDSUBTRACTBALANCE,
                'trx_id'            => generate_unique_string("transactions", "trx_id", 16),
                'request_amount'    => $validated['amount'],
                'total_charge'      => $validated['amount'],
                'available_balance' => $user_wallet_balance,
                'remark'            => $validated['remark'],
                'status'            => GlobalConst::SUCCESS,
                'request_currency'  => $user_wallet->currency->code,
                'created_at'                    => now(),
            ]);

            $client_ip = request()->ip() ?? false;
            $location = geoip()->getLocation($client_ip);
            $agent = new Agent();

            // $mac = exec('getmac');
            // $mac = explode(" ",$mac);
            // $mac = array_shift($mac);
            $mac = "";

            $user_wallet->save();
            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            return back()->with(['error' => [__("Transaction Failed!")]]);
        }

        return back()->with(['success' => [__("Transaction success")]]);
    }
}
