<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\nhom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DK_QLNhom extends Controller
{
    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('apps_countries')
        ->where('country_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->country_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

    public function thongTinNhom()
    {
             return view('tvNhom.XemThongTinNhom');

    }
    public function postTaoNhom(Request $request){
        $this->validate($request,[
            'tennhom'=>'required|min:4|unique:nhom,tenNhom',
        ],[
            'tennhom.min' => 'Tên nhóm phải chứa ít nhất 4 ký tự',
            'tennhom.required' => 'Bạn chưa nhập tên nhóm',
            'tennhom.unique'=>'Tên nhóm đã tồn tại',
        ]);
        $nhom = new nhom;

        $nhom->tenNhom = $request->tennhom;
        $nhom->gioiThieu = $request->gioithieu;
        $nhom->maTruongNhom = Auth::guard('thanhvien')->user()->maTK;
        $nhom->ngayLap = Carbon::now('Asia/Ho_Chi_Minh');
        $nhom->save();

        return redirect()->route('formtaonhom')->with('thongbao', 'Tạo nhóm thành công!');

    }

    public function getSuaThongTinNhom($maTK){

        if(Auth::guard('thanhvien')->user()->maTK == $maTK)
            return view('tvNhom.SuaThongTinNhom');
        else
            return redirect()->route('trangchunhom');
    }

    public function xoaThanhVienNhom($maTK){
        DB::table('thanhvien')
            ->where('maTK',$maTK)
            ->update(['maNhom' => null]);
    }

    public function getThemThanhVien(){

        $nhom = Auth::guard('thanhvien')->user()->getNhom;
        if($nhom->maTruongNhom == Auth::guard('thanhvien')->user()->maTK)
            return view('tvNhom.ThemThanhVien');
        else
            return view('trangchunhom');
    }



}
