<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/TV_qltruyennhom.css')}}">

    <title>trang mau</title>
</head>
<body>

@include('partials.header')

<div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-10">
                <h5><a href="#">Trang chủ/</a><a href="#"> Nhóm/</a><a href="#"> ABC Team/</a><a href="#"> Danh sách truyện</a></h5>
                <p>Tìm Truyện: </p>
                <div class="find-element" style="width: 25%; margin-left: 10px;"> 
                    <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
                    <button type="submit"></button>
                </div>
            </div>

        </div>
    </div>
    <h6>ABC Team</h6>
<div class="row root-view" style="padding-left: 20px;">
    <?php
    $nhom =Auth::guard('thanhvien')->user()->getNhom;
    $dstruyen = $nhom->getTruyen
    ?>

    <div class="col-md-7 view-comics">
        @foreach($dstruyen as $truyen)
        <div class="row" style="margin-top: 20px;">

            <img src="{{$truyen->linkAnh}}" onerror="this.src='{{asset('images/anh1.png')}}'">
            <div class="col-md-8">
                <b>{{$truyen->tenTruyen}}</b>
                <ul>
                    <li>Đánh giá:<span> {{$truyen->diemDG}}</span></li>
                    <li><span>Chap {{$truyen->soChuong()}}0</span><span> | </span> Lượt xem:<span> {{$truyen->luotXem}}</span></li>
                    <li>Thể loại:
                    @foreach($truyen->getTheLoai as $tr_theloai)
                        {{$tr_theloai->getTheLoai->tenTL}},
                    @endforeach
                    </li>
                    <li>Tình trạng: Đang thực hiện</li>
                    <li>Sơ lược nội dung truyện: {{$truyen->gioiThieu}}</li>
                </ul>
                <div class="row" style="margin-top: 20px;">
                    <button onclick="window.location='{{route("formthemchuongmoi",['maTruyen'=>$truyen->maTruyen])}}'">Thêm chương truyện</button>
                    <button onclick="confirmDelete()">Xóa truyện</button>
                    <script>
                        function confirmDelete(){
                            var name = "{{$truyen->tenTruyen}}"
                            var r = confirm("Xác nhận xóa truyện " + name + ' khỏi danh sách của bạn?');

                            if (r==true){
                                window.location ='{{route("xoatruyennhom",["maTruyen"=>$truyen->maTruyen])}}';

                            }
                        }

                    </script>
                </div>
            </div>
        </div>
        @endforeach
        </div>

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
