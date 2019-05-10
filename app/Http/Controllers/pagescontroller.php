<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\nhom;

class pagescontroller extends Controller
{
    //
    public function index()
    {
    	return view('layouts.home');
    }

    public function index1()
    {
    	return view('layouts.master_qltk');
    }

    public function nhom()
    {
    	return view('quanlyTK.nhom');
    }
}


