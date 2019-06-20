@extends('layouts.master_qlnd')
@section('head.title')
    Xóa truyện
@endsection
@section('noidung')
<div class="main container" style="min-height: 500px;">
    
  <div class="row" >
      <div class="col-md-7">
        <h3>Xóa truyện</h3>
      </div>
      <div class="col-md-2">
        <p style="margin:5px 0; text-align: right;">Chọn truyện :</p>
      </div>
      <div class="col-md-3">
        <div class="find-element">
          <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
          <button type="submit"></button>
        </div>
      </div>
    </div>
      <div class="row" style="margin-top: 50px;">
        <div class="col-md-8">
          @if(count($data)!=0)
          @foreach($data as $truyen)
           <div class="row">
            <div class="col-md-5">
                <img src="{{asset($truyen->linkAnh)}}" alt="{{$truyen->tenTruyen}}" style="width: 100%;border: 2px solid;">
            </div>
            <div class="col-md-7">
                <b>{{$truyen->tenTruyen}}</b>
                <ul>
                    <li><p id="diem">Điểm đánh giá: {{$truyen->diemDG}}</p></li>
                    <li>Tác giả: {{$truyen->tacGia}}</li>
                    <li>Nhóm dịch: <a href="{{route('nhomdich',['id'=>$truyen->nhom->tenNhom])}}">{{$truyen->nhom->toArray()['tenNhom']}}</a></li>
                    <li><span>Chap {{$truyen->soChuong()}}</span><span> | </span> Lượt xem:<span> {{$truyen->luotXem}}</span></li>
                    <li>Thể loại:
                        @foreach($truyen->getTheLoai as $tr_tl)
                            <a href="{{route('theloai',['id'=>$tr_tl->getTheLoai->tenTL])}}">{{$tr_tl->getTheloai->tenTL}}</a>,
                        @endforeach
                    </li>
                    <li>Trạng thái: {{$truyen->trangThaiTruyen()}}</li>
                    <li style="border: 1px solid grey; height: 100px;">Sơ lược nội dung truyện: {{$truyen->gioiThieu}}</li>
                </ul>
            </div>
        </div>
          <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;"class="button-del" >xóa</button>
          <div class="popup-alert" style="display: none;width: 500px;margin: 0 auto;position: fixed;top: 200px;background: #ccc;left: 35%;padding: 20px;border-radius: 10px;text-align: center;">
          <h2>Xóa truyện này ?</h2>
          <button onclick="window.location='{{route('da_xoatruyen', ['id'=>$truyen->maTruyen])}}'" type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Đồng ý</button>
          <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-cal">Hủy</button>
          </div>
          @endforeach
          @endif
          
          
          </div>

      </div>
  </div>
  
@endsection

@section('style')
<script type="text/javascript">
$(function(){
  $(".button-del").click(function(){
    $(".popup-alert").show();
  });
  $(".button-cal").click(function(){
    $(".popup-alert").hide();
  });
});
</script>

@endsection