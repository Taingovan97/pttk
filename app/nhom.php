<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class nhom extends Model
{
    //
    protected $table = 'nhom';
    public $timestamps = false;
    protected $primaryKey = 'maNhom';


    public function getNgayLap(){
        $ngay = new Carbon($this->ngayLap);
        return $ngay->toDateString();
    }

    public function getThanhVien(){
        return $this->hasMany('App\thanhvien', 'maNhom', 'maNhom');
    }

    public function getSoLuongThanhVien(){

        return $this->getThanhVien->count();
    }

    public function getTruyen(){
        return $this->hasMany('App\truyen','maNhom','maNhom');
    }

    public function getSoLuongTruyen()
    {
        return $this->getTruyen()->count();

    }
    
    public function getTruongNhom()
    {
    	return $this->hasOne('App\thanhvien', 'maTK', 'maTruongNhom');
    }


}


