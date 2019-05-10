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

        $truyens = truyen::all();
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
