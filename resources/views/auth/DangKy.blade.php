@extends('layouts.master_dangnhap_dangky')
@section('head.title')
    Đăng ký thành viên
@endsection

@section('head.option')
  Đăng ký
@stop

@section('head.route')
  {{route('dangkytaikhoan')}}
@stop
@section('head.content')
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
      <div class="col-md-4">
        <p>Nhập lại mật khẩu:</p>
      </div>
      <div class="col-md-8">
        <input class="input-login" type="password" name="nhaplaimatkhau" value="" placeholder="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <p>Email:</p>
      </div>
      <div class="col-md-8">
        <input class="input-login" type="email" name="email" value="" placeholder="">
      </div>
    </div>
    <div class="row">
      <a href="" style="padding: 10px 40px 10px 10px; display: block ; font-weight: bold"  target="_blank">(*)Xem chi tiết điều khoản</a>
      <p style="padding: 10px;"><input type="checkbox" name="dongy" value="dongy">
        Tôi đã xem và đồng ý các điều khoản
        <a href="{{route('dangnhap')}}" style="padding: 10px; display: block" target="_parent" > Đăng nhập</a>
      </p>
    </div>
  </div>
@stop
@section('head.button')
  Đăng ký
@stop

