<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\nhom;
use App\dexuat;
use Illuminate\Support\Facades\Auth;

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
            'noidung'=>'required|min:20'

        ],[
            'tieude.min' => 'Tên nhóm phải chứa ít nhất 4 ký tự',
            'tieude.required' => 'Bạn chưa nhập tên nhóm',
            'tennhom.required' => 'Bạn chưa nhập tên nhóm',
            'tennhom.exists'=>'Tên nhóm không tồn tại',
            'noidung'=>'nội dung quá ngắn'

        ]);
    	$nhom = nhom::where('tenNhom', $request->tennhom)->get()->toArray()[0];
    	$dexuat = new dexuat;
    	$dexuat->tieuDe = $request->tieude;
    	$dexuat->noiDung =$request->noidung;
    	$dexuat->maNhom =$nhom['maNhom'];
    	$dexuat->maTK = Auth::guard('thanhvien')->user()->maTK;
    	$dexuat->ngayGui = Carbon::now('Asia/Ho_Chi_Minh');
        $dexuat->save();
        return redirect()->route('dexuat')->with('thongbao', 'bạn đã gửi đề xuất thành công!');
    }
    public function dsDeXuat($name=null){

        if ($name==null){
            $dx = dexuat::orderBy('trangThai')->paginate(10);
            return view('tvNhom.dsDeXuat',['dexuat'=>$dx]);
        }else{
            $pattern = '/[a-zA-Z]*';
            $tokens = explode(' ',$name);
            foreach ($tokens as $tk)
            {
                $pattern = $pattern.$tk.'[a-zA-Z]*\s*';
            }
            $pattern = $pattern.'/';
            $results =[];
            $dexuats = dexuat::all();
            foreach ($dexuats as $dx)
            {
                if(preg_match($pattern, $dx->tieuDe))
                    array_push($results,$dx);
            }
            return view('tvNhom.dsDeXuat',['dexuat'=>$results,'find'=>1]);
//            echo 'check';
        }
    }
    public function xemChiTiet($id){
        $dexuat = dexuat::find($id);
        return view('tvNhom.XemDeXuat',['dexuat'=>$dexuat]);
    }

    public function xuLy($id){
        $dx = dexuat::find($id);
        $dx->trangThai =true;
        $dx->save();
        return redirect()->route('qldexuat');
    }

    public function xoa($id){
        $dx = dexuat::find($id);
        $dx->delete();
        return redirect()->route('qldexuat');
    }
}
