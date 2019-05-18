<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nhom;
use App\dexuat;
class DK_QLDeXuat extends Controller
{
    function getNhom(){
        $ten =  nhom::all(['tenNhom']);
        foreach ($ten as $t)
            echo $t->tenNhom;
    }
    public function postGuiDeXuat(Request $request)
    {
    	$this->validate($request,[
            'tieude'=>'required|min:4',
            'tennhom'=>'required|exists:nhom,tenNhom',
            'noidung'=>'required|min:30'

        ],[
            'tieude.min' => 'Tên nhóm phải chứa ít nhất 4 ký tự',
            'tieude.required' => 'Bạn chưa nhập tên nhóm',
            'tennhom.required' => 'Bạn chưa nhập tên nhóm',
            'tennhom.exists'=>'Tên nhóm không tồn tại',
            'noidung'=>'nội dung quá ngắn'

        ]);
    	$dexuat = new dexuat;

    }
}
