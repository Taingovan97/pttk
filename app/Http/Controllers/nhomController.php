<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhom;
use Illuminate\Database\Eloquent;

class nhomController extends Controller
{
    //
    public function thongkeNhom()
    {
    	$data = nhom::orderBy('soLuongTruyen','desc')->get()->toArray();
        return view('quanlyTK.thongkeNhom', ['temp'=>$data]);
    }

    public function index()
    {
    	$group = nhom::all()->toArray();
    	return view('quanlyTK.nhom', ['temp'=>$group]);
    }

    public function xemNhom($id_nhom)
    {
    	$data = nhom::find($id_nhom);
    	$ds_tv = nhom::find($id_nhom)->thanhvien->toArray();
    	$ds_truyen = nhom::find($id_nhom)->truyen->toArray();
        $length = max([$data->soLuongTV, $data->soLuongTruyen]);
    	return view('quanlyTK.xemNhom', ['group'=>$data, 'ds_tv'=>$ds_tv, 'ds_truyen'=>$ds_truyen, 'length'=>$length]);
    }

    public function post_xemNhom(Request $request)
    {
        $ten = $request->input('keyword');
        $id = nhom::where('tenNhom', $ten)->value('maNhom');
        return redirect('xemNhom', ['id_nhom'=>$id]);    
    }

    public function xoaNhom($id_nhom)
    {
        $data = nhom::find($id_nhom);
        $data->delete();
        return view('thanhcong');
    }
}
