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
       $thongke = $this->thongke('ngay');
       $chartTruyens = [];
       foreach ($thongke as $maTruyen=>$luotxem)
       {
           $truyen = truyen::find($maTruyen);
           array_push($chartTruyens, $truyen);
       }

       return view('Khach.XemChiTietTruyen',['truyen'=>$truyen, 'chartTruyens'=>$chartTruyens]);
   }

   function chiTietTruyenNhom($id){
       $truyen = truyen::find($id);
       if($truyen->maNhom == Auth::guard('thanhvien')->user()->maNhom)
        return view('tvNhom.XemChiTietTruyenNhom',['truyen'=>$truyen]);
       else
           return redirect()->route('chitiettruyen',['id'=>$id]);

   }
    public static function thongke($option='ngay')
    {
        $timenow = Carbon::now('Asia/Ho_Chi_Minh');
        $year = $timenow->year;
        $month = $timenow->month;
        $week = $timenow->week;
        $day = $timenow->day;
        $results = [];
        switch ($option)
        {
            case 'ngay':
                $log_reads = log_read::all();
                foreach ($log_reads as $log)
               {

                   if($year ==$log->getYear() and $month == $log->getMonth() and $day ==$log->getDay()){
                       if(array_key_exists($log->maTruyen, $results))
                       {
                           $results[$log->maTruyen] = $results[$log->maTruyen] + 1;
                       }else
                       {
                           $results[$log->maTruyen] = 1;
                       }


                   }
               }

            case 'thang':
                $log_reads = log_read::all();
                foreach ($log_reads as $log)
                {

                    if($year ==$log->getYear() and $month == $log->getMonth()){
                        if(array_key_exists($log->maTruyen, $results))
                        {
                            $results[$log->maTruyen] = $results[$log->maTruyen] + 1;
                        }else
                        {
                            $results[$log->maTruyen] = 1;
                        }


                    }
                }
            case 'tuan':
                $log_reads = log_read::all();
                foreach ($log_reads as $log)
                {

                    if($year ==$log->getYear() and $week == $log->getWeek()){
                        if(array_key_exists($log->maTruyen, $results))
                        {
                            $results[$log->maTruyen] = $results[$log->maTruyen] + 1;
                        }else
                        {
                            $results[$log->maTruyen] = 1;
                        }


                    }
                }
            default:
                $log_reads = log_read::all();
                foreach ($log_reads as $log)
                {

                    if($year ==$log->getYear() and $month == $log->getMonth() and $day ==$log->getDay()){
                        if(array_key_exists($log->maTruyen, $results))
                        {
                            $results[$log->maTruyen] = $results[$log->maTruyen] + 1;
                        }else
                        {
                            $results[$log->maTruyen] = 1;
                        }


                    }
                }

        }
        arsort($results);
        return $results;
    }

    function doithongke($option)
    {
        $chartTruyens = $this->thongke($option);
        foreach($chartTruyens as $maTruyen=>$luotXem)
        {
            $Truyen = truyen::find($maTruyen);
            echo   '<div class="charts-element"> <h4><a href="'.route('chitiettruyen',['id'=>$Truyen->maTruyen]).'">'.$Truyen->tenTruyen.'</a></h4><p><span>Số Chương: '. $Truyen->soChuong().'</span> | <span> Lượt xem: '.$Truyen->luotXem.'</span></p> </div>';

        }
    }

    public function timKiemTruyen($option, $content=null)
   {
       if($content)
       {
           switch ($option)
           {
               case 'tentruyen':
                   return $this->layTruyenTheoTen($content);

               case 'tennhom':
                    return $this->layTruyenTheoNhom($content);

               case 'theloai':
                  return $this->layTruyenTheoTheLoai($content);
               default:
                   return $this->layTatCaTruyen();
           }
       }else{
           return $this->layTatCaTruyen();
       }
   }

    public function layTruyenTheoMa($content=null)
   {
       $results =[];
       $truyens = truyen::all();
       foreach ($truyens as $tr)
       {
           if(preg_match($content, $tr->maTruyen))
               array_push($results,$tr);
       }
       return view('Khach.TimKiemTruyen',['dstruyen'=>$results,'option'=>'Mã ','conten'=>$content]);
   }

    public function layTruyenTheoTen($content=null)
   {
       $pattern = '/[a-zA-Z]*';
       $tokens = explode(' ',$content);
       foreach ($tokens as $tk)
       {
           $pattern = $pattern.$tk.'[a-zA-Z]*\s*';
       }
       $pattern = $pattern.'/';
       $results =[];
       $truyens = truyen::all()->where('duyet',1);
       foreach ($truyens as $tr)
       {
           if(preg_match($pattern, $tr->tenTruyen))
               array_push($results,$tr);
       }
       return view('Khach.TimKiemTruyen',['dstruyen'=>$results,'option'=>'Truyện','content'=>$content]);
   }

    public function layTruyenTheoTheLoai($content=null)
   {
       $pattern = '/[a-zA-Z]*';
       $tokens = explode(' ',$content);
       foreach ($tokens as $tk)
       {
           $pattern = $pattern.$tk.'[a-zA-Z]*\s*';
       }
       $pattern = $pattern.'/';
       $results =[];
       $truyens = truyen::all()->where('duyet',1);
       foreach ($truyens as $tr)
       {
           $tr_tl = $tr->getTheLoai;
           foreach ($tr_tl as $tl)

               if(preg_match($pattern, $tl->getTheLoai->tenTL))
                   array_push($results,$tr);
       }
       return view('Khach.TimKiemTruyen',['dstruyen'=>$results,'option'=>'Thể loại','content'=>$content]);
   }

    public function layTruyenTheoNhom($content=null)
   {
       $pattern = '/[a-zA-Z]*';
       $tokens = explode(' ',$content);
       foreach ($tokens as $tk)
       {
           $pattern = $pattern.$tk.'[a-zA-Z]*\s*';
       }
       $pattern = $pattern.'/';
       $results =[];
       $truyens = truyen::all()->where('duyet',1);
       foreach ($truyens as $tr)
       {
           if(preg_match($pattern, $tr->nhom->tenNhom))
               array_push($results,$tr);
       }
       return view('Khach.TimKiemTruyen',['dstruyen'=>$results,'option'=>'Nhóm','content'=>$content]);
   }

    public function layTatCaTruyen()
   {

       return redirect()->route('trangchu');
   }

    public function timTruyenCuaNhom($findvalue=null)
   {
     if ($findvalue) {
        $pattern = '/[a-zA-Z]*';
        $tokens = explode(' ',$findvalue);
        foreach ($tokens as $tk)
        {
            $pattern = $pattern.$tk.'[a-zA-Z]*\s*';
        }
        $pattern = $pattern.'/';
        $results =[];
        $truyens = truyen::all()->where('maNhom',Auth::guard('thanhvien')->user()->maNhom);
        foreach ($truyens as $tr)
        {
            if(preg_match($pattern, $tr->tenTruyen))
                array_push($results,$tr);
        }
        return view('tvNhom.TimKiemTruyenNhom',['dstruyen'=>$results,'option'=>'Truyện của nhóm','content'=>$findvalue]);

     }else {
       $dstruyen = truyen::where('maNhom', Auth::guard('thanhvien')->user()->maNhom)->paginate(4);
       $sltruyen = $dstruyen->count();
       return view('tvNhom.QuanLyTruyen',['dstruyen'=>$dstruyen,'sltruyen'=>$sltruyen]);
     }
   }


    public function layTruyenTheoNam($content){
        $truyens = truyen::all();
        $results = [];
        foreach ($truyens as $truyen)
        {
            if($truyen->getNam()==$content)
            {
                array_push($results, $truyen);
            }
        }
        return view('Khach.TimKiemTruyen',['dstruyen'=>$results,'option'=>'Năm','content'=>$content]);
    }

    public function docTruyen($idTruyen,$idChuong)
   {
       $chuong = chuongtruyen::find($idChuong);
       $truyen = truyen::find($idTruyen);
       $truyen->capNhatLuotXem();
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

    public function getsuaChuongTruyen($id){

       $chuong = chuongtruyen::find($id);
       $truyen = truyen::find($chuong->maTruyen);

       if($truyen->maNhom == Auth::guard('thanvien')->user()->maNhom)
           return view('tvNhom.SuaChapTruyen',['chuong'=>$chuong]);
       else
           return redirect()->route('chitiettruyennhom',['truyen'=>$truyen]);

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

    public function getchinhSuaTruyen($id){

    }

    public function thongKeTruyen(){
       $nhom = Auth::guard('thanhvien')->user()->getNhom;
       $dsTruyen = truyen::where('maNhom', $nhom->maNhom)->orderBy('ngayDang')->get();
       return view('tvNhom.ThongKeTruyenNhom',['dsTruyen'=>$dsTruyen]);
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
