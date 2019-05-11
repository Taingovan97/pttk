<?php

namespace App\Http\Controllers;

use App\thanhvien;
use App\admin;
use App\truyen;
use App\chuongtruyen;
use App\UserActivation;
use App\Classes\ActivationService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DK_QLTaiKhoan extends Controller
{

    protected $activationService;


    public function getDangKy(){
    return view('Khach.DangKy');
}
    public function getDangNhap(){
        return view('Khach.DangNhap');
    }
    protected function dangKyTaiKhoan(Request $request){

//        $this->activationService = new ActivationService(new UserActivation);
//        $this->validate($request,[
//           'tentaikhoan'=>'required|min:4',
//            'email' => 'required|email|unique:taikhoans,email',
//            'matkhau'=> 'required| min:8|max:32',
//            'nhaplaimatkhau' =>'required|same:matkhau',
//            'dongy' => 'required'
//        ],[
//            'tentaikhoan.required' =>'Bạn chưa nhập tên người dùng',
//            'tentaikhoan.min' => 'Tên người dùng phải chứa ít nhất 4 ký tự',
//            'email.required' => 'Bạn chưa nhập email',
//            'email.email' => 'Email không hợp lệ',
//            'email.unique' => 'Địa chỉ đã tồn tại',
//            'matkhau.required' => 'Bạn chưa nhập mật khẩu',
//            'matkhau.min' => 'Mật khẩu phải phải chứa ít nhất 3 ký tự',
//            'matkhau.max' => 'Mật khẩu không vượt quá 32 ký tự',
//            'nhaplaimatkhau.required' => 'Bạn phải nhập lại mật khẩu',
//            'nhaplaimatkhau.same' => 'Mật khẩu nhập lại chưa đúng',
//            'dongy.required' => 'Bạn chưa đồng ý điều khoản'
//        ]);

        $thanhvien = new thanhvien;
        $thanhvien->name = $request ->tentaikhoan;
        $thanhvien->password = bcrypt($request ->matkhau);
        $thanhvien->email = $request->email;
        $thanhvien->create_at =  Carbon::now('Asia/Ho_Chi_Minh');
        $thanhvien->save();
//        $this->activationService->sendActivationMail($thanhvien);

        return redirect('dangnhap')->with('thongbao', 'Đăng ký thành công');
    }

    public function xacThuc($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            return redirect('/dangnhap');
        }
        abort(404);
    }

    protected  function dangNhapThanhVien(Request $request){
        $username = $request['tentaikhoan'];
        $password = $request['matkhau'];

        if(Auth::attempt(['name'=>$username,'password' => $password]))
        {
               return redirect()->route('trangchu');

        }else{
            return redirect()->route('taoformdangnhap');
        }
    }

    protected function dangxuatThanhVien()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('trangchu');
    }

    protected function capTaiKhoan(Request $request){

//        $this->activationService = new ActivationService(new UserActivation);
//        $this->validate($request,[
//           'tentaikhoan'=>'required|min:4',
//            'email' => 'required|email|unique:taikhoans,email',
//            'matkhau'=> 'required| min:8|max:32',
//            'nhaplaimatkhau' =>'required|same:matkhau',
//            'dongy' => 'required'
//        ],[
//            'tentaikhoan.required' =>'Bạn chưa nhập tên người dùng',
//            'tentaikhoan.min' => 'Tên người dùng phải chứa ít nhất 4 ký tự',
//            'email.required' => 'Bạn chưa nhập email',
//            'email.email' => 'Email không hợp lệ',
//            'email.unique' => 'Địa chỉ đã tồn tại',
//            'matkhau.required' => 'Bạn chưa nhập mật khẩu',
//            'matkhau.min' => 'Mật khẩu phải phải chứa ít nhất 3 ký tự',
//            'matkhau.max' => 'Mật khẩu không vượt quá 32 ký tự',
//            'nhaplaimatkhau.required' => 'Bạn phải nhập lại mật khẩu',
//            'nhaplaimatkhau.same' => 'Mật khẩu nhập lại chưa đúng',
//            'dongy.required' => 'Bạn chưa đồng ý điều khoản'
//        ]);

        $admin = new admin;
        $admin->name = $request ->tentaikhoan;
        $admin->password = bcrypt($request ->matkhau);
        $admin->email = $request->email;
        $admin->create_at =  Carbon::now('Asia/Ho_Chi_Minh');
        $admin->quyen = $request->quyen;
        $admin->save();
//        $this->activationService->sendActivationMail($thanhvien);

        return redirect()->route('captaikhoan')->with('thongbao', 'Tao tai khoan thành công');
    }

    protected  function dangNhapAdmin(Request $request)
    {
        $username = $request['tentaikhoan'];
        $password = $request['matkhau'];

        if(Auth::guard('admin')->attempt(['name'=>$username,'password' => $password]))
        {
               return redirect()->route('trangchu');

        }else{
            return redirect()->route('taoformdangnhapadmin');
        }
    }

    protected function dangxuatAdmin(){

        Auth::guard('admin')->logout();
        return redirect()->route('trangchu');
    }

}
