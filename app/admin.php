<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class admin extends Authenticatable
{
    //
     protected $table = 'admin';
    public $timestamps = false;
    protected $primaryKey = 'maTK';

}
