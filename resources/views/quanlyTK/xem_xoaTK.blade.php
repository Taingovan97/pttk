@extends('layouts.master_qltk')

@section('noidung')

<div class="main container">
    <div class="row" >
      <div class="col-md-7">
        <h3 >Quản lý tài khoản / Xóa tài khoản</h3>
      </div>
      <div class="col-md-2">
        <p style="margin:5px 0; text-align: right;">Chọn tài khoản :</p>
      </div>
      <div class="col-md-3">
        <form action="{{route("xoaTK")}}" method="post">
        {{ csrf_field() }}
        <div class="find-element">
          <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
          <button type="submit"></button>
        </div>
    	</form>
      </div>
    </div>
    <div class="">
      <h4>Thông tin tài khoản</h4>
      <div class="row">
        <div class="col-md-4">
          <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;border: 1px solid;">
		  <button type="button" name="button" style="margin: 10px auto;width: 100%;background: #00b2bf;padding: 8px;border: none;font-weight: bold;color: #fff;font-size: 14px;" class="button-del">Xóa</button>
        </div>
      <div class="col-md-8">
          <div class="row">
            <div class="col-md-3">
              <p>Tên đăng nhập:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $ten; ?></p>
            </div>
          </div>
		  <div class="row">
            <div class="col-md-3">
              <p>Tình trạng xác thực:</p>
            </div>
            <div class="col-md-4">
              <p><?php 
              if ($active == true) 
              	echo "Đã xác thực";
              else
              	echo "Chưa xác thực";
               ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Email:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $email; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Số điện thoại:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $sdt; ?></p>
            </div>
          </div>

		  <div class="row">
            <div class="col-md-3">
              <p>Giới tính:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $genre; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Mã tài khoản:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $maTK; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Tên nhóm:</p>
            </div>
            <div class="col-md-4">
              <p>Pinoy</p>
            </div>
          </div>

        </div>
          
        </div>
      </div>
    </div>
  </div>
  <div class="popup-alert" style="display: none;width: 500px;margin: 0 auto;position: fixed;top: 200px;background: #ccc;left: 35%;padding: 20px;border-radius: 10px;text-align: center;">
    <h2>Xác nhận xóa ?</h2>
    <a href="{{route('timTK')}}" action="{{<?php $account->delete(); ?>}}" type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Đồng ý
    </a>
    <a type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-cal">Hủy</a>
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
