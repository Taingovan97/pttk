<?php

namespace App\Http\Controllers;

use App\thanhvien_truyenyeuthich;
use App\trangtruyen;
use App\truyen;
use App\chuongtruyen;
use App\theloai;
use App\log_read;
use App\truyen_theloai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
       $log = new log_read;
       $log->maTruyen = $truyen->maTruyen;
       $log->read_at = Carbon::now('Asia/Ho_Chi_Minh');
       $log->save();

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
    public function getthemChuongMoi($maTruyen){
        $truyen = truyen::find($maTruyen);
        return view('tvNhom.ThemChuongMoi',['truyen'=>$truyen]);
    }

    public function themChuongMoi(Request $request, $maTruyen){
        $this->validate($request,[
            'tenchuong'=>'required',
            'linktrang' => 'required',


        ],[
            'tenchuong.required' =>'Bạn chưa nhập tên truyện',
            'linktrang.required' => 'Bạn chưa chọn thể loại',

        ]);
        $chuongs = chuongtruyen::where('maTruyen', $maTruyen);

        foreach ($chuongs as $chuong)
        {
            if($chuong->tenChuong == $request->tenchuong)
            {
                return redirect()->route('formthemchuongmoi',['maTruyen'=>$maTruyen])->with('thongbao', "<script> alert('Chương này đã được đăng')</script>");
            }
        }

        $chuong = new chuongtruyen;
        $chuong->tenChuong= $request->tenchuong;
        $chuong->maTruyen = $maTruyen;
        $chuong->ngayDang = Carbon::now('Asia/Ho_Chi_Minh');
        if ($request->hasFile('trang')) {
            $files = $request->trang;
            $truyen->linkAnh = 'avatar/'.$file->getClientOriginalName();
            $file->move('images', 'test.png');
        }
        $chuong->save();
        $trangs = explode(';',$request->linktrang);
        foreach ($trangs as $trang)
        {
//            $chuong = chuongtruyen::where('tenChuong', $request->tenchuong)->where('maTruyen', $maTruyen)->get()->toArray()[0];
            $trangtruyen = new trangtruyen;
            $trangtruyen->link = $trang;
            $trangtruyen->maChuong = $chuong->maChuong;
            $trangtruyen->save();
            echo $trang;
            echo '<br>';

        }

        return redirect()->route('formthemchuongmoi',['maTruyen'=>$maTruyen])->with('thongbao', "<script> alert('thêm chuong mới thành công')</script>");

    }

    public function getThemTruyenMoi(){
        $theloais = theloai::all();
        return view('tvNhom.ThemTruyen',['theloais'=>$theloais]);
    }

    public function themTruyenMoi(Request $request){

        $this->validate($request,[
            'tentruyen'=>'required',
            'theloai' => 'required',
            'tacgia' => 'required',

        ],[
            'tentruyen.required' =>'Bạn chưa nhập tên truyện',
            'theloai.required' => 'Bạn chưa chọn thể loại',
            'tacgia.required' =>'ban chua nhap tac gia'

        ]);
        $truyens = Auth::guard('thanhvien')->user()->getNhom->getTruyen;
        foreach ($truyens as $truyenn)
        {
            if($truyenn->tenTruyen == $request->tentruyen)
            {
                return redirect()->route('formthemtruyenmoi')->with('thongbao','Nhóm đã đăng truyện này!');
            }
        }

         $truyen = new truyen;
         $truyen->tenTruyen= $request->tentruyen;
        $truyen->tacGia = $request->tacgia;
         $truyen->ngayDang = Carbon::now('Asia/Ho_Chi_Minh');
         if($request->gioithieu)
            $truyen->gioiThieu = $request->gioithieu;
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $truyen->linkAnh = 'cover/'.$file->getClientOriginalName();
            $file->move('cover', 'test.png');
        }
        $truyen->maNhom = Auth::guard('thanhvien')->user()->maNhom;
        $truyen->manguoiDang = Auth::guard('thanhvien')->user()->maTK;
        $truyen->save();

        foreach ($request->theloai as $tl)
        {
            $theloai = theloai::where('tenTL', $tl)->get()->toArray()[0];
            $t_tl = new truyen_theloai;
            $t_tl->maTL = $theloai['maTL'];

            $t = truyen::where('tenTruyen','=', $request->tentruyen)->get()->toArray();
            $t_tl->maTruyen = $t[0]['maTruyen'];
            $t_tl->save();

        }
        return redirect()->route('quanlytruyen');


    }
   //xoa truyen
   public function xoatruyen()
   {
      $data = truyen::all();
      return view('quanlyND.xoatruyen', ['truyen'=>$data]);
   }

   public function da_xoa($id)
   {
//      $data = truyen::find($id);
//      $data-
      $data = truyen::find($id);
    
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

   public  function xoaTruyenNhom($maTruyen)
   {
       $tv_truyens = Auth::guard('thanhvien')->user()->getTruyen;
       $check = false;
       foreach ($tv_truyens as $tv_truyen)
       {
            if($tv_truyen->getTruyen->maTruyen == $maTruyen){
                $check= true;
                break;
            }
       }

       if($check==True){
           $tv_truyen->getTruyen->delete();
           return redirect()->route('quanlytruyen');
       }
       else{
           return redirect()->route('quanlytruyen',['thongbao'=>'Truyện không phải của nhóm!']);
       }

   }

   
   
}
