<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Helpers\Api\Helpers;
use App\Providers\Admin\BasicSettingsProvider;

class RegistrationCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $basic_settings = BasicSettingsProvider::get();
        // if($request->expectsJson()) {
        //     if($basic_settings->hospital_registration != true){
        //         $message = ['error'=>[__("Registration Option Currently Off")]];
        //         return Helpers::error($message);
        //     }
        // }

        // if ($basic_settings && $basic_settings->hospital_registration == false) {
        //     return back()->with(['warning' => [__('Registration System Is currently Off')]]);
        // }
        return $next($request);
    }
}
