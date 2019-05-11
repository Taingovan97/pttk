<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 use App\truyen;
 Route::group(['middleware'=>'web'], function () {

 	Route::get('/', 'DK_Trang@home')->name('trangchu');
 	
 	// thanh menu
 	Route::get('truyenmoi', 'DK_Trang@truyenmoi')->name('truyenmoi');
 	Route::get('theloai/{id?}', 'DK_QLTruyen@layTruyenTheoTheLoai')->name('theloai');
 	Route::get('nhomdich/{id?}', 'DK_QLTruyen@layTruyenTheoNhom')->name('nhomdich');
 	Route::get('tacgia', 'DK_Trang@tacgia')->name('tacgia');
 	Route::get('nam', 'DK_Trang@nam')->name('nam');

	//trang chu
	Route::get('home', 'pagescontroller@index');

	//giao dien main cua quan ly tai khoan
	Route::get('quanlyTK', 'pagescontroller@index1');


	Route::get('demo', function(){
		return view('layouts.master_qlnd');
	})->name('demo');

	// xu ly dang ky
	Route::get('dangky', function (){
	    return view('Auth.DangKy');
    })->name('taoformdangky');

	// xu ly dang ky
	Route::get('dangky', function (){
	    return view('Auth.DangKy');
    })->name('taoformdangky');

	Route::post('dangky','DK_QLTaiKhoan@dangKyTaiKhoan')->name('dangkytaikhoan');

	Route::get('dangky/taotaikhoan/xacthuc/{token}', 'DK_QLTaiKhoan@XacThuc')-> name('user.activate');

	// xu ly dang nhap
	Route::get('dangnhap',function (){
	    return view('Auth.DangNhap');
	})->name('taoformdangnhap');

	Route::post('dangnhap', 'DK_QLTaiKhoan@dangNhapThanhVien')->name('dangnhap');

		// dang nhap admin
	Route::get('admin',function (){
	    return view('Auth.DangNhapAdmin');
    })->name('taoformdangnhapadmin');

	Route::post('admin', 'DK_QLTaiKhoan@dangNhapAdmin')->name('dangnhapadmin');


	// xu ly dang xuat
	Route::get('dangxuat', 'DK_QLTaiKhoan@dangxuatThanhVien')->name('dangxuat');

	// xu ly doc truyen
	Route::get('chi_tiet_truyen/{id}', function($id){
		$truyen = App\truyen::find($id);
	       $charttruyens = App\truyen::all();

	       return view('Khach.XemChiTietTruyen',['truyen'=>$truyen, 'chartTruyens'=>$charttruyens]);

	})->name('chitiettruyen');

	Route::get('truyen/{idTruyen}/{idChuong}','DK_QLTruyen@docTruyen')->name('doctruyen');
});

 Route::group(['middleware'=>['web','auth_thanhvien']], function(){

	// xu ly truyen yeu thich
	 Route::get('truyenyeuthich', function () {
	     return view('ThanhVien.TruyenYeuThich');
	 })->name('dstruyenyeuthich');

	 Route::get('chiase/id={id}','DK_QLTruyen@chiaSe')->name('chiase');

	 Route::get('truyenyeuthich/xoatruyen', function () {

	 })->name('xoatruyenyeuthich');

	 // tai khoan ca nhan thanh vien

	 Route::get('taikhoancanhan', function () {
	     return view('ThanhVien.ThongTinCaNhan');
	 })->name('thongtintaikhoan');

	 Route::get('suatk-{tenTK}/', function (){
	     return view('ThanhVien.suaTaiKhoanCaNhan');
	 })->name('formsuatk');

	 Route::post('suatk{tenTK}-id={id}', 'DK_QLTaiKhoan@SuaTaiKhoan')->name('suatk');


 });

Route::group(['prefix' => 'quanlynoidung'], function() {

    Route::get('/', 'DK_Trang@trangChuAdminNoiDung')->name('adminnoidung');

});

Route::group(['prefix'=>'quanlytaikhoan'], function(){

	Route::get('captk', function (){
	    return view('Auth.CapTaiKhoan');
    })->name('taoformcaptaikhoan');

	Route::post('captk','DK_QLTaiKhoan@capTaiKhoan')->name('captaikhoan');

	Route::get('/', 'DK_Trang@trangChuAdminTaiKhoan')->name('admintaikhoan');
	
});

Route::get('quanlyTK/tracuu', 'taikhoanController@tracuu')->name('tracuuTK');


Route::post('quanlyTK/hienthi', 'taikhoanController@hienthi')->name('hienthiTK');



Route::get('quanlyTK/suaTK/{id}', 'quanlyTK@suaTK')->name('suaTK');

Route::get('quanlyTK/xoaTK/{id}', 'quanlyTK@xoaTK')->name('xoaTK');




//giao dien main cua quan ly nhom
Route::get('quanlyTK/nhom',function(){
	return view('quanlyTK.nhom');
})->name('nhom');

Route::get('quanlyTK/nhom/xemNhom', 'quanlyTK@xemNhom')->name('xemNhom');

Route::get('quanlyTK/nhom/xoaNhom', 'quanlyTK@xoaNhom')->name('xoaNhom');

Route::get('quanlyTK/nhom/thongkeNhom', 'quanlyTK@thongkeNhom')->name('thongkeNhom');

