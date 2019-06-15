@extends('layouts.master_dangnhap_dangky')
@section('head.title')
    Cấp lại mật khẩu
@endsection

@section('head.option')
  Mật khẩu mới
@stop

@section('head.route')
  {{route('caplaimatkhau')}}
@stop
@section('head.content')
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="" style="margin: 10px 0;">

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
        <p>Mật khẩu mới:</p>
      </div>
      <div class="col-md-8">
        <input class="input-login" type="password" name="matkhau" value="" placeholder="">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <p>Nhập lại mật khẩu mới:</p>
      </div>
      <div class="col-md-8">
        <input class="input-login" type="password" name="nhaplaimatkhau" value="" placeholder="">
      </div>
    </div>

  </div>
@stop
@section('head.button')
  Xác nhận
@stop

