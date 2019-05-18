<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/TV_xemttnhom.css">

    <title>trang mau</title>
</head>
<body>
<?php
    $nhom = Auth::guard('thanhvien')->user()->getNhom;
?>
@include('partials.header')

<div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><a href="#">Trang chủ/</a><a href="#"> Nhóm/</a><a href="#"> Thông tin nhóm</a></h5>
            </div>

        </div>
    </div>
    <div class="row root-view">

        <div class="col-md-1">

        </div>
        <div class="col-md-10 view-comics" style="margin-top: 30px;">
            <div class="row">

                <img src="{{asset($nhom->tenNhom)}}" onerror="this.src='{{asset('images/x.png')}}'">
                <div class="col-md-9">
                    <h6>{{$nhom->tenNhom}}</h6>
                    <ul>
                        <li>Trưởng nhóm: {{$nhom->getTruongNhom->name}}</li>
                        <li>Ngày thành lập: {{$nhom->getNgayLap()}}</li>
                        <li>Số lượng thành viên: {{$nhom->getSoLuongThanhVien()}}</li>
                        <li>Số lượng truyện đã dịch: {{$nhom->getSoLuongTruyen()}}</li>
                        <li>Giới thiệu về nhóm: {{$nhom->gioiThieu}}</li>
                    </ul>
                </div>
            </div>

            <div class="row" style="margin-top: 50px;">
                <button onclick="window.location='{{route("thanhviennhom")}}'">Danh sách thành viên</button>
                <button onclick="window.location='{{route("quanlytruyen")}}'">Danh sách truyện</button>
                @if(Auth::guard('thanhvien')->user()->maTK ==$nhom->maTruongNhom)
                    <button onclick="window.location='{{route("suathongtinnhom",['maTK'=>$nhom->maTruongNhom])}}'">Sửa thông tin nhóm</button>
                @endif
            </div>

        </div>
        <div class="col-md-1">

        </div>


    </div>

</div>



<footer class="main container" style="background-color: green">
    Copyright © 2019 by ANH_EM_AN_HAI_TEAM
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</footer>
</body>
</html>
<style media="screen">


</style>
