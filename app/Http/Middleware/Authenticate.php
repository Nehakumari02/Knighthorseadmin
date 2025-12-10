<?php

namespace App\Http\Middleware;

use App\Http\Helpers\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if ($request->routeIs('admin.*')) {
                return route('admin.login');
            } elseif ($request->routeIs("user.*")) {
                return route('user.login');
            } elseif ($request->routeIs("frontend.*")) {
                return route('user.login');
            }
            return route('frontend.index');
        }

        return abort(Response::error(['Access denied! Unauthenticated'], [], 401));
    }
}
