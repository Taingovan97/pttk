<?php

namespace App\Http\Controllers;

use App\truyen;
use App\chuongtruyen;
use Illuminate\Http\Request;

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

       return  view('Khach.DocTruyen',['truyen'=>$truyen,'chuongxem'=>$chuong]);
   	
   }


   public function chiaSe($id=null)
   {
   	
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
