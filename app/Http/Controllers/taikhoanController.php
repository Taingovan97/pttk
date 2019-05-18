<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thanhvien;
class taikhoanController extends Controller
{

    //tra cuu tai khoan
    //
    public function tracuu()
    {
    	return view('quanlyTK.tracuuTK');
    }

    //hien thi thong tin TK
    public function hienthi(Request $request)
    {
    	$tk = thanhvien::pluck('name')->toArray();
        $ten = $request->input('keyword');
    	if(in_array($ten, $tk))
        {
            $data = thanhvien::where('name', $ten)->get()->toArray();
            return view('quanlyTK.xemTK', ['ten'=>$data[0]['name'], 'email'=>$data[0]['email'], 'genre'=>$data[0]['gioiTinh'], 'maTK'=>$data[0]['maTK'], 'sdt'=>$data[0]['sdt'], 'time'=>$data[0]['create_at']]);
        }
        else
            return view('notFound');

    }

    //tim tai khoan
    public function find()
    {
        return view('quanlyTK.timTK');
    }

    //xoa TK
    public function xoaTK(Request $request)
    {
        $tk = thanhvien::pluck('name')->toArray();
        $ten = $request->input('keyword');
        if(in_array($ten, $tk))
        {
            
            $account = thanhvien::where('name', $ten);
            $data = thanhvien::where('name', $ten)->get()->toArray();
            return view('quanlyTK.xem_xoaTK', ['account'=>$account, 'ten'=>$data[0]['name'], 'email'=>$data[0]['email'], 'genre'=>$data[0]['gioiTinh'], 'maTK'=>$data[0]['maTK'], 'sdt'=>$data[0]['sdt'], 'active'=>$data[0]['active']]);
        }
        else
            return view('notFound');

    }

 
    public function ttcanhan()
    {
        return view('quanlyTK.xemTKCN');
    }

}
