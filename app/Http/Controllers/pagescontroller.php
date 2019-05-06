<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\view;

class pagescontroller extends Controller
{
    //
    public function index()
    {
    	return view('layouts.home');
    }

    public function index1()
    {
    	return view('ql_tk.thongke_nhom');
    }
}


