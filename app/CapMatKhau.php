<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CapMatKhau extends Model
{
    protected $table = 'doimatkhau';
    protected $primaryKey = 'token';

    protected function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    public function createCode($user, $matkhaumoi)
    {
        $code = $this->getToken();
        CapMatKhau::insert([
            'maTK' => $user->maTK,
            'token' => $code,
            'ngay_doi' => new Carbon(),
            'matKhauMoi' => $matkhaumoi
        ]);
        return $code;
    }
    //
}
