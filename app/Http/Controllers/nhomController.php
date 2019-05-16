<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhom;

class nhomController extends Controller
{
    //
    public function thongkeNhom()
    {
    	return view('quanlyTK.thongkeNhom');
    }

    public function index()
    {
    	$group = nhom::all()->toArray();
    	$length = sizeof($group);
    	return view('quanlyTK.nhom', ['temp'=>$group]);
    }

    public function xemNhom($id_nhom)
    {
    	$data = nhom::find($id_nhom);
    	$ds_tv = nhom::find($id_nhom)->thanhvien->toArray();
    	$ds_truyen = nhom::find($id_nhom)->truyen->toArray();
    	return view('quanlyTK.xemNhom', ['group'=>$data, 'ds_tv'=>$ds_tv, 'ds_truyen'=>$ds_truyen]);
    }
}
