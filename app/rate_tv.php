<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class rate_tv extends Model
{
    protected $table = 'rate_tv';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function checkValidateRate(){
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $diff = $now->diffInSeconds($this->rateTime);
        if($diff<10)
            return false;
        else
            return true;
    }
}
