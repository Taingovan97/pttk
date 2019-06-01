@extends('layouts.master_nhom')

@section('head.title')
Thêm Truyện mới
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_themtruyen.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@stop
@section('head.content')
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><a href="#">Trang chủ/</a><a href="#"> Nhóm/</a><a href="#"> Thêm truyện</a></h5>
            </div>

        </div>

    </div>
    <h6>Thêm chương truyện</h6>
    <div class="row root-view">

        <div class="col-md-2">

        </div>
        <div class="col-md-10 view-comics" style="margin-top: 30px;">
            <form action="{{route('postthemtruyenmoi')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <table style="width:80%">
                    <tr>
                        <td style="width: 25%;">Tên truyện*:</td>
                        <td><input type="text" name="tentruyen"></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Thể loại truyện*:</td>
                        <td>
                            <div class="filter-element">
                                <select name="theloai[]" class="select" multiple style="height: 100px">
                                    <option disabled selected value>Vui lòng chọn</option>
                                @foreach($theloais as $theloai)
                                    <option value="{{$theloai->tenTL}}">{{$theloai->tenTL}}</option>
                                @endforeach
                                </select>
                            </div>
                            <p>*Nhấn tổ hợp Ctl+Click để chọn nhiều mục</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Tác giả*:</td>
                        <td><input type="text" name="tacgia"></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Tình trạng dịch*:</td>
                        <td><input type="text" name="tinhtrang"></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Mô tả ngắn:</td>
                        <td><textarea name="gioithieu" style="height: 100px; width: 100%;"></textarea></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Hình ảnh*:</td>
                        <td>
                            <div class="col-md-2">
                                <img src="" name="anh" id="avatar" style="clear: both;" >
                                <input type="file" name="avatar" id="input_avatar" style="width: 100px"/>
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
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <button type="submit">Thêm truyện</button >
                    <input type="button" id="huy" value="Hủy"  onclick="window.location='{{route("quanlytruyen")}}'"></input>

                </div>
            </form>



        </div>
        <div class="col-md-7">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if(session('thongbao'))
                <div class="alert alert-danger">
                    {{session('thongbao')}}
                </div>
            @endif
        </div>


    </div>

@endsection

