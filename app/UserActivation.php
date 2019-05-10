<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    protected $table = 'user_activations';
    protected $primaryKey = 'activation_code';

    protected function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    public function createActivation($user)
    {

        $activation = $this->getActivation($user); // lấy activation của user:taikhoan

        if (!$activation) {
            return $this->createCode($user); // chua có activation cho user thì tạo và return về activation code
        }
        return $this->regenerateCode($user);

    }

    private function regenerateCode($user)
    {

        $token = $this->getToken();
        UserActivation::where('maTK', $user->maTK)->update([
            'activation_code' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    private function createCode($user)
    {
        $code = $this->getToken();
        UserActivation::insert([
            'maTK' => $user->maTK,
            'activation_code' => $code,
            'created_at' => new Carbon()
        ]);
        return $code;
    }

    public function getActivation($user)
    {
        return UserActivation::where('maTK', $user->maTK)->first();
    }


    public function getActivationByToken($code)
    {
        return UserActivation::where('activation_code', $code)->first();
    }

    public function deleteActivation($code)
    {
        UserActivation::where('activation_code', $code)->delete();
    }
}
