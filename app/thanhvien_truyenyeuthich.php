<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\truyen;

class thanhvien_truyenyeuthich extends Model
{
    protected $table = 'thanhvien_truyenyeuthich';
    public $timestamps = false;
    protected $primaryKey = 'maTK';
    public $incrementing = false;

    public function getTruyen(){

        return $this->belongsTo('App\truyen','maTruyen', 'maTruyen');
    }

}
