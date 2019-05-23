<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class log_read extends Model
{
    protected $table = 'log_read';
    public $timestamps = false;
    protected $primaryKey = 'id';
    //
    public function getTruyen(){
        return $this->belongsTo('App\truyen','maTruyen', 'maTruyen');
    }

    public function getMonth(){
        $time = new Carbon($this->read_at);
        return $time->month;
    }

    public function getDay(){
        $time = new Carbon($this->read_at);
        return $time->day;
    }

    public function getWeek(){
        $time = new Carbon($this->read_at);
        return $time->week;
    }
    public function getYear(){
        $time = new Carbon($this->read_at);
        return $time->year;
    }
}
