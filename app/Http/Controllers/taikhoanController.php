<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class taikhoanController extends Controller
{
    //
<<<<<<< HEAD
    public function tracuu()
    {
    	return view('quanlyTK.xemTK');
    }

    public function hienthi(Request $request)
    {
    	$username = $request->input('username');
    	$data = App\taikhoan::where('tenTK', $username)->get()->toArray();
    }
=======
>>>>>>> d182af555536602f611d1b559ac06c54f754a944
}
