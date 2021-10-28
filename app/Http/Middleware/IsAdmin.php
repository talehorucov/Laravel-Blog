<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role_id != null) {
            return $next($request);
        }
        $notification = [
            'message' => 'Buraya keçid edə bilməzsiz !',
            'alert-type' => 'error'
        ];
        return redirect()->route('admin.loginForm')->with($notification);
    }
}
