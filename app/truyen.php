<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\chuongtruyen;
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

    public function theLoai(){

        return  $this->hasMany('App\theloai', 'maTL', 'maTL');
    }

    public function dstheloai()
    {
        return $this->hasMany('App\truyen_theloai', 'maTruyen', 'maTruyen');
    }
    public function chuongMoiNhat()
    {
        $chuong = chuongtruyen::where('maTruyen', $this->maTruyen)->orderBy('maChuong','desc')->take(1)->get()->toArray();
        if(empty($chuong))
            return 0;
        return $chuong[0];
    }


    public function time()
    {
        $chuong = chuongtruyen::where('maTruyen', $this->maTruyen)->orderBy('maChuong','desc')->take(1)->get()->toArray();
        return $chuong['ngayDang'];
    }

}
