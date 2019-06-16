@extends('layouts.master_dangnhap_dangky')
@section('head.title')
  Đăng nhập thành viên
@stop
@section('head.option')
  Đăng nhập
@stop

@section('head.route')
  {{route('dangnhap')}}
@stop
@section('head.content')
  <div>
    <div class="" style="margin: 10px 0;">
      <div class="row">
        <div class="col-md-4">
          <p>Tài khoản:</p>
        </div>
        <div class="col-md-8">
          <input class="input-login" type="text" name="tentaikhoan" value="" placeholder="">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <p>Mật khẩu:</p>
        </div>
        <div class="col-md-8">
          <input class="input-login" type="password" name="matkhau" value="" placeholder="">
        </div>
      </div>
      <div class="row">
        <p style="padding: 10px;"><input type="checkbox" name="" value=""> Ghi nhớ đăng nhập</p>
      </div>
    </div>
    <div class="" >
      <p><a href="{{route('getcaplaimatkhau')}}">Quên mật khẩu?</a></p>
      <p>Chưa có tài khoản? <a href={{route('taoformdangky')}}>Đăng ký</a></p>
    </div>
  </div>
@stop
@section('head.button')
  Đăng Nhập
@stop
