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
Route::get('quanlyTK', 'pagescontroller@index_qltk')->name('index_qltk');


Route::get('demo', function(){
	return view('quanlyTK.suaTK');
})->name('demo');

// xu ly dang ky
Route::get('dangky', 'DK_QLTaiKhoan@getDangKy')->name('taoformdangky');

 	// xu ly dang ky
 	Route::get('dangky', 'DK_QLTaiKhoan@getDangKy')->name('taoformdangky');

 	Route::post('dangky','DK_QLTaiKhoan@dangKyTaiKhoan')->name('dangkytaikhoan');

 	Route::get('dangky/taotaikhoan/xacthuc/{token}', 'DK_QLTaiKhoan@XacThuc')-> name('user.activate');

 	// xu ly dang nhap
 	Route::get('dangnhap','DK_QLTaiKhoan@getDangNhap')->name('taoformdangnhap');

 	Route::post('dangnhap', 'DK_QLTaiKhoan@dangNhapThanhVien')->name('dangnhap');


 	// xu ly dang xuat
 	Route::get('dangxuat', 'DK_QLTaiKhoan@dangxuatThanhVien')->name('dangxuat');

 	// xu ly doc truyen
 	Route::get('chi_tiet_truyen/{id}', 'DK_QLTruyen@chiTietTruyen')->name('chitiettruyen');

 	Route::get('truyen/{idTruyen}/{idChuong}','DK_QLTruyen@docTruyen')->name('doctruyen');

 	// xu ly truyen yeu thich
     Route::get('truyenyeuthich', function () {
         return view('ThanhVien.HomeThanhVien');
     })->name('dstruyenyeuthich');

     Route::get('chiase/id={id}','DK_QLTruyen@chiaSe')->name('chiase');

     Route::get('truyenyeuthich/xoatruyen', function () {

     })->name('xoatruyenyeuthich');

 //    Route::group(['middleware' => ['']], function () {
 //
 //
 //    });

 });


//tra cuu tai khoan
Route::get('quanlyTK/tracuu', 'taikhoanController@tracuu')->name('tracuuTK');

//hien thi thong tin tai khoan
Route::post('quanlyTK/hienthi','taikhoanController@hienthi')->name('hienthi');



Route::get('quanlyTK/suaTK/{id}', 'quanlyTK@suaTK')->name('suaTK');

//tim TK de xoa
Route::get('quanlyTK/timTK', 'taikhoanController@find')->name('timTK');

//giao dien xoa tk
Route::post('quanlyTK/xoaTK', 'taikhoanController@xoaTK')->name('xoaTK');



//thong tin ca nhan
Route::get('quanlyTK/ttcanhan', 'taikhoanController@ttcanhan')->name('ttcanhan');





//giao dien main cua quan ly nhom
Route::get('quanlyTK/nhom', 'nhomController@index')->name('nhom');

Route::get('quanlyTK/nhom/xemNhom/{id_nhom}', 'nhomController@xemNhom')->name('xemNhom');

Route::get('quanlyTK/nhom/xoaNhom', 'nhomController@xoaNhom')->name('xoaNhom');

Route::get('quanlyTK/nhom/thongkeNhom', 'nhomController@thongkeNhom')->name('thongkeNhom');


//admin quan ly noi dung
Route::get('quanlyND', 'pagescontroller@index_qlnd')->name('index_qlnd');


Route::get('quanlyND/ttcanhan', 'taikhoanController@ttcanhan');

Route::get('quanlyND/suaTK/{id}', 'taikhoanController@suuTK');

//xet duyet truyen
Route::get('quanlyND/xetduyet_truyen', 'DK_QLTruyen@xetduyet_truyen')->name('xetduyet_truyen');

//xoa truyen
Route::get('quanlyND/xoatruyen', 'DK_QLTruyen@xoatruyen')->name('xoatruyen');

//thong ke truyen
Route::get('quanlyND/thongke_truyen', function(){
	return view('quanlyND.thongke_truyen');})->name('thongke_truyen');


Route::get('quanlyND/thongke_truyen/thongke_luotxem', 'DK_QLTruyen@thongke_luotxem');

Route::get('quanlyND/thongke_truyen/thongke_danhgia', 'DK_QLTruyen@thongke_danhgia');

Route::get('quanlyND/thongke_truyen/thongke_nhomdich', 'DK_QLTruyen@thongke_nhomdich');

//quan ly bao cao
Route::get('quanlyND/tracuuBC', 'baocaoController@tracuuBC');


Route::get('themcot', function(){
	Schema::table('nhom', function($table){
		$table->integer('soLuongTV')->unsigned();
		$table->integer('soLuongTruyen')->unsigned();
	});
});



