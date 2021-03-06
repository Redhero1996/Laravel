<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // ktra người dùng có đang đăng nhập k
        if(Auth::check() && (Auth::user()->quyen == 1)){           
                return $next($request);           
        }else{
            return redirect('admin/login');
        }
        
    }
}
