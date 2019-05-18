<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\truyen;
use App\chuongtruyen;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DK_Trang extends Controller
{
    public function home()
    {

        if(Auth::guard('admin')->user())
        {
            if(Auth::guard('admin')->user()->quyen =='noidung')
                return redirect()->route('quanlynoidung');
            else {
                return redirect()->route('quanlytaikhoan');
        }

        }else{
            $truyens = truyen::where('duyet',true)->get();
            ////        $chuong = chuongtruyen::all()->toArray();
            ////                    echo '<pre>';
            ////                    var_dump($chuong);
            ////            echo '<pre/>';
            //
            //        foreach ($truyens as $t){
            //                $chuong = $t->chuongMoiNhat();
            ////            echo gettype($chuong);
            //
            ////            foreach ($chuong as $infor)
            ////                {
            ////                    echo '<pre>';
            ////                    var_dump($infor->tenChuong);
            ////                    echo '<pre/>';
            ////                }
            //            echo '<pre>';
            //           var_dump($chuong);
            //            echo '<pre/>';
            //    }
           return view('Khach.TrangChu', ['dstruyen'=> $truyens, 'chartTruyens'=>$truyens]);

            }


    }

    public function trangChuAdminNoiDung()
    {
            $truyens = truyen::all();
            return view('quanlyND.index', ['dstruyen'=> $truyens, 'chartTruyens'=>$truyens]);
        
    }
    public function trangChuAdminTaiKhoan()
    {
        return view('quanlyTK.tracuuTK');
    }

    public function truyenmoi()
    {
    	
    }

    public function tacgia()
    {
    	
    }

    public function nam()
    {
    	
    }
}
