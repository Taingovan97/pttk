<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/TV_suattnhom.css')}}">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <title>Sưa thông tin nhóm</title>
</head>
<body>

@include('partials.header_nhom')

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
<?php
    $nhom = Auth::guard('thanhvien')->user()->getNhom;
?>
    <div class="col-md-8 view-comics" style="margin-top: 20px;">
<form method="post" action="{{route('postsuathongtinnhom')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <h5 style="margin-bottom: 20px;">Sửa thông tin nhóm</h5>
        @if(session('thongbao'))
        <div class="alert alert-danger">
        <?php
        echo session('thongbao');
        ?>
        </div>
        @endif
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif
        <div class="row">
        <img src="{{$nhom->avatar}}" alt="avatar" id="avatar">
        <div class="col-md-9">
        <ul>
        <li><p>Tên nhóm:</p><input type="text" name='tennhom' value="{{$nhom->tenNhom}}" style="margin-left: 5px"></li>
        <li><p>Trưởng nhóm: </p><input name="truongnhom" type="text" value="{{$nhom->getTruongNhom->name}}" style="margin-left: 5px"></li>
        <li><p>Mô tả:</p><textarea name="gioithieu" rows="4" cols="57" >{{$nhom->gioiThieu}}</textarea></li>
        <li><input type="file" name="avatar" id="input_avatar" style="width: 100px"/></li>
        <script>

                        function readURL(input) {

                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#avatar').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }

                        $("#input_avatar").change(function() {
                            readURL(this);
                        });

                    </script>

    </ul>
        </div>
        </div>
        <div class="row" style="margin-top: 50px;">
            <button type="submit">Lưu thay đổi</button>
            <input type="button" value="Hủy" onclick="window.location='{{route('thongtinnhom')}}'">

        </div>
    <div class="col-md-1">

    </div>
   
</form>

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
