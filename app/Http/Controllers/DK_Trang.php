<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\truyen;
use App\chuongtruyen;
use App\theloai;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\DK_QLTruyen;
class DK_Trang extends Controller
{
    public function home()
    {

        if(Auth::guard('admin')->user())
        {
            if(Auth::guard('admin')->user()->quyen =='noidung')
                return redirect()->route('index_qlnd');
            else {
                return redirect()->route('index_qltk');
        }

        }else{
            $truyens = truyen::where('duyet',true)->get();
            $thongke = DK_QLTruyen::thongke('ngay');
            $chartTruyens = [];
            foreach ($thongke as $maTruyen=>$luotxem)
            {
                $truyen = truyen::find($maTruyen);
                array_push($chartTruyens, $truyen);
            }
            $theloai = theloai::all();
           return view('Khach.TrangChu', ['dstruyen'=> $truyens, 'chartTruyens'=>$chartTruyens,'theloai'=>$theloai]);

            }


    }


    public function trangChuAdminNoiDung()
    {
            //$truyens = truyen::all();
            //return view('quanlyND.index', ['dstruyen'=> $truyens, 'chartTruyens'=>$truyens]);
        return redirect()->route('index_qlnd');
        
    }

    public function quanlytruyen(){
        $nhom = Auth::guard('thanhvien')->user()->getNhom;

        $dstruyen = truyen::where('maNhom',$nhom->maNhom)->paginate(4);
        $sltruyen = $dstruyen->count();
        return view('tvNhom.QuanLyTruyen',['dstruyen'=>$dstruyen, 'sltruyen'=>$sltruyen]);
    }

    public function trangChuAdminTaiKhoan()
    {
        return redirect()->route('index_qltk');
    }

    public function truyenmoi()
    {
    	
    }


}
