<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\binhluan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class chuongtruyen extends Model
{
    //
    protected $table = 'chuongtruyen';
    public $timestamps = false;
    protected $primaryKey = 'maChuong';

    
    public function thoiGianDaDang(){

        $date =new Carbon($this->ngayDang);
        return $date->toDateString();
    }

    public function getdsTrangTruyen(){
        return $this->hasMany('App\trangtruyen','maChuong','maChuong');
    }

    public function getdsBinhLuan()
    {
        return $this->hasMany('App\binhluan','maChuong', 'maChuong');
    }
    
    public function setBinhLuan($noidung)
    {
        $binhluan = new binhluan;
        $binhluan->noiDung = $noidung;
        $binhluan->ngayGui = Carbon::now('Asia/Ho_Chi_Minh');
        $binhluan->maChuong = $this->maChuong;
        $binhluan->maTK = Auth::guard('thanhvien')->user()->maTK;
        $binhluan->save();
        
    }


    public function chuongTruoc(){

        $previous = chuongtruyen::where('maChuong', '<', $this->maChuong)->max('maChuong');
        return $previous;
    }
    public function chuongSau(){
        $next = chuongtruyen::where('maChuong', '>', $this->maChuong)->min('maChuong');
        return $next;
    }
}
