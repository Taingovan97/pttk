<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhom extends Model
{
    //
    protected $table = 'nhom';
    public $timestamps = false;
    protected $primaryKey = 'maNhom';


    public function thanhvien()
    {
    	return $this->hasMany('App\thanhvien', 'maNhom', 'maNhom');
    }

    public function truyen()
    {
    	return $this->hasMany('App\Truyen', 'maNhom', 'maNhom');
    }
}


