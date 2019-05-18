@extends('layouts.master_dangnhap_dangky')
@section('head.title')
    Cấp tài khoản admin
@endsection

@section('head.option')
  Thông tin tài khoản
@stop

@section('head.route')
  {{route('captaikhoan')}}
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
      <div class="col-md-4">
        <p>Quyền:</p>
      </div>
      <div class="col-md-8">
          <select name="quyen" class="select" style="border-radius: 5px;">
            <option selected value='noidung'>Quản lý nội dung</option>
            <option value="taikhoan">Quản lý tài khoản</option>
          </select>
        </div>
    </div>

  </div>
@stop
@section('head.button')
  Tạo tài khoản
@stop


