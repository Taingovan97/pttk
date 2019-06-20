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
    	$data = nhom::all();
        return view('quanlyTK.thongkeNhom', ['temp'=>$data]);
    }

    public function index()
    {
    	$group = nhom::all();
    	return view('quanlyTK.nhom', ['temp'=>$group]);
    }

    public function xemNhom($id_nhom)
    {
    	$data = nhom::find($id_nhom);
    	$ds_tv = nhom::find($id_nhom)->getThanhVien->toArray();
    	$ds_truyen = nhom::find($id_nhom)->getTruyen->toArray();
        $length = max([$data->getSoLuongThanhVien(), $data->getSoLuongTruyen()]);
    	return view('quanlyTK.xemNhom', ['group'=>$data, 'ds_tv'=>$ds_tv, 'ds_truyen'=>$ds_truyen, 'length'=>$length]);
    }

    public function post_xemNhom(Request $request)
    {
        $ten = $request->input('keyword');
        $id = nhom::where('tenNhom', $ten)->value('maNhom');
        return redirect()->route('xemNhom', ['id_nhom'=>$id]);    
    }

    public function xoaNhom($id_nhom)
    {
        $data = nhom::find($id_nhom);
        $data->delete();
        return redirect()->route('nhom')->with('thongbao', "Đã xóa thành công");    }
}
