<?php

use App\Http\Controllers\Admin\ProductOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;

Route::name('frontend.')->group(function () {
    Route::controller(IndexController::class)->group(function () {
        Route::get('/', 'index')->name('index');
         Route::get('offer-section', 'offerSection')->name('offer.section');
        Route::get('product/details/{uuid}', 'productDetails')->name('product.details');
        Route::post('area/switch', 'areaSwitch')->name('area.switch');
        Route::post('languages/switch', 'languageSwitch')->name('languages.switch');
        Route::get('change/{lang?}', 'changeLanguage')->name('lang');
        Route::get('product/list/{slug}', 'productList')->name('product.list');
        Route::get('link/{slug}', 'link')->name('link');
        Route::get('search/product', 'searchProduct')->name('product.search');
    });


    Route::controller(ProductOrderController::class)->name('product.order.')->group(function () {
        Route::get('get-service/{slug}', 'getService')->name('index')->middleware('auth');
        Route::post('store', 'store')->name('store');
        Route::get('preview/{uuid}', 'preview')->name('preview')->middleware('auth');
        Route::post('confirm', 'confirm')->name('confirm');
        Route::get('success/response/{gateway}', 'success')->name('payment.success');
        Route::get("cancel/response/{gateway}", 'cancel')->name('payment.cancel');
        Route::post("callback/response/{gateway}", 'callback')->name('payment.callback')->withoutMiddleware(['web', 'auth', 'verification.guard', 'user.google.two.factor']);

        // POST Route For Unauthenticated Request
        Route::post('success/response/{gateway}', 'postSuccess')->name('payment.success')->withoutMiddleware(['auth', 'verification.guard', 'user.google.two.factor']);
        Route::post('cancel/response/{gateway}', 'postCancel')->name('payment.cancel')->withoutMiddleware(['auth', 'verification.guard', 'user.google.two.factor']);

        // redirect with HTML form route
        Route::get('redirect/form/{gateway}', 'redirectUsingHTMLForm')->name('payment.redirect.form')->withoutMiddleware(['auth', 'verification.guard', 'user.google.two.factor']);

        //redirect with Btn Pay
        Route::get('redirect/btn/checkout/{gateway}', 'redirectBtnPay')->name('payment.btn.pay')->withoutMiddleware(['auth', 'verification.guard', 'user.google.two.factor']);

        Route::get('paystack/pay/callback', 'paystackPayCallBack')->name('paystack.pay.callback');
    });
});
