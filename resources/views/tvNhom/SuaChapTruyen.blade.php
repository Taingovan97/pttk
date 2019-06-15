<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/TV_themchuongtruyen.css')}}">

    <title>Thêm chương mới</title>
</head>
<body>

@include('partials.header_nhom')

<div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><a href="{{route('trangchu')}}">Trang chủ/</a><a href="{{route('trangchunhom')}}"> Nhóm/</a><a href="#"> Thêm chương mới</a></h5>
            </div>

        </div>

    </div>
    <h6><a href="{{route('chitiettruyen',['id'=>$truyen->maTruyen])}}">{{$truyen->tenTruyen}}</a>>Sửa chương</h6>
    <div class="row root-view">

        <div class="col-md-2">

        </div>
        <div class="col-md-10 view-comics" style="margin-top: 30px;">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if(session('thongbao'))
                <?php
                echo session('thongbao');
                ?>
            @endif


            <form method="post" action="{{route('suachuongtruyen',['id'=>$chuong->maChuong])}}">
                {{csrf_field()}}
                <table style="width:80%">
                    <tr>
                        <td style="width: 25%;">Hướng dẫn:</td>
                        <td><a href="#"> https://www.w3schools.com/tags/tag_table.asp</a></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">STT Chap*:</td>
                        <td><p>{{$stt}}</p></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Tên Chap*:</td>
                        <td><input type="text" name="tenchuong" value="{{$chuong->tenChuong}}"></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Chọn file tải lên*:</td>
                        <td>
                            <input type="file" name="trang" id="input_trang" style="width: 100px"/>
                            <script>

                                function readURL(input) {

                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        // reader.onload = function(e) {
                                        //     $('#avatar').attr('src', e.target.result);
                                        // }

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }

                                $("#input_trang").change(function() {
                                    readURL(this);
                                });

                            </script>
                            <button>Chọn file</button></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Link ảnh*:</td>
                        <td><textarea style="height: 100px; width: 100%;" placeholder="past link ảnh vào đây" name="linktrang"></textarea></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <i>
                                <p>Lưu ý:</p>
                                <p>- Có thể chọn nhiều file cùng lúc.</p>
                                <p>- Dung lượng file tối đa là 5MB, nên để file dưới 1MB để load nhanh hơn.</p>
                                <p>- Chỉ chấp nhận các định dạng ảnh sau: .jpg, .png, .git, .bmp.</p>
                                <p>- Mỗi link cách nhau bởi dấu ;</p>
                            </i>
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <button type="submit">Lưu chỉnh sửa</button >
                    <input type="button" id="huy" value="Hủy"  onclick="window.location='{{route("quanlytruyen")}}'"></input>
                </div>
            </form>



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
