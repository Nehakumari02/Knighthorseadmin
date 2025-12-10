<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\User\Auth\LoginController;
use App\Http\Controllers\Api\V1\User\Auth\RegisterController;
use App\Http\Controllers\Api\V1\User\Auth\AuthorizationController;
use App\Http\Controllers\Api\V1\User\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\V1\User\Auth\SocialAuthController;
use Illuminate\Http\Request;

// User Auth Routes
Route::middleware(['api.user.auth.guard'])->group(function () {

    Route::controller(RegisterController::class)->group(function () {
        Route::post("register", "register");
    });

    Route::controller(LoginController::class)->group(function () {
        Route::post("login", "login");
    });

    // Forget password routes
    Route::controller(ForgotPasswordController::class)->prefix("password/forgot")->group(function () {
        Route::post('find/user', 'findUserSendCode');
        Route::post('verify/code', 'verifyCode');
        Route::get('resend/code', 'resendCode');
        Route::post('reset', 'resetPassword');
    });
});

/**
 * social authentication
 */
Route::controller(SocialAuthController::class)->prefix('user/social/auth')->name('social.auth.')->group(function () {
    Route::post('redirect/{driver}', 'getRedirect')->name('redirect')->whereIn('driver', ['google', 'envato']);
    Route::post('redirect/response/{driver}', 'redirectResponse')->name('redirect.response')->whereIn('driver', ['google', 'envato']);
});



Route::controller(AuthorizationController::class)->prefix("authorize")->middleware(['auth:api'])->group(function () {
    // Mail
    Route::prefix("mail")->group(function () {
        Route::get("send/code", "sendCodeToMail");
        Route::get("resend/code", "resendCodeToMail");
        Route::post("verify/code", "verifyMailCode");
    });

    // Kyc
    Route::prefix("kyc")->group(function () {
        Route::get('input-fields', 'getKycInputFields');
        Route::post('submit', 'KycSubmit');
    });

    // google 2FA
    Route::prefix("google/2fa")->group(function () {
        Route::get("status", "get2FaStatus");
        Route::post("status/update", "google2FAStatusUpdate");
        Route::post('verify', 'verifyGoogle2Fa');
    });
    // phone
    Route::prefix("phone")->withoutMiddleware(["auth:api"])->group(function () {
        Route::post("send/code", "sendCodeToPhone");
        Route::post("resend/code", "resendCodeToPhone");
        Route::post('verify/code', 'verifyPhoneCode');
    });
});
