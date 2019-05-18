@extends('layouts.master')

@section('head.title')
    Tài khoản cá nhân
@endsection

@section('head.content')

    <div class="row">
        <?php $user = Auth::guard('thanhvien')->user()?>
        <div class="col-md-4">
        <img onerror="this.src='{{asset('images/x.png')}}'" src="{{$user->linkAnh}}" alt="" style="width: 100%;border: 1px solid;">
        <button type="button" name="button" onclick="window.location='{{route("formsuatk",['ten'=>$user->name])}}'"  style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Sửa tài khoản</button>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-3">
                <p>Tên đăng nhập: </p>
            </div>
            <div class="col-md-4">
                <p>{{$user->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Email:</p>
            </div>
            <div class="col-md-4">
                <p>{{$user->email}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Số điện thoại:</p>
            </div>
            <div class="col-md-4">
                @if($user->sdt)
                    <p>{{$user->std}}</p>
                @else
                    <p> Chưa nhập </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Ngày gia nhập:</p>
            </div>
            <div class="col-md-4">
                <p>{{$user->create_at}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Nhóm:</p>
            </div>
            <div class="col-md-4">
                @if($user->nhom)
                    <p>xxx</p>
                    @else
                <p> Không tham gia nhóm</p>
                    @endif
            </div>
        </div>

    </div>
</div>
@endsection