<?php

namespace App\Http\Controllers;

use App\thanhvien;
use App\admin;
use App\truyen;
use App\chuongtruyen;
use App\UserActivation;
use App\CapMatKhau;
use App\Mail\ResetPassowrd;
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
use Illuminate\Auth\Events\Registered;
use App\Classes\ActivationService;
use Mail;
class DK_QLTaiKhoan extends Controller
{

    public function __construct(ActivationService $activationService)
    {
        $this->activationService = $activationService;
    }
//    protected $activationService;


    public function getDangKy(){

        return view('auth.DangKy');

    }

    protected function dangKyTaiKhoan(Request $request){

       $this->activationService = new ActivationService(new UserActivation);
       $this->validate($request,[
          'tentaikhoan'=>'required|unique:thanhvien,name|min:4',
           'email' => 'required|email|unique:thanhvien,email',
          'matkhau'=> 'required| min:8|max:32',
           'nhaplaimatkhau' =>'required|same:matkhau',
           'dongy' => 'required'
       ],[
           'tentaikhoan.required' =>'Bạn chưa nhập tên người dùng',
           'tentaikhoan.unique'=>'Tên tài khoản đã tồn tại',
           'tentaikhoan.min' => 'Tên người dùng phải chứa ít nhất 4 ký tự',
           'email.required' => 'Bạn chưa nhập email',
           'email.email' => 'Email không hợp lệ',
           'email.unique' => 'Địa chỉ đã tồn tại',
          'matkhau.required' => 'Bạn chưa nhập mật khẩu',
          'matkhau.min' => 'Mật khẩu phải phải chứa ít nhất 8 ký tự',
          'matkhau.max' => 'Mật khẩu không vượt quá 32 ký tự',
           'nhaplaimatkhau.required' => 'Bạn phải nhập lại mật khẩu',
           'nhaplaimatkhau.same' => 'Mật khẩu nhập lại chưa đúng',
           'dongy.required' => 'Bạn chưa đồng ý điều khoản'
       ]);


        $thanhvien = new thanhvien;
        $thanhvien->name = $request ->tentaikhoan;
        $thanhvien->password = bcrypt($request ->matkhau);
        $thanhvien->email = $request->email;
        $thanhvien->create_at =  Carbon::now('Asia/Ho_Chi_Minh');
        $thanhvien->save();
        $this->activationService->sendActivationMail($thanhvien);

        return redirect('dangnhap')->with('thongbao', 'Đăng ký thành công');
    }

    public function xacThuc($token)
    {
        if ($user = $this->activationService->activateUser($token)) {
            return redirect('/dangnhap');
        }
        abort(404);
    }

    public function capLaiMatKhau(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'matkhau'=> 'required| min:8|max:32',
            'nhaplaimatkhau' =>'required|same:matkhau',
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email không hợp lệ',
            'matkhau.required' => 'Bạn chưa nhập mật khẩu',
            'matkhau.min' => 'Mật khẩu phải phải chứa ít nhất 8 ký tự',
            'matkhau.max' => 'Mật khẩu không vượt quá 32 ký tự',
            'nhaplaimatkhau.required' => 'Bạn phải nhập lại mật khẩu',
            'nhaplaimatkhau.same' => 'Mật khẩu nhập lại chưa đúng',
        ]);

    $taikhoan = thanhvien::where('email',$request->email)->first();

    $checks = CapMatKhau::where('maTK',$taikhoan->maTK)->get();
    foreach ($checks as $check)
        $check->delete();
    $capmatkhaumoi = new CapMatKhau;
    $token = $capmatkhaumoi->createCode($taikhoan, $request->matkhau);
    $link =route('xacnhanmatkhau',['token'=>$token]);
    $mailable = new ResetPassowrd($link);
    Mail::to($request->email)->send($mailable);
    return redirect()->route('trangchu');
    }

    protected function xacNhanMatKhau($token){
        $xacnhan = CapMatKhau::find($token);
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        if(strtotime($xacnhan->ngay_doi) + 3600 * 24 < time())
            echo 'link hết hạn, Bạn vui lòng thử lại!';
        else{
            if($xacnhan)
            {
                $thanhvien = thanhvien::find($xacnhan->maTK);
                $thanhvien->password = bcrypt($xacnhan->matKhauMoi);
                $thanhvien->save();
                Auth::attempt(['name'=>$thanhvien->name, 'password' => $xacnhan->matKhauMoi]);
                $xacnhan->delete();
            }

            return redirect()->route('trangchu');
        }


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
        Auth::guard('thanhvien')->logout();
        return redirect()->route('trangchu');
    }

    protected function capTaiKhoan(Request $request){

       $this->activationService = new ActivationService(new UserActivation);
       $this->validate($request,[
          'tentaikhoan'=>'required|min:4',
           'email' => 'required|email|unique:admin,email',
           'matkhau'=> 'required| min:8|max:32',
           'nhaplaimatkhau' =>'required|same:matkhau',
       ],[
           'tentaikhoan.required' =>'Bạn chưa nhập tên người dùng',
           'tentaikhoan.unique'=>'Tên tài khoản đã tồn tại',
           'tentaikhoan.min' => 'Tên người dùng phải chứa ít nhất 4 ký tự',
           'email.required' => 'Bạn chưa nhập email',
           'email.email' => 'Email không hợp lệ',
           'email.unique' => 'Địa chỉ đã tồn tại',
           'matkhau.required' => 'Bạn chưa nhập mật khẩu',
           'matkhau.min' => 'Mật khẩu phải phải chứa ít nhất 8 ký tự',
           'matkhau.max' => 'Mật khẩu không vượt quá 32 ký tự',
           'nhaplaimatkhau.required' => 'Bạn phải nhập lại mật khẩu',
           'nhaplaimatkhau.same' => 'Mật khẩu nhập lại chưa đúng',
       ]);

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
    protected function postSuaTaiKhoan(Request $request)
    {
            $this->validate($request,[
            'tentaikhoan'=>'min:4',
            'email' => 'required|email',
            'matkhaucu'=> 'required',
            'nhaplaimatkhau' =>'same:matkhaumoi',

       ],[
           'tentaikhoan.min' => 'Tên người dùng phải chứa ít nhất 4 ký tự',
           'email.required' => 'Bạn chưa nhập email',
           'email.email' => 'Email không hợp lệ',
           'matkhaucu.required' => 'Bạn chưa nhập mật khẩu',
           'nhaplaimatkhau.same' => 'Mật khẩu nhập lại chưa đúng',
       ]);

            $users_email = thanhvien::where('email','<>',Auth::guard('thanhvien')->user()->email)->get();
            $user_ten = thanhvien::where('name','<>',Auth::guard('thanhvien')->user()->name)->get();

            foreach ($users_email as $user) {
              if ($user->name==$request->tentaikhoan) {
                return redirect()->route('formsuatk',['ten'=>$user->name])->with('thongbao', 'Tên tài khoản đã được sử dụng');
                break;
              }
            }

            foreach ($user_ten as $user) {
              if( $user->email == $request->email)
              {
                return redirect()->route('formsuatk',['ten'=>$thanhvien->name])->with('thongbao', 'Email đã được sử dụng');
                break;
              }
            }

            $thanhvien = thanhvien::find(Auth::guard('thanhvien')->user()->maTK);
            if($request->matkhaumoi)
            {
                $this->validate($request,[
                    'matkhaumoi'=> 'min:8|max:32'
                ],[
                    'matkhaumoi.min' => 'Mật khẩu mớikhông ít hơn 8 ký tự',
                    'matkhaumoi.max' => 'Mật khẩu mới không vượt quá 32 ký tự'
                ]);

            }
            if(Hash::check($request->matkhaucu, $thanhvien->password))
            {
                $thanhvien->name = $request ->tentaikhoan;
                if ($request->matkhaumoi) {
                    $thanhvien->password = bcrypt($request ->matkhaumoi);
                }
                $thanhvien->email = $request->email;
                if ($request->std) {
                    $this->validate($request,[
                        'std'=>'min:10',
                    ],[
                        'std.min'=>'sô điện thoại không hợp lệ',
                    ]);
                    $thanhvien->sdt = $request->sdt;
                }
                if ($request->hasFile('avatar')) {
                    $file = $request->avatar;
                    $thanhvien->avatar = 'avatar/'.strval($user->maTK).'.png';
                    $file->move('avatar', strval($user->maTK).'.png');
                }
                $thanhvien->save();
                Auth::attempt(['name'=>$request->tentaikhoan,'password' => $request->matkhaumoi]);
                return redirect()->route('thongtintaikhoan');
            }else{
                return redirect()->route('formsuatk',['ten'=>$thanhvien->name])->with('thongbao', 'Mật khẩu sai');
            }

    }

    protected function suaTK_admin(Request $request)
    {
            
            $this->validate($request,[
          'tentaikhoan'=>'min:4',
           'email' => 'required|email',
           'matkhaucu'=> 'required',
           'matkhaumoi'=> 'required| min:8|max:32',
           'nhaplaimatkhau' =>'required|same:matkhaumoi',
           'sdt'=>'min:10',

       ],[
           'tentaikhoan.min' => 'Tên người dùng phải chứa ít nhất 4 ký tự',
           'email.required' => 'Bạn chưa nhập email',
           'email.email' => 'Email không hợp lệ',
           'matkhaucu.required' => 'Bạn chưa nhập mật khẩu',
           'matkhaumoi.required' => 'Bạn chưa nhập mật khẩu',
           'matkhaumoi.min' => 'Mật khẩu phải phải chứa ít nhất 8 ký tự',
           'matkhaumoi.max' => 'Mật khẩu không vượt quá 32 ký tự',
           'nhaplaimatkhau.required' => 'Bạn phải nhập lại mật khẩu',
           'nhaplaimatkhau.same' => 'Mật khẩu nhập lại chưa đúng',
           'sdt.min'=>'sô điện thoại không hợp lệ',
       ]);
            $name = Auth::guard('admin')->user()->name;
            $users_email = admin::where('email','<>',Auth::guard('admin')->user()->email)->get();
            $user_ten = admin::where('name','<>',Auth::guard('admin')->user()->name)->get();

            foreach ($users_email as $user) {
              if ($user->name==$request->tentaikhoan) {
                return redirect()->route('suaTK', ['ten'=>$name])->with('thongbao', 'Tên tài khoản đã được sử dụng');
                break;
              }
            }

            foreach ($user_ten as $user) {
              if( $user->email == $request->email)
              {
                return redirect()->route('suaTK', ['ten'=>$name])->with('thongbao', 'email đã được sử dụng');
                break;
              }
            }

            $admin = admin::find(Auth::guard('admin')->user()->maTK);
            if(Hash::check($request->matkhaucu, $admin->password))
            {
              $admin->name = $request ->tentaikhoan;
              $admin->password = bcrypt($request ->matkhaumoi);
              $admin->email = $request->email;
              if (isset($request->sdt)) {
                $admin->sdt = $request->sdt;
              }
              $admin->save();
              return redirect()->route('suaTK', ['ten'=>$admin->name])->with('thongbao', 'Sửa thông tin thành công!');
            }
            else
              return redirect()->route('suaTK', ['ten'=>$name])->with('thongbao', 'Mật khẩu sai');
                      

    }
    protected function postsuaTK_admin(Request $request)
    {
            
            $this->validate($request,[
          'tentaikhoan'=>'min:4',
           'email' => 'required|email',
           'matkhaucu'=> 'required',
           'matkhaumoi'=> 'required| min:8|max:32',
           'nhaplaimatkhau' =>'required|same:matkhaumoi',
           'sdt'=>'min:10',

       ],[
           'tentaikhoan.min' => 'Tên người dùng phải chứa ít nhất 4 ký tự',
           'email.required' => 'Bạn chưa nhập email',
           'email.email' => 'Email không hợp lệ',
           'matkhaucu.required' => 'Bạn chưa nhập mật khẩu',
           'matkhaumoi.required' => 'Bạn chưa nhập mật khẩu',
           'matkhaumoi.min' => 'Mật khẩu phải phải chứa ít nhất 8 ký tự',
           'matkhaumoi.max' => 'Mật khẩu không vượt quá 32 ký tự',
           'nhaplaimatkhau.required' => 'Bạn phải nhập lại mật khẩu',
           'nhaplaimatkhau.same' => 'Mật khẩu nhập lại chưa đúng',
           'sdt.min'=>'sô điện thoại không hợp lệ',
       ]);
            $name = Auth::guard('admin')->user()->name;
            $users_email = admin::where('email','<>',Auth::guard('admin')->user()->email)->get();
            $user_ten = admin::where('name','<>',Auth::guard('admin')->user()->name)->get();

            foreach ($users_email as $user) {
              if ($user->name==$request->tentaikhoan) {
                return redirect()->route('suaTK_ND', ['ten'=>$name])->with('thongbao', 'Tên tài khoản đã được sử dụng');
                break;
              }
            }

            foreach ($user_ten as $user) {
              if( $user->email == $request->email)
              {
                return redirect()->route('suaTK_ND', ['ten'=>$name])->with('thongbao', 'email đã được sử dụng');
                break;
              }
            }

            $admin = admin::find(Auth::guard('admin')->user()->maTK);
            if(Hash::check($request->matkhaucu, $admin->password))
            {
              $admin->name = $request ->tentaikhoan;
              $admin->password = bcrypt($request ->matkhaumoi);
              $admin->email = $request->email;
              if (isset($request->sdt)) {
                $admin->sdt = $request->sdt;
              }
              $admin->save();
              return redirect()->route('suaTK_ND', ['ten'=>$admin->name])->with('thongbao', 'Sửa thông tin thành công!');
            }
            else
              return redirect()->route('suaTK_ND', ['ten'=>$name])->with('thongbao', 'Mật khẩu sai');
                      

    }
    

}
