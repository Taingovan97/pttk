<?php

namespace App\Http\Controllers;

use App\thanhvien_truyenyeuthich;
use App\truyen;
use App\chuongtruyen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DK_QLTruyen extends Controller
{
   function chiTietTruyen($id){
       $truyen = truyen::find($id);
       $charttruyens = truyen::all();

       return view('Khach.XemChiTietTruyen',['truyen'=>$truyen, 'chartTruyens'=>$charttruyens]);
   }


   public function layTruyenTheoMa($id=null)
   {
   	
   }

   public function layTruyenTheoTen($id=null)
   {
   	
   }

   public function layTruyenTheoTheLoai($id=null)
   {
   	
   }

   public function layTruyenTheoNhom($id=null)
   {
   	
   }
   public function layTatCaTruyen()
   {
   	
   }

   public function docTruyen($idTruyen,$idChuong)
   {
       $chuong = chuongtruyen::find($idChuong);
       $truyen = truyen::find($idTruyen);
// echo $idChuong;
       return  view('Khach.DocTruyen',['truyen'=>$truyen,'chuongxem'=>$chuong]);
   	
   }


   public function chiaSe($id=null)
   {
   	
   }
   public function xoaTruyenYeuThich($id=null){

        $user = Auth::guard('thanhvien')->user();
       $tv_truyen = thanhvien_truyenyeuthich::where([['maTruyen', $id],['maTK',$user->maTK]])->delete();
        return redirect()->route('dstruyenyeuthich');
   }

   public function themBinhLuan(Request $request, $maTruyen, $maChuong, $maTK)
   {

    $chuong = chuongtruyen::find($maChuong);
    $chuong->setBinhLuan($request->binhluan);
    return redirect()->route('doctruyen',['idTruyen'=>$maTruyen, 'idChuong'=>$maChuong]);
   }


   //xet duyet truyen
   public function xetduyet_truyen()
   {
      $data = truyen::where('duyet',false);
      return view('quanlyND.xetduyet_truyen', ['truyen'=>$data]);
   }

   public function da_duyet($id)
   {
      $data = truyen::find($id);
      $data->duyet = true;
      $data->save();
      return view('qlnd_thanhcong');
   }
   //

   //xoa truyen
   public function xoatruyen()
   {
      $data = truyen::all();
      return view('quanlyND.xoatruyen', ['truyen'=>$data]);
   }

   public function da_xoa($id)
   {
      $data = truyen::find($id);
      $data-
   }


   public function thongke_luotxem()
   {
      $data = truyen::orderBy('luotXem','desc')->get()->toArray();
      return view('quanlyND.thongke_luotxem', ['truyen'=>$data]);
   }

   public function thongke_danhgia()
   {
      $data = truyen::orderBy('diemDG','desc')->get()->toArray();
      return view('quanlyND.thongke_danhgia', ['truyen'=>$data]);
   }

   public function thongke_nhomdich()
   {

   }

   
   
}
