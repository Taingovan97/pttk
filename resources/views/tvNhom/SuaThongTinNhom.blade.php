<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/TV_suattnhom.css')}}">

    <title>Sưa thông tin nhóm</title>
</head>
<body>

@include('partials.header')

<div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><a href="{{route('trangchu')}}">Trang chủ/</a><a href="{{route('trangchunhom')}}"> Nhóm/</a><a href="{{route('thongtinnhom')}}"> Thông tin nhóm</a></h5>
            </div>

        </div>
    </div>
    <div class="row root-view">
         
<div class="col-md-2">

    </div>

    <div class="col-md-8 view-comics" style="margin-top: 20px;">
        <h5 style="margin-bottom: 20px;">Sửa thông tin nhóm</h5>
        <div class="row">
        <img src="images/anh1.png">
        <div class="col-md-9">
        <h6>ABC Team</h6>
        <ul>
        <li><p>Tên nhóm:</p><textarea rows="1" cols="52" >ABC Team</textarea></li>
        <li><p>Trưởng nhóm: </p><input></li>
        <li><p>Mô tả:</p><textarea rows="4" cols="57"></textarea></li>
    </ul>
        </div>
        </div>

        <div class="row" style="margin-top: 50px;">
            <button>Lưu thay đổi</button>
            <button>Hủy</button>

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
