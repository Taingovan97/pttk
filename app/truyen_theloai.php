<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class truyen_theloai extends Model
{
    protected $table = 'truyen_theloai';
    protected $primaryKey = 'maTL';

    public function getTheLoai()
    {
        return $this->belongsTo('App\theloai', 'maTL', 'maTL');
    }
}
