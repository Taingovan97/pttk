<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\nhom;
use App\truyen;
use App\chuongtruyen;
use App\theloai;
use App\baocao;
use App\Http\Controllers\DK_QLTruyen;



class pagescontroller extends Controller
{
    //
    public function index()
    {
    	return view('layouts.home');
    }

    public function index_qltk()
    {
    	return view('layouts.master_qltk');
    }

    public function nhom()
    {
    	return view('quanlyTK.nhom');
    }

    public function index_qlnd()
    {
            $truyens = truyen::where('duyet',true)->paginate(10);
            $thongke = DK_QLTruyen::thongke('ngay');
            $chartTruyens = [];
            foreach ($thongke as $maTruyen=>$luotxem)
            {
                $truyen = truyen::find($maTruyen);
                array_push($chartTruyens, $truyen);
            }
            $truyenmoi = truyen::where('duyet',true)->orderBy('ngayDang','desc')->take(5)->get();
            return view('quanlyND.TrangChu', ['dstruyen'=> $truyens, 'chartTruyens'=>$chartTruyens,'truyenmoi'=>$truyenmoi]); 
    }

    
}


