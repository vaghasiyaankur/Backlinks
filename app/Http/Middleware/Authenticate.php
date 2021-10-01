<?php

namespace App\Http\Middleware;

use Route;
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
        // if(Route::is('admin.*')) {
        //     return route('admin.login.show');
        // }

        if (! $request->expectsJson()) {
            return route('login');
        }

    }
}
