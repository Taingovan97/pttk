<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\thanhvien;
use Carbon\Carbon;

class binhluan extends Model
{
    //
     protected $table = 'binhluan';
    public $timestamps = false;
    protected $primaryKey = 'maBL';

    public function getThanhVien()
    {
    	return $this->belongsTo('App\thanhvien', 'maTK', 'maTK');
    }

    public function timeUpToNow()
    {
    	$now = Carbon::now('Asia/Ho_Chi_Minh');
    	$totalDuration = $now->diffInMinutes($this->ngayGui);
    	return $totalDuration;

    }
}
