<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
class thanhvien extends Authenticatable
{
    //
    use Notifiable;

    protected $table = 'thanhvien';
    public $timestamps = false;
    protected $primaryKey = 'maTK';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNgayThamGia(){
        $date = new Carbon($this->create_at);
        return $date->toDateString();
    }
    public function truyenYeuThich()
    {
        return $this->hasMany('App\thanhvien_truyenyeuthich','maTK', 'maTK');
    }

    public function getNhom()
    {
        return $this->belongsTo('App\nhom','maNhom','maNhom');
    }

    public function getSoLuongTruyenDang()
    {
        return $this->hasMany('App\truyen', 'manguoiDang', 'maTK')->count();
    }

    public function setNhom(){

    }
    
}
