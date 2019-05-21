<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dexuat extends Model
{
    //
    protected $table = 'dexuat';
    public $timestamps = false;
    protected $primaryKey = 'maDX';

    function nguoiGui(){
        return $this->belongsTo('App\thanhvien','maTK','maTK');
    }
}
