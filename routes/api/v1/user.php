<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\User\ProfileController;
use App\Http\Controllers\Api\V1\User\DashboardController;
use App\Http\Controllers\Api\V1\User\OrderDetails;
use App\Http\Controllers\Api\V1\User\ProductOrderController;
use App\Http\Controllers\Api\V1\User\TransactionController;

Route::prefix("user")->name("api.user.")->group(function () {
    // doctor booking

    Route::controller(ProfileController::class)->prefix('profile')->group(function () {
        Route::get('info', 'profileInfo');
        Route::post('info/update', 'profileInfoUpdate')->middleware('app.mode');
        Route::post('password/update', 'profilePasswordUpdate')->middleware('app.mode');
        Route::post('delete', 'deleteAccount')->middleware('app.mode');
    });

    // Logout Route
    Route::post('logout', [ProfileController::class, 'logout']);

    // Dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get("dashboard", "dashboard");
        Route::get("home", "home");
        Route::get("notifications", "notifications");
    });



    Route::controller(OrderDetails::class)->prefix("order-details")->name("order.details.")->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('details', 'details')->name('details');
        Route::get('payment/history', 'paymentHistory')->name('payment.history');
    });

    // doctor booking
    Route::controller(ProductOrderController::class)->group(function () {
        Route::get("payment-gateways", "getPaymentGateways");
        Route::post("user/cart/store", "userCartInsert");
        Route::post("user/cart/store/single", "userCartInsertSingle");
        Route::post("user/cart/delete", "userCartDelete");
        Route::get("user/cart", "userCart");
        Route::post("doctor/booking/checkout", "checkout");
        Route::post("cash/payment/submit", "cashPayment");
        // Submit with automatic gateway
        Route::post("automatic/submit", "automaticSubmit");

        // Automatic Gateway Response Routes
        Route::get('success/response/{gateway}', 'success')->withoutMiddleware(['auth:api'])->name("payment.success");
        Route::get("cancel/response/{gateway}", 'cancel')->withoutMiddleware(['auth:api'])->name("payment.cancel");

        // POST Route For Unauthenticated Request
        Route::post('success/response/{gateway}', 'postSuccess')->name('payment.success')->withoutMiddleware(['auth:api']);
        Route::post('cancel/response/{gateway}', 'postCancel')->name('payment.cancel')->withoutMiddleware(['auth:api']);

        //redirect with Btn Pay
        Route::get('redirect/btn/checkout/{gateway}', 'redirectBtnPay')->name('payment.btn.pay')->withoutMiddleware(['auth:api']);

        // Automatic gateway additional fields
        Route::get('payment-gateway/additional-fields', 'gatewayAdditionalFields');

        Route::prefix('payment')->name('payment.')->group(function () {
            Route::post('crypto/confirm/{trx_id}', 'cryptoPaymentConfirm')->name('crypto.confirm');
        });
    });


    // Transaction
    Route::controller(TransactionController::class)->prefix("transaction")->group(function () {
        Route::get("history", "bookingHistory");
        Route::get("booking/details/{slug}", "details");
        Route::get("log", "log");
    });
});
