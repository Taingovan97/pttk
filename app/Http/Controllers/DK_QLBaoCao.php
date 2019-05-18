<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\truyen;
use App\chuongtruyen;
use App\baocao;
use App\thanhvien;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DK_QLBaoCao extends Controller
{
    public function getbaoCaoTruyen($idTruyen, $idChuong)
    {
    	$truyen = truyen::find($idTruyen);
    	$chuong = chuongtruyen::find($idChuong);
    	return view('ThanhVien.BaoCaoTruyen',['truyen' =>$truyen, 'chuong' =>$chuong]);
    }

    public function postBaoCaoTruyen(Request $request, $maTruyen, $maChuong)
    {
    	echo $request->khac;
    	$Truyen = truyen::find($maTruyen);
    	$Chuong = chuongtruyen::find($maChuong);
    	$baocao = new baocao;

    	$baocao->tieuDe = $request->chapdie.$request->chapnham.$request->truyenthieuchap.$request->chapmattrang.$request->chapsaithutu.$request->khac;
    	$baocao->noiDung = 'Truyen: '.$Truyen->tenTruyen.' -Tên Chương: '.$Chuong->tenChuong.' -Ghi chu: ' .$request->ghichu;
    	$baocao->ngayGui =  Carbon::now('Asia/Ho_Chi_Minh');
    	$baocao->maTK1 = Auth::guard('thanhvien')->user()->maTK;
    	$baocao->loaiBC = 0;
    	$baocao->maTruyen = $Truyen->maTruyen;
    	$baocao->save();
    	return redirect()->route('doctruyen',  ['idTruyen' =>$maTruyen, 'idChuong' =>$maChuong]);
    }
    public function getBaoCaoViPham($maTruyen, $maChuong, $maTV2)
    {
        $truyen = truyen::find($maTruyen);
        $chuong = chuongtruyen::find($maChuong);
        $thanhvien = thanhvien::find($maTV2);
        return view('ThanhVien.BaoCaoViPham', ['truyen'=>$truyen, 'chuong'=>$chuong, 'thanhvien'=>$thanhvien]);

    }

    public function postBaoCaoViPham(Request $request, $maTruyen, $maChuong, $maTV2)
    {
        echo $request->khac;
        $Truyen = truyen::find($maTruyen);
        $Chuong = chuongtruyen::find($maChuong);
        $thanhvien = thanhvien::find($maTV2);
        $baocao = new baocao;

        $baocao->tieuDe = $request->xucpham.$request->spoil.$request->khac;
        $baocao->noiDung = 'Truyen: '.$Truyen->tenTruyen.' -Tên Chương: '.$Chuong->tenChuong.' -TVVP: '.$thanhvien->name.' -Ghi chu: ' .$request->ghichu;
        $baocao->ngayGui =  Carbon::now('Asia/Ho_Chi_Minh');
        $baocao->maTK1 = Auth::guard('thanhvien')->user()->maTK;
        $baocao->maTK2 = $maTV2;
        $baocao->loaiBC = 1;
        $baocao->save();
        return redirect()->route('doctruyen',  ['idTruyen' =>$maTruyen, 'idChuong' =>$maChuong]);
    }
    
}
