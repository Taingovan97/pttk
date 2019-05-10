<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Support\Facades\Auth;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        // $this->middleware('auth');
        // $this->user = Auth::guard('taikhoan')->user();
        // $this->kiemTraDangNhap($this->user);
    }

    function kiemTraDangNhap($user)
    {
        if($user)
        {
//            return view('Khach.DangKy');
            view()->share('tkdangnhap', $user);
        }
        else{
            return view('Khach.DangKy');

        }
    }
}
