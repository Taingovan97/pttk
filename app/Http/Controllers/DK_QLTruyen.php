<?php

namespace App\Http\Controllers;

use App\thanhvien_truyenyeuthich;
use App\trangtruyen;
use App\truyen;
use App\chuongtruyen;
use App\theloai;
use App\nhom;
use App\log_read;
use App\truyen_theloai;
use App\rate_tv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class DK_QLTruyen extends Controller
{
   function chiTietTruyen($id){
       $truyen0 = truyen::find($id);
       if ($truyen0->duyet == True) {
         $thongke = $this->thongke('ngay');
       $chartTruyens = [];
       foreach ($thongke as $maTruyen=>$luotxem)
       {
           $truyen = truyen::find($maTruyen);
           array_push($chartTruyens, $truyen);
       }

       return view('Khach.XemChiTietTruyen',['truyen'=>$truyen0, 'chartTruyens'=>$chartTruyens]);
       }
       return redirect()->route('trangchu');
       
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
       if($option)
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
        $paginate = 10;
       $page = Input::get('page', 1);
       $of = $page*$paginate-$paginate;
       $curesults = array_slice($results, $of, $paginate, true);
       $pagi = new LengthAwarePaginator($curesults,count($results),$paginate);
       $pagi->setpath('/theloai/');
       return view('Khach.TimKiemTruyen',['dstruyen'=>$pagi,'option'=>'Truyện','content'=>$content]);
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
                   if(!in_array($tr, $results))
                    array_push($results,$tr);
       }
       $paginate = 10;
       $page = Input::get('page', 1);
       $of = $page*$paginate-$paginate;
       $curesults = array_slice($results, $of, $paginate, true);
       $pagi = new LengthAwarePaginator($curesults,count($results),$paginate);
       $pagi->setpath('/theloai/');
       $theloais = theloai::all();
       $tentl = [];
       foreach ($theloais as $tl) {
         array_push($tentl, $tl->tenTL);
       }
       return view('Khach.TimKiemTruyen',['dstruyen'=>$pagi,'option'=>'Thể loại','content'=>$content,'select'=>$tentl]);
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

              $paginate = 10;
       $page = Input::get('page', 1);
       $of = $page*$paginate-$paginate;
       $curesults = array_slice($results, $of, $paginate, true);
       $pagi = new LengthAwarePaginator($curesults,count($results),$paginate);
       $pagi->setpath('/theloai/');
       $nhoms = nhom::all();
       $tennhoms = [];

       foreach ($nhoms as $nhom) {
         array_push($tennhoms, $nhom->tenNhom);
       }
       return view('Khach.TimKiemTruyen',['dstruyen'=>$pagi,'option'=>'Nhóm','content'=>$content,'select'=>$tennhoms]);
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

        $paginate = 10;
       $page = Input::get('page', 1);
       $of = $page*$paginate-$paginate;
       $curesults = array_slice($results, $of, $paginate, true);
       $pagi = new LengthAwarePaginator($curesults,count($results),$paginate);
       $pagi->setpath('/theloai/');
       return view('tvNhom.QuanLyTruyen',['dstruyen'=>$dstruyen,'sltruyen'=>$sltruyen]);
     }
   }


    public function layTruyenTheoNam($content=2019){
        $truyens = truyen::all();
        $results = [];
        foreach ($truyens as $truyen)
        {
            if($truyen->getNam()==$content)
            {
                array_push($results, $truyen);
            }
        }
       $paginate = 10;
       $page = Input::get('page', 1);
       $of = $page*$paginate-$paginate;
       $curesults = array_slice($results, $of, $paginate, true);
       $pagi = new LengthAwarePaginator($curesults,count($results),$paginate);
       $pagi->setpath('/theloai/');
       $nams = range(2010, 2030);
        return view('Khach.TimKiemTruyen',['dstruyen'=>$pagi,'option'=>'Năm','content'=>$content,'select' =>$nams]);
    }

    public function docTruyen($idTruyen,$idChuong)
   {
       $truyen = truyen::find($idTruyen);
       $chuong = chuongtruyen::find($idChuong);
       if ($chuong && $truyen) {
       $truyen->capNhatLuotXem();
       $log = new log_read;
       $log->maTruyen = $truyen->maTruyen;
       $log->read_at = Carbon::now('Asia/Ho_Chi_Minh');
       $log->save();

       return  view('Khach.DocTruyen',['truyen'=>$truyen,'chuongxem'=>$chuong]);
       }

       return redirect()->route('trangchu');
       
   	
   }

    public function chiaSe($id=null)
   {
   	
   }

    public function themTruyenYeuThich($id){
       $check_exist = thanhvien_truyenyeuthich::where('maTruyen',$id)->get();
       foreach ($check_exist as $tr_yt)
       {
           if($tr_yt->maTK == Auth::user()->maTK)
               return redirect()->route('chitiettruyen',['id'=>$id]);

       }
        $tv_truyen = new thanhvien_truyenyeuthich;
        $tv_truyen->maTK = Auth::guard('thanhvien')->user()->maTK;
        $tv_truyen->maTruyen =$id;
        $tv_truyen->save();
        return redirect()->route('chitiettruyen',['id'=>$id]);
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
        $truyen->maNhom = Auth::guard('thanhvien')->user()->maNhom;
        $truyen->manguoiDang = Auth::guard('thanhvien')->user()->maTK;
        $truyen->save();

        $t = truyen::where([['tenTruyen','=', $request->tentruyen],['maNhom','=',Auth::guard('thanhvien')->user()->maNhom]])->get()->toArray();
        $truyen2 = truyen::find($t[0]['maTruyen']);
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $truyen2->linkAnh = 'cover/'.strval($truyen2->maTruyen).'.png';
            $file->move('cover', strval($truyen2->maTruyen).'.png');
        }

        foreach ($request->theloai as $tl)
        {
            $theloai = theloai::where('tenTL', $tl)->get()->toArray()[0];
            $t_tl = new truyen_theloai;
            $t_tl->maTL = $theloai['maTL'];
            $t_tl->maTruyen = $truyen2->maTruyen;
            $t_tl->save();

        }
        $truyen2->save();
        return redirect()->route('formthemchuongmoi',['maTruyen'=>$truyen2->maTruyen]);


    }

    public function getchinhSuaTruyen($id){
      $truyen = truyen::find($id);
      if($truyen->maNhom == Auth::guard('thanhvien')->user()->maNhom)
      {
          $theloais = theloai::all();
          return view('tvNhom.SuaThongTinTruyen',['truyen'=>$truyen, 'theloais'=>$theloais]);

      }  
      else
        return redirect()->route('chitiettruyen',['id'=>$id]);
    }

    public function chinhSuaTruyen(Request $request,$id){
              $this->validate($request,[
            'tentruyen'=>'required',
            'theloai' => 'required',
            'tacgia' => 'required',

        ],
        [
            'tentruyen.required' =>'Bạn chưa nhập tên truyện',
            'theloai.required' => 'Bạn chưa chọn thể loại',
            'tacgia.required' =>'ban chua nhap tac gia'

        ]);
        $truyens = Auth::guard('thanhvien')->user()->getNhom->getTruyen;
        foreach ($truyens as $truyenn)
        {
            if($truyenn->tenTruyen == $request->tentruyen and $truyenn->maTruyen != $id)
            {
                return redirect()->route('formchinhsuatruyen',['id'=>$truyen->maTruyen])->with('thongbao','Nhóm đã đăng truyện này!');
            }
        }

         $truyen = truyen::find($id);
         $truyen->tenTruyen= $request->tentruyen;
        $truyen->tacGia = $request->tacgia;
         if($request->gioithieu)
            $truyen->gioiThieu = $request->gioithieu;

        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $truyen->linkAnh = 'cover/'.strval($truyen->maTruyen).'.png';
            $file->move('cover', strval($truyen->maTruyen).'.png');
        }

        foreach ($truyen->getTheLoai as $tr_tl) {
         $tr_tl->delete();
        }

        foreach ($request->theloai as $tl)
        {
            $theloai = theloai::where('tenTL', $tl)->get()->toArray()[0];
            $t_tl = new truyen_theloai;
            $t_tl->maTL = $theloai['maTL'];
            $t_tl->maTruyen = $truyen->maTruyen;
            $t_tl->save();

        }

        $truyen->save();

        return redirect()->route('quanlytruyen');


    }

    public function getthemChuongMoi($maTruyen){
        $truyen = truyen::find($maTruyen);
        return view('tvNhom.ThemChuongMoi',['truyen'=>$truyen]);
    }

    public function themChuongMoi(Request $request, $maTruyen){
        $this->validate($request,[
            'tenchuong'=>'required',
            'linktrang' => 'required',


        ],[
            'tenchuong.required' =>'Bạn chưa nhập tên chương',
            'linktrang.required' => 'Bạn cần có link trang cho truyện',

        ]);
        $chuongs = chuongtruyen::where('maChuong', $maTruyen);

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
        $chuong->save();
        $trangs = explode(';',$request->linktrang);
        foreach ($trangs as $trang)
        {
//            $chuong = chuongtruyen::where('tenChuong', $request->tenchuong)->where('maTruyen', $maTruyen)->get()->toArray()[0];
            $trangtruyen = new trangtruyen;
            $trangtruyen->link = $trang;
            $trangtruyen->maChuong = $chuong->maChuong;
            $trangtruyen->save();

        }

        return redirect()->route('formthemchuongmoi',['maTruyen'=>$maTruyen])->with('thongbao', "<script> alert('thêm chuong mới thành công')</script>");

    }

    public function getsuaChuongTruyen($id){
      
           $chuong = chuongtruyen::find($id);
           $truyen = truyen::find($chuong->maTruyen);
           $stt = 1;
           $chuongs = chuongtruyen::where('maTruyen',$truyen->maTruyen)->orderBy('maChuong')->get();
           foreach ($chuongs as $c){
              if($c->maChuong == $chuong->maChuong)
                break;
              $stt +=1;
           }
       if($truyen->maNhom == Auth::guard('thanhvien')->user()->maNhom)
           return view('tvNhom.SuaChapTruyen',['truyen'=>$truyen,'chuong'=>$chuong,'stt'=>$stt]);
       else
           return redirect()->route('trangchu');

    }

    public function suaChuongTruyen(Request $request, $id){
    $this->validate($request,[
            'tenchuong'=>'required',
            'linktrang' => 'required',


        ],[
            'tenchuong.required' =>'Bạn chưa nhập tên chương',
            'linktrang.required' => 'Bạn cần có link cho trang chương truyện',

        ]);
        $chuong = chuongtruyen::find($id);
        $trangs = trangtruyen::where('maChuong',$id)->get();
        foreach ($trangs as $trang) {
          $trang->delete();
        };

        $chuong->tenChuong = $request->tenchuong;
        $chuong->ngayDang = Carbon::now('Asia/Ho_Chi_Minh');
        $chuong->save();
        $linktrangs = explode(';',$request->linktrang);
        foreach ($linktrangs as $trang)
        {
            $trangtruyen = new trangtruyen;
            $trangtruyen->link = $trang;
            $trangtruyen->maChuong = $chuong->maChuong;
            $trangtruyen->save();

        }

        return redirect()->route('formsuachuongtruyen',['id'=>$chuong->maChuong])->with('thongbao', "<script> alert('Sửa chương thành công')</script>");

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

   public function danhGia($idtruyen, $data){
       $truyen = truyen::find($idtruyen);
       $rate = rate_tv::where('maTruyen',$idtruyen)->where('maTK',Auth::user()->maTK)->get();
        if (count($rate)!=0)
        {
            $rate= $rate[0];
            if(!$rate->checkValidateRate())
                echo "Điểm đánh giá: ".strval($truyen->diemDG);
            else{
                $rate->diem = $data;
                $rate->rateTime = Carbon::now('Asia/Ho_Chi_Minh');
                $rate->save();
                $truyen->soDG +=1;
                $truyen->diemDG =round(($truyen->diemDG*($truyen->soDG-1) + $data)/$truyen->soDG,1);
                $truyen->save();
                echo "Điểm đánh giá: ".strval($truyen->diemDG);
            }
        }else
        {
            $rate = new rate_tv;
            $rate->maTruyen = $idtruyen;
            $rate->maTK = Auth::user()->maTK;
            $rate->diem = $data;
            $rate->rateTime = Carbon::now('Asia/Ho_Chi_Minh');
            $rate->save();
            $truyen->soDG +=1;
            $truyen->diemDG =round(($truyen->diemDG*($truyen->soDG-1) + $data)/$truyen->soDG,1);
            $truyen->save();
            echo "Điểm đánh giá: ".strval($truyen->diemDG);
        }


   }
   
   
}
