<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chuongtruyen extends Model
{
    //
    protected $table = 'chuongtruyen';
    public $timestamps = false;
    protected $primaryKey = 'maChuong';

    public function thoiGianDaDang(){

    }

    public function dsTrangTruyen(){
        return $this->hasMany('App\trangtruyen','maChuong','maChuong');
    }
}
