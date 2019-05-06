@extends('layouts.master_dangnhap_dangky')
@section('head.title')
  Đăng ký thành viên
@stop
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
      <p style="padding: 10px;"><input type="checkbox" name="dongy" value="dongy"> Tôi đã xem và đồng ý các điều khoản</p>
    </div>
  </div>
@stop
@section('head.button')
  Đăng ký
@stop


{{--<!DOCTYPE html>--}}
{{--<html lang="en" dir="ltr">--}}

{{--<head>--}}
{{--<meta charset="utf-8">--}}
{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--<title>Đăng ký thành viên</title>--}}
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">--}}
{{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">--}}
{{--</head>--}}
{{--<style>--}}
{{--  .content{--}}
{{--    width: 500px;--}}
{{--    margin: 20px auto;--}}
{{--    border: 1px solid #cce3f6;--}}
{{--  }--}}
{{--  .content h1{--}}
{{--    background-color: #d6e9f9;--}}
{{--    padding: 5px;--}}
{{--  }--}}
{{--  .form_content{--}}
{{--    padding: 20px;--}}
{{--    /*border: 1px solid;*/--}}
{{--  }--}}
{{--  .form_content button{--}}
{{--    width: 50%;--}}
{{--    background: #25e8e8;--}}
{{--    font-size: 25px;--}}
{{--    border: 1px solid;--}}
{{--    padding: 5px;--}}
{{--    border-radius: 10px;--}}
{{--    margin-left: 25%;--}}
{{--  }--}}
{{--  .form_content .input-login{--}}
{{--    width: 100%;--}}

{{--}--}}
{{--  .form_content a{--}}
{{--    display: block;--}}
{{--    color: red;--}}
{{--}--}}
{{--  .title{--}}
{{--    width: 100%;--}}
{{--    background-color: #d6d8db;--}}
{{--    /*padding: 10px;*/--}}
{{--    /*margin: 0px;*/--}}
{{--  }--}}
{{--</style>--}}
{{--<body class="body-form-dangky">--}}
{{--<header>--}}
{{--</header>--}}
{{--<div class="content">--}}
{{--  <h1>Đăng ký</h1>--}}
{{--  <div class="form_content">--}}
{{--     @if(count($errors)>0)--}}
{{--       <div class="alert alert-danger">--}}
{{--         @foreach($errors->all() as $err)--}}
{{--           {{$err}}<br>--}}
{{--          @endforeach--}}
{{--       </div>--}}
{{--      @endif--}}
{{--      @if(session('thongbao'))--}}
{{--        <div class="alert alert-success">--}}
{{--          {{session('thongbao')}}--}}
{{--        </div>--}}
{{--      @endif--}}
{{--      <form action="postdangky" method="post">--}}
{{--        <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--        <div class="" style="margin: 10px 0;">--}}
{{--          <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--              <p>Tài khoản:</p>--}}
{{--            </div>--}}
{{--            <div class="col-md-8">--}}
{{--              <input class="input-login" type="text" name="tentaikhoan" value="" placeholder="">--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--              <p>Mật khẩu:</p>--}}
{{--            </div>--}}
{{--            <div class="col-md-8">--}}
{{--              <input class="input-login" type="password" name="matkhau" value="" placeholder="">--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--              <p>Nhập lại mật khẩu:</p>--}}
{{--            </div>--}}
{{--            <div class="col-md-8">--}}
{{--              <input class="input-login" type="password" name="nhaplaimatkhau" value="" placeholder="">--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--              <p>Email:</p>--}}
{{--            </div>--}}
{{--            <div class="col-md-8">--}}
{{--              <input class="input-login" type="email" name="email" value="" placeholder="">--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="row">--}}
{{--            <a href="" style="padding: 10px 40px 10px 10px; display: block ; font-weight: bold"  target="_blank">(*)Xem chi tiết điều khoản</a>--}}
{{--            <p style="padding: 10px;"><input type="checkbox" name="dongy" value="dongy"> Tôi đã xem và đồng ý các điều khoản</p>--}}
{{--          </div>--}}
{{--          <button type="submit" name="submit">Đăng ký</button>--}}
{{--        </div>--}}
{{--        <div class="" style="clear:both;">--}}

{{--        </div>--}}
{{--      </form>--}}

{{--  </div>--}}
{{--</div>--}}
{{--<footer>--}}
{{--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>--}}
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>--}}
{{--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>--}}
{{--</footer>--}}
{{--</body>--}}

{{--</html>--}}
