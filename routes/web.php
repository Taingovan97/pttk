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


	Route::get('demo', function(){	return view('layouts.master_qlnd');	})->name('demo');

	// xu ly dang ky
	Route::get('dangky', function (){	return view('Auth.DangKy');   })->name('taoformdangky');

	Route::post('dangky','DK_QLTaiKhoan@dangKyTaiKhoan')->name('dangkytaikhoan');

	Route::get('dangky/tao_tai_khoan/xac_thuc/{token}', 'DK_QLTaiKhoan@XacThuc')-> name('user.activate');

	// xu ly dang nhap
	Route::get('dangnhap',function (){ return view('Auth.DangNhap'); })->name('taoformdangnhap');

	Route::post('dangnhap', 'DK_QLTaiKhoan@dangNhapThanhVien')->name('dangnhap');

		// dang nhap admin
	Route::get('admin',function (){ return view('Auth.DangNhapAdmin'); })->name('taoformdangnhapadmin');

	Route::post('admin', 'DK_QLTaiKhoan@dangNhapAdmin')->name('dangnhapadmin');


	// xu ly dang xuat
	Route::get('dangxuat', 'DK_QLTaiKhoan@dangxuatThanhVien')->name('dangxuat');

	// truyen
	Route::get('chi_tiet_truyen/{id}', function($id){
		$truyen = App\truyen::find($id);
	       $charttruyens = App\truyen::all();

	       return view('Khach.XemChiTietTruyen',['truyen'=>$truyen, 'chartTruyens'=>$charttruyens]);

	})->name('chitiettruyen');

	Route::get('truyen/{idTruyen}/{idChuong}','DK_QLTruyen@docTruyen')->name('doctruyen');
});

 Route::group(['middleware'=>['web','auth_thanhvien']], function(){

	// xu ly truyen yeu thich
	 Route::get('truyenyeuthich', function () { return view('ThanhVien.TruyenYeuThich'); })->name('dstruyenyeuthich');
	 Route::post('truyenyeuthich/them','DK_QLTruyen@themTruyenYeuThich')->name('themTruyenYeuThich');
	 
	 Route::get('chiase/id-{id}','DK_QLTruyen@chiaSe')->name('chiase');

	 Route::get('truyenyeuthich/xoatruyen-{id}', 'DK_QLTruyen@xoaTruyenYeuThich')->name('xoatruyenyeuthich');

	 // tai khoan ca nhan thanh vien

	 Route::get('taikhoancanhan', function () { return view('ThanhVien.ThongTinCaNhan'); })->name('thongtintaikhoan');

	 Route::get('{ten}/suatk', function (){ return view('ThanhVien.suaTaiKhoanCaNhan'); })->name('formsuatk');

	 Route::post('suatk', 'DK_QLTaiKhoan@postSuaTaiKhoan')->name('postsuatk');

     Route::get('dexuat', function (){ return view('ThanhVien.DeXuat');})->name('dexuat');

     Route::post('dexuat', 'DK_QLDeXuat@postGuiDeXuat')->name('guidexuat');
     Route::get('tennhom', 'DK_QLDeXuat@getNhom');
//     function () { return view('ThanhVien.DeXuat'); }
     // Báo cáo

     Route::get('baocaotruyen/{idTruyen}/{idChuong}', 'DK_QLBaoCao@getbaoCaoTruyen')->name('baocaotruyen');

     Route::post('baocaotruyen/{maTruyen}-{maChuong}', 'DK_QLBaoCao@postBaoCaoTruyen')->name('postbaocaotruyen');

     Route::get('baocaovipham/{maTruyen}/{maChuong}/{maTV2}', 'DK_QLBaoCao@getBaoCaoViPham')->name('getbaocaovipham');

     Route::post('baocaovipham/{maTruyen}-{maChuong}-{maTV2}', 'DK_QLBaoCao@postBaoCaoViPham')->name('postbaocaovipham');

	 // binh luan
     Route::post('binhluan/{maTruyen}/{maChuong}/{maTK}','DK_QLTruyen@thembinhluan')->name('binhluan');

     // Tạo nhóm

     Route::get('taonhom', function () { return view('ThanhVien.taoNhom');}) ->name('formtaonhom');
     Route::post('taonhom', 'DK_QLNhom@postTaoNhom')->name('posttaonhom');
     Route::group(['prefix' => 'nhom',['middleware'=>'auth_thanhvienNhom']], function(){

	 	Route::get('/', 'DK_QLNhom@Trangchu')->name('trangchunhom');
	 	//truyen
	 	Route::group(['prefix' => 'quan_ly_truyen'], function(){
	 		Route::get('/', function() { return view('ThanhVienNhom.QuanLyTruyen'); })->name('quanlytruyen');

	 		Route::get('them_truyen_moi','DK_QLTruyen@themTruyenMoi')->name('themtruyenmoi');
	 		Route::post('them_truyen_moi','DK_QLTruyen@themTruyenMoi')->name('themtruyenmoi');

		 	Route::get('them_chuong_moi', 'DK_QLTruyen@themChuongMoi')->name('themchuongmoi');
		 	Route::post('them_chuong_moi', 'DK_QLTruyen@themChuongMoi')->name('themchuongmoi');

		 	Route::get('thong_ke_truyen','DL_QLTruyen@thongKeTruyen')->name('thongketruyennhom');
		 	Route::get('tracuutruyen', 'DK_QLTruyen@traCuuTruyenCuaNhom')->name('tracuutruyencuanhom');

		 	Route::get('xoa/truyen_{id}', 'DK_QLTRuyen@checkXoaNhom')->name('xoa_checktruyen');
		 	Route::post('xoa/truyen_{id}', 'DL_QLTruyen@xoaTruyenNhom')->name('xoatruyennhom');


		 	Route::get('chinh_sua_truyen/id={id}','DL_QLTruyen@getchinhSuaTruyen')->name('formchinhsuatruyen');
		 	Route::post('chinh_sua_truyen/id={id}','DL_QLTruyen@chinhSuaTruyen')->name('chinhsuatruyen');

		 	});
		 Route::group(['prefix'=>'de_xuat'], function(){ 
		 	Route::get('/', function(){ return view('ThanhVienNhom.DeXuat'); })->name('qldexuat');
		 	Route::get('chitiet/{id}', 'DK_QLDeXuat@xemChiTiet')->name('xemdexuat');
		 	Route::get('xuli/{id}', 'DL_QLDeXuat@getxuLy')->name('formxulydexuat');
		 	Route::post('xuly/{id}', 'DK_QLDeXuat@postxuLy')->name('xulydexuat');
		 	Route::get('tracuu', 'DK_QLDeXuat@tracuu')->name('tracuu');
		 });
	 	Route::group(['prefix' =>'quanlynhom'], function(){
	 		Route::get('thongtinnhom','DKQL_Nhom@thongTinNhom')->name('thongtinnhom');
	 		Route::get('thanh_vien_nhom','DK_QLNhom@thanhVienNhom')->name('thanhviennhom');
	 		Route::get('them_thanh_vien', 'DK_QLNhom@getThemThanhVien')->name('getthemthanhvien');
	 		Route::post('them_thanh_vien', 'DK_QLNhom@themThanhVien')->name('themthanhvien');
	 	});
	 	//thanh viern nhom
	 });

 });

Route::group(['prefix' => 'quanlynoidung'], function() {

    Route::get('/', 'DK_Trang@trangChuAdminNoiDung')->name('adminnoidung');

});

Route::group(['prefix'=>'quanlytaikhoan'], function(){

	Route::get('captk', function (){ return view('Auth.CapTaiKhoan');  })->name('taoformcaptaikhoan');

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

