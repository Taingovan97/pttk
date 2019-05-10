<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chaptruyen extends Model
{
    public $timestamps = false;
    protected $table = 'trangtruyen';
    protected $primaryKey = 'id';
}
