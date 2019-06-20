<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\thanhvien;
use App\admin;
class taikhoanController extends Controller
{


    
    

    //tra cuu tai khoan
    //

    public function tracuu()
    {
    	return view('quanlyTK.tracuuTK');
    }

    //hien thi thong tin tk
    public function hienthi(Request $request)
    {
        $tk1 = thanhvien::pluck('name')->toArray();
        $tk2 = admin::pluck('name')->toArray();
        $ten = $request->input('keyword');
        if(in_array($ten, $tk1))
        {
            
            $account = thanhvien::where('name', $ten);
            $data = thanhvien::where('name', $ten)->get();
            $nhom = $data[0]->getNhom->toArray();
            $name = $nhom['tenNhom'];
            return view('quanlyTK.xemTK', ['account'=>$data[0], 'nhom'=>$name]);
        }
        elseif (in_array($ten, $tk2)) {
            $data = admin::where('name', $ten)->get();
            return view('quanlyTK.xemTK', ['account'=>$data[0]]);
        }
        else
            return view('quanlyTK.tracuuTK');

    }

    public function xoaTK(Request $request)
    {
      $tk = thanhvien::pluck('name')->toArray();
      $tk2 = admin::pluck('name')->toArray();
        $ten = $request->input('keyword');
        if ($ten!= Auth::guard('admin')->user()->name) {
            # code...
        
            if(in_array($ten, $tk))
            {
            
                $account = thanhvien::where('name', $ten)->get();
                return view('quanlyTK.xem_xoaTK', ['account'=>$account]);
            }
            elseif (in_array($ten, $tk2)) {
                $data = admin::where('name', $ten)->get();
                return view('quanlyTK.xem_xoaTK', ['account'=>$data]);
            }
            else
                return view('quanlyTK.timTK'); 
    }
        else
            return view('quanlyTK.timTK');  
    }
    
    public function da_xoa($ten)
    {
        $tk1 = thanhvien::pluck('name')->toArray();
        if(in_array($ten, $tk1)){
            $account = thanhvien::where('name', $ten)->get();
            $account[0]->delete();
        }
        else{
            $account = admin::where('name', $ten)->get();
            $account[0]->delete();
        }
        return redirect()->route('tim_xoaTK')->with('thongbao', 'Đã xóa thành công');
    }
 
    public function ttcanhan()
    {
        return view('quanlyTK.xemTKCN');
    }

    public function suaTK($ten)
    {
        return view('quanlyTK.suaTK', ['ten'=>$ten]);
    }

     public function suaTK_ND($ten)
    {
        return view('quanlyND.suaTK', ['ten'=>$ten]);
    }
}
