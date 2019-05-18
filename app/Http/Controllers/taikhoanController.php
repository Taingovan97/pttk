<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class taikhoanController extends Controller
{
    //
    public function tracuu()
    {
    	return view('quanlyTK.xemTK');
    }

    public function hienthi(Request $request)
    {
    	$username = $request->input('username');
    	$data = App\taikhoan::where('tenTK', $username)->get()->toArray();
    }
}
