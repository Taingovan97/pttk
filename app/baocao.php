<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\thanhvien;

class baocao extends Model
{
    //
     protected $table = 'baocao';
    public $timestamps = false;
    protected $primaryKey = 'maBC';

    public function nguoiGui()
    {
    	$ten = thanhvien::where('maTK', $this->maTK1)->value('name');
    	return $ten;
    }
}
