@extends('layouts.master_qlnd')

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
          <div class="row search-view-element">
            <div class="col-md-5">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
            </div>
            <div class="col-md-7">
              <h5><a href="#">Sword art online</a></h5>
              <p><i class="fas fa-star"></i> 9.1/10</p>
              <p>Chap: 31</p>
              <div class="author">
                <p>Tác giả: D-Kun</p>
                <p>Thể loại: Action, Fantasy, Romance</p>
                <p>Trạng thái: đang tiến hành</p>
              </div>
              <div class="summary">
                <p>Sơ lươc nội dung truyện</p>
              </div>
              <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;"class="button-del" >Xóa</button>
            </div>
          </div>
          <div class="row search-view-element">
            <div class="col-md-5">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
            </div>
            <div class="col-md-7">
              <h5><a href="#">Sword art online</a></h5>
              <p><i class="fas fa-star"></i> 9.1/10</p>
              <p>Chap: 31</p>
              <div class="author">
                <p>Tác giả: D-Kun</p>
                <p>Thể loại: Action, Fantasy, Romance</p>
                <p>Trạng thái: đang tiến hành</p>
              </div>
              <div class="summary">
                <p>Sơ lươc nội dung truyện</p>
              </div>
              <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;"class="button-del" >Xóa</button>

            </div>
          </div>
          <div class="row search-view-element">
            <div class="col-md-5">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
            </div>
            <div class="col-md-7">
              <h5><a href="#">Sword art online</a></h5>
              <p><i class="fas fa-star"></i> 9.1/10</p>
              <p>Chap: 31</p>
              <div class="author">
                <p>Tác giả: D-Kun</p>
                <p>Thể loại: Action, Fantasy, Romance</p>
                <p>Trạng thái: đang tiến hành</p>
              </div>
              <div class="summary">
                <p>Sơ lươc nội dung truyện</p>
              </div>
              <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;"class="button-del" >Xóa</button>

            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="popup-alert" style="display: none;width: 500px;margin: 0 auto;position: fixed;top: 200px;background: #ccc;left: 35%;padding: 20px;border-radius: 10px;text-align: center;">
    <h2>Xóa truyện này ?</h2>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Đồng ý</button>
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