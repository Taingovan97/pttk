<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\baocao;

class DK_QLBaoCao extends Controller
{
    
	//tim bao cao
    public function tracuuBC()
    {
    	$data = baocao::all()->toArray();
    	return view('quanlyND.tracuuBC', ['baocao'=>$data]);
    }

    public function baocao(Request $request)
    {
    	$name = $request->input('keyword');
    	$bc = baocao::pluck('tieuDe')->toArray();
    	if (in_array($name, $bc)) {
    		$id = baocao::where('tieuDe',$name)->value('maBC');
    		return redirect('xemBC', ['id'=>$id]);

    	}
    	else
    		return view('qlnd_fail');
    }

    //chi tiet bao cao
    public function xemBC($id)
    {
    	$data = baocao::find($id);
    	$name = $data->nguoiGui();
    	return view('quanlyND.xemBC', ['baocao'=>$data, 'name'=>$name]);
    }

    public function xoaBC($id)
    {
    	$data = baocao::find($id);
    	$data->delete();
    	return('da_xoa');
    }

}
