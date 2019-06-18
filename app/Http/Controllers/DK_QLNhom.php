<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\nhom;
use App\thanhvien;
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
        $truongnhom = thanhvien::find(Auth::guard('thanhvien')->user()->maTK);
        $nhom->tenNhom = $request->tennhom;
        $nhom->gioiThieu = $request->gioithieu;
        $nhom->maTruongNhom = Auth::guard('thanhvien')->user()->maTK;
        $nhom->ngayLap = Carbon::now('Asia/Ho_Chi_Minh');
        $nhom->save();

        $loadNhom = nhom::where('tenNhom',$request->tennhom)->get()->toArray();
        $truongnhom->maNhom = $loadNhom[0]['maNhom'];
        $truongnhom->save();


        return redirect()->route('formtaonhom')->with('thongbao', 'Tạo nhóm thành công!');

    }

    public function getSuaThongTinNhom(){
        $user = Auth::guard('thanhvien')->user();
        if($user->maTK == $user->getNhom->maTruongNhom)
            return view('tvNhom.SuaThongTinNhom');
        else
            return redirect()->route('trangchunhom');
    }

    public function postSuaThongTinNhom(Request $request){
            $this->validate($request,[
            'tennhom'=>'min:4',
            'truongnhom' => 'required',
            'gioithieu'=> 'min:8|max:70',

           ],[
               'tennhom.min' => 'Tên người dùng phải chứa ít nhất 4 ký tự',
               'truongnhom.required' => 'Bạn chưa nhập email',
               'matkhaucu.required' => 'Bạn chưa nhập mật khẩu',
               'gioithieu.min' => 'Nội dụng giới thiệu không ít hơn 8 ký tự',
               'gioithieu.max' => 'Nội dung giới thiệu vượt quá 32 ký tự',
           ]);

            $nhom_check = nhom::all();
            foreach ($nhom_check as $n)
            {
                if($n->tenNhom == $request->tennhom and $n->maNhom !=Auth::user()->maNhom)
                    return redirect()->route('suathongtinnhom')->with('thongbao','Tên nhóm đã được đặt');
            }

            $nhom = nhom::find(Auth::user()->maNhom);
            $nhom->tenNhom = $request->tennhom;

            $user = thanhvien::where('name',$request->truongnhom)->where('maNhom',Auth::guard('thanhvien')->user()->maNhom)->get();
            if(count($user)!=0)
            {
                $user = $user[0];
                $nhom->maTruongNhom = $user->maTK;

            }else
                return redirect()->route('suathongtinnhom')->with('thongbao','Thành viên này không thuộc nhóm');

            $nhom->gioiThieu = $request->gioithieu;

            if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $nhom->linkAnh = 'cover_nhom/'.strval($nhom->maNhom).'.png';
            $file->move('cover_nhom', strval($nhom->maNhom).'.png');
            }
            $nhom->save();

            return redirect()->route('suathongtinnhom')->with('thongbao', 'Sửa thông tin thành công!');

    }
    public function xoaThanhVienNhom($maTK){
        DB::table('thanhvien')
            ->where('maTK',$maTK)
            ->update(['maNhom' => null]);
        return redirect()->route('thanhviennhom');
    }

    public function getThemThanhVien(){

        $nhom = Auth::guard('thanhvien')->user()->getNhom;
        if($nhom->maTruongNhom == Auth::guard('thanhvien')->user()->maTK)
        {
          $manhom = $nhom->maNhom;
            $thanhviens = thanhvien::when($manhom, function($query,$manhom){
                $query->where('maNhom','<>',$manhom)
                ->orWhereNull('maNhom');
            })->paginate(4);
            return view('tvNhom.ThemThanhVien',['thanhviens'=>$thanhviens,'slthanhvien'=>$thanhviens->count()]);
        }
        else
            return view('trangchunhom');
    }

    public function themThanhVien($name){
      if(Auth::guard('thanhvien')->user()->getNhom->maNhom != Auth::guard('thanhvien')->user()->maNhom)
        return redirect()->route('trangchunhom');

      $thanhvien = thanhvien::where('name',$name)->get()[0];
      if(!$thanhvien->maNhom)
      {
        $thanhvien->maNhom = Auth::guard('thanhvien')->user()->maNhom;
        $thanhvien->save();
      }

      return redirect()->route('getthemthanhvien');
    }



}
