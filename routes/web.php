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

Route::get('/', function(){
	return view('Khach.indexcut');
});

// xu ly dang ky
Route::get('dangky', 'DK_QLTaiKhoan@getDangKy')->name('taoformdangky');

Route::post('dangky/taotaikhoan','DK_QLTaiKhoan@postTaoTaiKhoan')->name('dangkytaikhoan');

Route::get('dangky/taotaikhoan/xacthuc/{token}', 'DK_DangKyTK@XacThuc')-> name('user.activate');

// xu ly dang nhap
Route::get('dangnhap','DK_QLTaiKhoan@getDangNhap')->name('taoformdangnhap');

Route::post('dangnhap/kiemtra', 'DK_QLTaiKhoan@dangNhap')->name('dangnhap');
?>