<?php

use App\Http\Controllers\Admin\ProductCartController;
use App\Http\Controllers\Admin\ProductOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\Admin\BasicSettingsProvider;
use Pusher\PushNotifications\PushNotifications;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SecurityController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\SupportTicketController;
use App\Http\Controllers\User\MyBookingController;
use App\Http\Controllers\User\OrderDetails;

Route::prefix("user")->name("user.")->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::post('logout', 'logout')->name('logout');
        Route::get('find/doctor', 'findDoctor')->name('find.doctor');
    });

    Route::controller(ProfileController::class)->prefix("profile")->name("profile.")->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('password/update', 'passwordUpdate')->name('password.update')->middleware('app.mode');
        Route::put('update', 'update')->name('update')->middleware('app.mode');
        Route::post('delete-account/{id}', 'delete')->name('delete')->middleware('app.mode');
    });

    Route::controller(SupportTicketController::class)->prefix("prefix")->name("support.ticket.")->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('conversation/{encrypt_id}', 'conversation')->name('conversation');
        Route::post('message/send', 'messageSend')->name('messaage.send');
    });


    Route::controller(SecurityController::class)->prefix("security")->name('security.')->group(function () {
        Route::get('google/2fa', 'google2FA')->name('google.2fa');
        Route::post('google/2fa/status/update', 'google2FAStatusUpdate')->name('google.2fa.status.update')->middleware('app.mode');
    });

    Route::controller(OrderDetails::class)->prefix("order-details")->name("order.details.")->group(function () {
        Route::get('index', 'index')->name('index');
        Route::get('details/{uuid}', 'details')->name('details');
        Route::post('search', 'search')->name('search');
        Route::get('service', 'service')->name('service');
        Route::get('payment/history', 'paymentHistory')->name('payment.history');
    });



});


// Route For Pusher Beams Auth
Route::get('user/pusher/beams-auth', function (Request $request) {
    if (Auth::check() == false) {
        return response(['Inconsistent request'], 401);
    }
    $userID = Auth::user()->id;

    $basic_settings = BasicSettingsProvider::get();
    if (!$basic_settings) {
        return response('Basic setting not found!', 404);
    }

    $notification_config = $basic_settings->push_notification_config;

    if (!$notification_config) {
        return response('Notification configuration not found!', 404);
    }

    $instance_id = $notification_config->instance_id ?? null;
    $primary_key = $notification_config->primary_key ?? null;
    if ($instance_id == null || $primary_key == null) {
        return response('Sorry! You have to configure first to send push notification.', 404);
    }
    $beamsClient = new PushNotifications(
        array(
            "instanceId" => $notification_config->instance_id,
            "secretKey"  => $notification_config->primary_key,
        )
    );

    $get_full_host_path = remove_special_char(get_full_url_host(), "-");

    $publisherUserId = $get_full_host_path . "-user-".$userID;
    try {
        $beamsToken = $beamsClient->generateToken($publisherUserId);
    } catch (Exception $e) {
        return response(['Server Error. Failed to generate beams token.'], 500);
    }

    return response()->json($beamsToken);
})->name('user.pusher.beams.auth');
