<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\chuongtruyen;
use Carbon\Carbon;
class truyen extends Model
{
    //
    protected $table = 'truyen';
    public $timestamps = false;
    protected $primaryKey = 'maTruyen';


    public function dsChuong()
    {
        return $this->hasMany('App\chuongtruyen', 'maTruyen','maTruyen');
    }

    public function nhom()
    {
       return $this->belongsTo('App\Nhom','maNhom', 'maNhom');
    }


    public function getTheloai()
    {
        return $this->hasMany('App\truyen_theloai', 'maTruyen', 'maTruyen');
    }
    public function chuongMoiNhat()
    {
        $chuong = chuongtruyen::where('maTruyen', $this->maTruyen)->orderBy('maChuong','desc')->take(1)->get();
        return $chuong;
    }


    public function soChuong()
    {
        return $this->hasMany('App\chuongTruyen', 'maTruyen', 'maTruyen')->count();
    }
    public function time()
    {
        $chuong = chuongtruyen::where('maTruyen', $this->maTruyen)->orderBy('maChuong','desc')->take(1)->get()->toArray();
        return $chuong['ngayDang'];
    }

    public function capNhatLuotXem(){
        $this->luotXem = $this->luotXem + 1;
        $this->save();
    }

    public function getNam()
    {
        $date = new Carbon($this->ngayDang);
        $date = $date->year;
        return $date;
    }

    public function trangThaiTruyen(){
        switch ($this->trangThai) {
            case '0':
                return 'Đang thưc hiện';
                break;
            case '1':
                return 'Tạm dừng';
                break;
            case '2':
                return 'Hoàn thành';
                break;
            default:
                return 'Đang thưc hiện';
                break;
        }
    }



}
