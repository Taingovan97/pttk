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
 use App\nhom;
 Route::group(['middleware'=>'web'], function () {

 	Route::get('/', 'DK_Trang@home')->name('trangchu');
 	
 	// thanh menu
 	Route::get('truyenmoi', 'DK_Trang@truyenmoi')->name('truyenmoi');
 	Route::get('theloai/{content?}', 'DK_QLTruyen@layTruyenTheoTheLoai')->name('theloai');
 	Route::get('nhomdich/{id?}', 'DK_QLTruyen@layTruyenTheoNhom')->name('nhomdich');
 	Route::get('tacgia', 'DK_Trang@layTruyenTheoTacGia')->name('tacgia');
 	Route::get('nam/{nam?}', 'DK_QLTruyen@layTruyenTheoNam')->name('nam');
 	Route::get('chart/{option}','DK_QLTruyen@doithongke');
	//trang chu
	Route::get('home', 'pagescontroller@index');

	

	

	// xu ly dang ky
	Route::get('dangky', function (){	return view('Auth.DangKy'); })->name('taoformdangky');

	Route::post('dangky','DK_QLTaiKhoan@dangKyTaiKhoan')->name('dangkytaikhoan');

	Route::get('xac_thuc/{token}', 'DK_QLTaiKhoan@XacThuc')-> name('user.activate');

	// xu ly dang nhap
	Route::get('dangnhap',function (){ return view('Auth.DangNhap'); })->name('taoformdangnhap');

	Route::post('dangnhap', 'DK_QLTaiKhoan@dangNhapThanhVien')->name('dangnhap');

		// dang nhap admin
	Route::get('admin',function (){ return view('Auth.DangNhapAdmin'); })->name('taoformdangnhapadmin');

	Route::post('admin', 'DK_QLTaiKhoan@dangNhapAdmin')->name('dangnhapadmin');


    Route::get('dangxuat_admin', 'DK_QLTaiKhoan@dangxuatAdmin')->name('dangxuat_admin');


    // xu ly dang xuat
    Route::get('dangxuat', 'DK_QLTaiKhoan@dangxuatThanhVien')->name('dangxuat');

    // doi mat khau

    Route::get('caplaimatkhau',function (){ return view('auth.CapLaiMatKhau');})->name('getcaplaimatkhau');

    Route::post('caplaimatkhau','DK_QLTaiKhoan@capLaiMatKhau')->name('caplaimatkhau');

    Route::get('xacnhancaplai/{token}', 'DK_QLTaiKhoan@xacNhanMatKhau')->name('xacnhanmatkhau');

    Route::get('demo/dangky', function(){
        return view('auth.DangKy');
    });


        // truyen
    Route::get('chi_tiet_truyen/{id}', 'DK_QLTruyen@chiTietTruyen')->name('chitiettruyen');

    Route::get('truyen/{idTruyen}/{idChuong}','DK_QLTruyen@docTruyen')->name('doctruyen');
    
    //tim kiếm
     Route::get('timtruyen/{option}/{content?}', 'DK_QLTruyen@timKiemTruyen');
});

Route::group(['middleware'=>['web','auth_thanhvien']], function(){

	// xu ly truyen yeu thich
	 Route::get('truyenyeuthich', function () { return view('ThanhVien.TruyenYeuThich'); })->name('dstruyenyeuthich');
	 Route::get('truyenyeuthich/them={id}','DK_QLTruyen@themTruyenYeuThich')->name('themTruyenYeuThich');
	 
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



 });
Route::middleware(['auth_thanhvienNhom'])->group(function (){
    Route::group(['prefix' => 'nhom'], function(){

        Route::get('/', function (){ return view('tvNhom.TrangChu_nhom');})->name('trangchunhom');

        //truyen
        Route::group(['prefix' => 'quan_ly_truyen'], function(){
            Route::get('/', 'DK_Trang@quanlytruyen')->name('quanlytruyen');
            Route::get('timtruyennhom/{findvalue?}','DK_QLTruyen@timTruyenCuaNhom');
            Route::get('truyen={id}','DK_QLTruyen@chiTietTruyenNhom')->name('chitiettruyennhom'); // xem chi tiet truyen cua nhom
            Route::get('them_truyen_moi',"DK_QLTruyen@getThemTruyenMoi")->name('formthemtruyenmoi');
            Route::post('them_truyen_moi','DK_QLTruyen@themTruyenMoi')->name('postthemtruyenmoi');

            Route::get('chinh_sua_truyen/id={id}','DK_QLTruyen@getchinhSuaTruyen')->name('formchinhsuatruyen');
            Route::post('chinh_sua_truyen/id={id}','DK_QLTruyen@chinhSuaTruyen')->name('chinhsuatruyen');

            Route::get('them_chuong_moi/{maTruyen}','DK_QLTruyen@getthemChuongMoi')->name('formthemchuongmoi');
            Route::post('them_chuong_moi/{maTruyen}', 'DK_QLTruyen@themChuongMoi')->name('themchuongmoi');

            Route::get('sua_chuong/id={id}', 'DK_QLTruyen@getsuaChuongTruyen')->name('formsuachuongtruyen');
            ROute::post('sua_chuong/id={id}','DK_QLTruyen@suaChuongTruyen')->name('suachuongtruyen');
            
            Route::get('thong_ke_truyen','DK_QLTruyen@thongKeTruyen')->name('thongketruyennhom');
//            Route::get('tracuutruyen', 'DK_QLTruyen@traCuuTruyenCuaNhom')->name('tracuutruyencuanhom');

            Route::get('xoa_truyen={id}', 'DK_QLTRuyen@checkXoaNhom')->name('xoa_checktruyen');
            Route::post('xoa/truyen_{maTruyen}', 'DK_QLTruyen@xoaTruyenNhom')->name('xoatruyennhom');

//            Route::get('truyen={id}', function () { return view('tvNhom.XemChiTietTruyenNhom'); });


        });
        Route::group(['prefix'=>'de_xuat'], function(){
            Route::get('/{name?}', 'DK_QLDeXuat@dsDeXuat')->name('qldexuat');
            Route::get('chitiet/{id}', 'DK_QLDeXuat@xemChiTiet')->name('xemdexuat');
            Route::get('xuli/{id}', 'DK_QLDeXuat@xuLy')->name('xulydexuat');
            Route::get('xoa/{id}', 'DK_QLDeXuat@xoa')->name('xoadexuat');
            Route::get('tracuu/{findvalue}', 'DK_QLDeXuat@dsDeXuat')->name('tracuu');
        });
        Route::group(['prefix' =>'quanlynhom'], function(){

            Route::get('thongtinnhom','DK_QLNhom@thongTinNhom')->name('thongtinnhom');
            Route::get('suathongtin/{maTK}', 'DK_QLNhom@getSuaThongTinNhom')->name('suathongtinnhom');
            Route::post('suathongtinnhom', 'DK_QLNhom@postSuaThongTinNhom')->name('postsuathongtinnhom');
            Route::get('thanh_vien_nhom',function (){ return view('tvNhom.dsThanhVien');})->name('thanhviennhom');
            Route::get('them_thanh_vien', 'DK_QLNhom@getThemThanhVien')->name('getthemthanhvien');
            Route::get('them_thanh_vien/{name}', 'DK_QLNhom@themThanhVien')->name('themthanhvien');
            Route::get('xoatv/{maTK}', 'DK_QLNhom@xoaThanhVienNhom')->name('xoathanhvien');
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





//tra cuu tai khoan

	Route::get('/', 'DK_Trang@trangChuAdminTaiKhoan')->name('admintaikhoan');
	
});


//giao dien main cua quan ly tai khoan
Route::get('quanlyTK', 'pagescontroller@index_qltk')->name('index_qltk');

//tra cuu tai khoan
Route::get('quanlyTK/tracuu', 'taikhoanController@tracuu')->name('tracuuTK');

//hien thi thong tin tai khoan
Route::post('quanlyTK/hienthi','taikhoanController@hienthi')->name('hienthi');


//tim TK de xoa
Route::get('quanlyTK/tim_xoaTK', 'taikhoanController@find')->name('tim_xoaTK');

//giao dien xoa tk
Route::post('quanlyTK/xoaTK', 'taikhoanController@xoaTK')->name('xoaTK');

Route::get('quanlyTK/da_xoa/{id}', 'taikhoanController@da_xoa')->name('da_xoa');



//thong tin ca nhan
Route::get('quanlyTK/ttcanhan', 'taikhoanController@ttcanhan')->name('admin_tk');

//sua tk ca nhan
Route::get('quanlyTK/suaTK/{ten}', function(){
	return view('quanlyTK.suaTK');
})->name('suaTK');

Route::post('quanlyTK/suaTK_admin', 'DK_QLTaiKhoan@suaTK_admin')->name('suaTK_admin');

//giao dien main cua quan ly nhom
Route::get('quanlyTK/nhom', 'nhomController@index')->name('nhom');

Route::post('quanlyTK/nhom/post_xemNhom', 'nhomController@post_xemNhom')->name('post_xemNhom');

//chi tiet nhom
Route::get('quanlyTK/nhom/xemNhom/{id_nhom}', 'nhomController@xemNhom')->name('xemNhom');


Route::get('quanlyTK/nhom/xoaNhom/{id_nhom}', 'nhomController@xoaNhom')->name('xoaNhom');

Route::get('quanlyTK/nhom/thongkeNhom', 'nhomController@thongkeNhom')->name('thongkeNhom');


//admin quan ly noi dung
Route::get('quanlyND', 'pagescontroller@index_qlnd')->name('index_qlnd');


Route::get('quanlyND/ttcanhan', 'taikhoanController@ttcanhan')->name('admin_nd');

Route::get('quanlyND/suaTK/{id}', 'taikhoanController@suuTK');

//xet duyet truyen
Route::get('quanlyND/xetduyet_truyen', 'DK_QLTruyen@xetduyet_truyen')->name('xetduyet_truyen');

Route::get('quanlyND/da_duyet/{id}', 'DK_QLTruyen@da_duyet')->name('da_duyet');
//

Route::get('demo', function(){
	$data = nhom::find(1);
	$data->tenNhom ="Kanefusa Fansub";
	$data->save();
	echo "da edit";
})->name('demo');

Route::get('test', function(){
	return view('qlnd_fail');
});


//xoa truyen
Route::get('quanlyND/xoatruyen', 'DK_QLTruyen@xoatruyen')->name('xoatruyen');

Route::get('quanlyND/da_xoa/{id}', 'DK_QLTruyen@da_xoa')->name('da_xoatruyen');

//thong ke truyen
Route::get('quanlyND/thongke_truyen', function(){
	return view('quanlyND.thongke_truyen');})->name('thongke_truyen');

Route::get('quanlyND/thongke_truyen/thongke_theloai', 'DK_QLTruyen@thongke_theloai')->name('thongke_theloai');

Route::get('quanlyND/thongke_truyen/thongke_luotxem', 'DK_QLTruyen@thongke_luotxem')->name('thongke_luotxem');

Route::get('quanlyND/thongke_truyen/thongke_danhgia', 'DK_QLTruyen@thongke_danhgia')->name('thongke_danhgia');

Route::get('quanlyND/thongke_truyen/thongke_nhomdich', 'DK_QLTruyen@thongke_nhomdich')->name('thongke_nhomdich');

//quan ly bao cao
//tra cuu bao cao
Route::get('quanlyND/tracuuBC', 'DK_QLBaoCao@tracuuBC')->name('tracuuBC');

Route::post('quanlyND/baocao', 'DK_QLBaoCao@baocao')->name('baocao');

//chi tiet bao cao
Route::get('quanlyND/xemBC/{id}', 'DK_QLBaoCao@xemBC')->name('xemBC');

//xoa bc
Route::get('quanlyND/xoaBC/{id}', 'DK_QLBaoCao@xoaBC')->name('xoaBC');


Route::get('themcot', function(){
	Schema::table('nhom', function($table){
		$table->integer('soLuongTV')->unsigned();
		$table->integer('soLuongTruyen')->unsigned();
	});
});



