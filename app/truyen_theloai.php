<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class truyen_theloai extends Model
{
    protected $table = 'truyen_theloai';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function getTheLoai()
    {
        return $this->belongsTo('App\theloai', 'maTL', 'maTL');
    }
}
