<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thanhvien;
class taikhoanController extends Controller
{

    
    //tra cuu tai khoan
    public function tracuu()
    {
    	return view('quanlyTK.tracuuTK');
    }

    //hien thi thong tin tk
    public function hienthi(Request $request)
    {
        $tk = thanhvien::pluck('name')->toArray();
        $ten = $request->input('keyword');
        if(in_array($ten, $tk))
        {
            
            $account = thanhvien::where('name', $ten);
            $data = thanhvien::where('name', $ten)->get()->toArray();
            return view('quanlyTK.xemTK', ['account'=>$account, 'ten'=>$data[0]['name'], 'email'=>$data[0]['email'], 'genre'=>$data[0]['gioiTinh'], 'id'=>$data[0]['maTK'], 'sdt'=>$data[0]['sdt'], 'active'=>$data[0]['active']]);
        }
        else
            return view('notFound');

    }

    //tim de xoa
    public function find()
    {
        return view('quanlyTK.timTK');
    }

    public function xoaTK(Request $request)
    {
      $tk = thanhvien::pluck('name')->toArray();
        $ten = $request->input('keyword');
        if(in_array($ten, $tk))
        {
            
            $account = thanhvien::where('name', $ten);
            $data = thanhvien::where('name', $ten)->get()->toArray();
            return view('quanlyTK.xem_xoaTK', ['account'=>$account, 'ten'=>$data[0]['name'], 'email'=>$data[0]['email'], 'genre'=>$data[0]['gioiTinh'], 'id'=>$data[0]['maTK'], 'sdt'=>$data[0]['sdt'], 'active'=>$data[0]['active']]);
        }
        else
            return view('notFound');  
    }
    
    public function da_xoa($id)
    {
        $account = thanhvien::find($id);
        $account->delete();
        return view('thanhcong');
    }
 
    public function ttcanhan()
    {
        return view('quanlyTK.xemTKCN');
    }


}
