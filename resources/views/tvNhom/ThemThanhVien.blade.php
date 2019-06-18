<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/TV_themthanhvien.css')}}">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <title>Thêm thành viên mới</title>
</head>
<body>
@include('partials.header_nhom')

<div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-10">
                <h5><a href="{{route('trangchu')}}">Trang chủ/</a><a href="{{route('trangchunhom')}}"> Nhóm/</a><a href=""> Duyệt thành viên</a></h5>
                <p>Tìm thành viên: </p>
                <div class="find-element" style="width: 25%; margin-left: 10px;"> 
                    <input id="timtv" type="text" name="keyword" placeholder="   Tìm kiếm" value="">
                </div>
                <script>
                    $(document).on("keypress", "input", function(e){
                        var content = $('#timtv').val();
                        if(e.which == 13){
                            window.location = '/nhom/quanlynhom/timtv/'+content;
                        }
                    });
                </script>
            </div>

        </div>
    </div>
    <h6>ABC Team</h6>
    <div class="row root-view" style="padding-left: 30px;">

        <?php
        $nhom =Auth::guard('thanhvien')->user()->getNhom;
        $count = 0;
        ?>

        @foreach($thanhviens as $thanhvien)
            @if ($count%2==0)
                <?php $start_count =$count; ?>
                <div class="col-md-6 view-comics">
            @endif


                    <div class="row" style="margin-top: 20px;">

                        <img class="avatar_list" src="{{asset($thanhvien->avatar)}}" onerror="this.src='{{asset('avatar/no-avatar208.png')}}'" alt="avatar">
                        <div class="col-md-8">

                            <ul>
                                <li><b>Tên tài khoản: {{$thanhvien->name}}</b></li>
                                <li>Ngày tham gia: {{$thanhvien->getNgayThamGia()}}</li>
                                <li>Trạng thái:
                                @if ($thanhvien->maNhom)
                                    {{$thanhvien->getNhom->tenNhom}}
                                @else
                                    Chưa tham gia nhóm
                                @endif
                                </li>
                            </ul>
                            <div class="row" style="margin-top: 20px;">
                                @if (!$thanhvien->maNhom)
                                <button onclick="window.location=('{{route('themthanhvien',['name'=>$thanhvien->name])}}')">Thêm thành viên</button>
                                @endif
                            </div>
                        </div>
                    </div>
            @if (($count== $start_count + 1) or  $slthanhvien ==1 or ( $slthanhvien==3 and $count==2))
                </div>
            @endif
            <?php $count +=1;?>
        @endforeach   

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
