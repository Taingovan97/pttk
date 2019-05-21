<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Thanhviennhom_middleware
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
        if(Auth::guard('thanhvien')->user())
        {
            $user = Auth::guard('thanhvien')->user();
            if($user->nhom)
            {
                return $next($request);
            }else{
                return redirect()->route('formtaonhom');
            }

        }else{
            return redirect()->route('dangnhap');
        }

    }
}
