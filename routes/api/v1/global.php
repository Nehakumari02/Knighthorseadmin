<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\User\SettingController;

// Settings
Route::controller(SettingController::class)->prefix("settings")->group(function () {
    Route::get("basic-settings", "basicSettings");
    Route::get("unit", "unit");
    Route::get("delivery", "delivery");
    Route::get("shipment", "shipment");
    Route::get("splash-screen", "splashScreen");
    Route::get("onboard-screens", "onboardScreens");
    Route::get("languages", "getLanguages");
    Route::get("country-list", "countryList");
    Route::get("frontend/data", "frontendData");
    Route::post("search/product", "productSearch");
});


Route::controller(ProductController::class)->prefix("product")->group(function () {
    Route::get("/", "product");
    Route::post("list", "list"); // 👈 ADD THIS LINE HERE
    Route::post("popular", "popular");
     Route::post("special/offer", "specialOffer");
    Route::post("sub-category/product", "subCatProduct");
    Route::post("details", "productDetails");
    Route::get("category", "category");
    Route::get("sub-category", "sub_category");
    Route::get("area", "area");
    Route::post("area/wise", "areaWiseProduct");
});
