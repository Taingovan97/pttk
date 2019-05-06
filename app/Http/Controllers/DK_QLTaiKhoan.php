<?php

namespace App\Http\Controllers;

use App\taikhoan;
use App\thanhvien;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;
class DK_QLTaiKhoan extends Controller
{
    public function run()
    {
    	
    }
    public function getDangKy(){
        return view('Khach.DangKy');
    }
    public function getDangNhap(){
        return view('Khach.DangNhap');
    }
    function postTaoTaiKhoan(Request $request){
        $this->validate($request,[
           'tentaikhoan'=>'required|min:4',
            'email' => 'required|email|unique:thanhvien,email',
            'matkhau'=> 'required| min:8|max:32',
            'nhaplaimatkhau' =>'required|same:matkhau',
            'dongy' => 'required'
        ],[
            'tentaikhoan.required' =>'Bạn chưa nhập tên người dùng',
            'tentaikhoan.min' => 'Tên người dùng phải chứa ít nhất 4 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Địa chỉ đã tồn tại',
            'matkhau.required' => 'Bạn chưa nhập mật khẩu',
            'matkhau.min' => 'Mật khẩu phải phải chứa ít nhất 3 ký tự',
            'matkhau.max' => 'Mật khẩu không vượt quá 32 ký tự',
            'nhaplaimatkhau.required' => 'Bạn phải nhập lại mật khẩu',
            'nhaplaimatkhau.same' => 'Mật khẩu nhập lại chưa đúng',
            'dongy.required' => 'Bạn chưa đồng ý điều khoản'
        ]);
        $taikhoan = new taikhoan;
        $thanhvien = new thanhvien;
        $n_current_tk = DB::table('taikhoan')->count();
        $n_current_tv = DB::table('thanhvien')->count();
        $taikhoan ->maTK = 'TK'.strval($n_current_tk);
        $taikhoan ->tenTK = $request ->tentaikhoan;
        $taikhoan ->matKhau = bcrypt($request ->matkhau);
        $taikhoan ->code_verify ='test_code';
        $taikhoan ->save();
        $thanhvien->maTV ='TV'.strval($n_current_tv);
        $thanhvien->hoTen = $request->tentaikhoan;
        $thanhvien->gioiTinh = 'Nam';
        $thanhvien->email = $request->email;
        $thanhvien->maTK ='TK'.strval($n_current_tk);
        $thanhvien->save();

        return redirect('user.active')->with('thongbao', 'Đăng ký thày công');
    }

    function dangNhap(Request $request){

    }

}
