@extends('layouts.master')

@section('head.title')
    Tài khoản cá nhân
@endsection

@section('head.content')

    <div class="row">
    <div class="col-md-4">
        <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;border: 1px solid;">
        <button type="button" name="button" onclick="window.location='{{route("formsuatk", ['tenTK'=>'xxx'])}}'"  style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Sửa tài khoản</button>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-3">
                <p>Tên đăng nhập:</p>
            </div>
            <div class="col-md-4">
                <p>Tung_tokyo</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Email:</p>
            </div>
            <div class="col-md-4">
                <p>vtv1@gmail.com</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Số điện thoại:</p>
            </div>
            <div class="col-md-4">
                <input type="text" name="" value="Tung_tokyo" placeholder="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Ngày gia nhập:</p>
            </div>
            <div class="col-md-4">
                <p>24/03/2019</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Nhóm:</p>
            </div>
            <div class="col-md-4">
                <p>xxx</p>
            </div>
        </div>

    </div>
</div>
@endsection