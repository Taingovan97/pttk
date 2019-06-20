@extends('layouts.master_qlnd')

@section('noidung')

<div class="location container">
      <div class="row">
        <div class="col-md-7">
          <h5><span><a style="color: blue;" href="{{route('index_qlnd')}}">Trang chủ</a></span>/<span><a style="color: blue;" href="{{route('tracuuBC')}}">Quản lý báo cáo</a></span>/<span>Xem báo cáo</span>/</h5>
        </div>
        
      </div>

    </div>



  <div class="main container" style="min-height: 500px;">
    <div style="margin-left: 30px;">
      @if($baocao->loaiBC == 1)
      <h4><?php echo "Báo cáo vi phạm "?></h4>
      @else
      <h4><?php echo "Báo cáo truyện lỗi"; ?></h4>
      @endif
      <p><?php echo "Người gửi: ".$name; ?></p>
      <p><?php echo "Ngày gửi: ".$baocao->ngayGui; ?></p>
      <p><?php echo "Lý do: ". $baocao->tieuDe; ?></p>
      <textarea name="name" rows="8" cols="80">{{$baocao->noiDung}}</textarea>
      <div class="" style="width: 60%;">
        <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Trả lời</button>
        <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-del" >Xóa</button>
      </div>

    </div>

  </div>
  <div class="popup-alert" style="display: none;width: 500px;margin: 0 auto;position: fixed;top: 200px;background: #ccc;left: 35%;padding: 20px;border-radius: 10px;text-align: center;">
    <h2>Xóa báo cáo này ?</h2>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" onclick="window.location='{{route("xoaBC", ['id'=>$baocao->maBC])}}'">Đồng ý</button>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-cal">Hủy</button>


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