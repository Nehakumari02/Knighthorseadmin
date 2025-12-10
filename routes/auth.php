<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\User\Auth\ForgotPasswordController as UserForgotPasswordController;
use App\Http\Controllers\User\Auth\LoginController as UserLoginController;
use App\Http\Controllers\User\Auth\RegisterController as UserRegisterController;
use App\Http\Controllers\User\AuthorizationController;
use App\Http\Controllers\Admin\AuthorizationController as AdminAuthorizationController;
use App\Http\Controllers\User\Auth\SocialAuthController;
use App\Http\Controllers\User\OtpLoginController;

// Admin Authentication Route
Route::middleware(['guest', 'admin.login.guard'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::get('login', [LoginController::class, "showLoginForm"])->name('login');
    Route::post('login/submit', [LoginController::class, "login"])->name('login.submit');

    Route::get('password/forgot', [ForgotPasswordController::class, "showLinkRequestForm"])->withoutMiddleware(['admin.login.guard', 'guest'])->name('password.forgot');
    Route::post('password/forgot', [ForgotPasswordController::class, "sendResetLinkEmail"])->withoutMiddleware(['admin.login.guard', 'guest'])->name('password.forgot.request');

    Route::get('password/reset/{token}', [ResetPasswordController::class, "showResetForm"])->withoutMiddleware(['admin.login.guard', 'guest'])->name('password.reset');
    Route::post('password/update', [ResetPasswordController::class, 'reset'])->withoutMiddleware(['admin.login.guard', 'guest'])->name('password.update');

    Route::controller(AdminAuthorizationController::class)->prefix("authorize")->middleware(['auth:admin'])->withoutMiddleware(['admin.login.guard', 'guest'])->name('authorize.')->group(function () {
        Route::get('google/2fa', 'showGoogle2FAForm')->name('google.2fa');
        Route::post('google/2fa/submit', 'google2FASubmit')->name('google.2fa.submit');
    });
});

Route::name('user.')->group(function () {
    Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle'])
        ->name('auth.google');
    Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback'])
        ->name('auth.google.callback');


    Route::get('login', [UserLoginController::class, "showLoginForm"])->name('login');
    Route::post('login', [UserLoginController::class, "login"])->name('login.submit');

    Route::get('otp/login', [OtpLoginController::class, "showLoginForm"])->name('otp.login');
    Route::post('otp/login/submit', [OtpLoginController::class, "loginSubmit"])->name('otp.login.submit');
    Route::get('otp/login/verify/{token}', [OtpLoginController::class, "otpVerifyForm"])->name('otp.login.verify');
    Route::post('otp/login/verify/code/{token}', [OtpLoginController::class, "otpVerifyCode"])->name('otp.login.verify.code');
    Route::get('otp/login/verify/resend/{token}', [OtpLoginController::class, "resendCode"])->name('otp.login.resend');

    Route::get('register/{refer?}', [UserRegisterController::class, "showRegistrationForm"])->name('register');
    Route::post('register', [UserRegisterController::class, "register"])->name('register.submit');

    Route::controller(UserForgotPasswordController::class)->prefix("password")->name("password.")->group(function () {
        Route::get('forgot', 'showForgotForm')->name('forgot');
        Route::post('forgot/send/code', 'sendCode')->name('forgot.send.code');
        Route::get('forgot/code/verify/form/{token}', 'showVerifyForm')->name('forgot.code.verify.form');
        Route::post('forgot/verify/{token}', 'verifyCode')->name('forgot.verify.code');
        Route::get('forgot/resend/code/{token}', 'resendCode')->name('forgot.resend.code');
        Route::get('forgot/reset/form/{token}', 'showResetForm')->name('forgot.reset.form');
        Route::post('forgot/reset/{token}', 'resetPassword')->name('reset');
    });

    Route::controller(AuthorizationController::class)->prefix("authorize")->name('authorize.')->middleware("auth")->group(function () {
        Route::get('mail/{token}', 'showMailFrom')->name('mail');
        Route::post('mail/verify/{token}', 'mailVerify')->name('mail.verify');
        Route::get('mail/resend/{token}', 'mailResend')->name('mail.resend');
        Route::post('kyc/submit', 'kycSubmit')->name('kyc.submit');
        Route::get('google/2fa', 'showGoogle2FAForm')->name('google.2fa');
        Route::post('google/2fa/submit', 'google2FASubmit')->name('google.2fa.submit');
    });
});
