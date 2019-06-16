@extends('layouts.master_nhom')

@section('head.title')
Sửa thông tin truyện
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_suatttruyen.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


@stop
@section('head.content')

<div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><a href="{{route('trangchu')}}">Trang chủ/</a><a href="{{route('trangchunhom')}}"> Nhóm/</a><a href=""> Sửa thông tin truyện/</a><a href="{{route('chitiettruyennhom',['id'=>$truyen->maTruyen])}}"> {{$truyen->tenTruyen}}</a></h5>
            </div>

        </div>
    </div>

    <div class="row root-view">
         
<div class="col-md-2">

    </div>
    <div class="col-md-10 view-comics" style="margin-top: 30px;">
        <form action="{{route('chinhsuatruyen',['id'=>$truyen->maTruyen])}}" method="post" enctype="multipart/form-data">
   @csrf
    <table style="width:80%">
      <tr>
        <td style="width: 25%;">Tên truyện*: </td>
        <td><input type="text" name="tentruyen" value="{{$truyen->tenTruyen}}"></td>
      </tr>
        <tr>
            <td style="width: 25%;">Thể loại truyện*:</td>
            <td>
                <div class="filter-element">
                    <select name="theloai[]" class="select" multiple style="height: 100px">
                        @foreach($theloais as $theloai)
                            <?php
                                $status = False;
                            ?>
                            @foreach($truyen->getTheLoai as $tr_tl)
                                @if($theloai->tenTL == $tr_tl->getTheLoai->tenTL)
                                    <?php
                                        $status = True;
                                        ?>
                                    @break
                                @endif
                            @endforeach
                            @if ($status)
                                    <option selected value="{{$theloai->tenTL}}">{{$theloai->tenTL}}</option>
                            @else
                                    <option value="{{$theloai->tenTL}}">{{$theloai->tenTL}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <p>*Nhấn tổ hợp Ctl+Click để chọn nhiều mục</p>
            </td>
      </tr>
      <tr>
        <td style="width: 25%;">Tác giả*:</td>
        <td><input type="text" name="tacgia" value=" {{$truyen->tacGia}}"></td>
      </tr>
       <tr>
        <td style="width: 25%;">Nguồn/Nhóm dịch*:</td>
        <td>{{$truyen->nhom->tenNhom}}</td>
      </tr>
      <tr>
        <td style="width: 25%;">Chap mới nhất*:</td>
        <td>{{$truyen->soChuong()}}</td>
      </tr>
      <tr>
        <td style="width: 25%;">Tình trạng dịch*:</td>
        <td><select name="trangthai">
                <option disabled selected>Tình trạng truyện</option>
                <option value="dich">Đang dịch</option>
                <option value="dung">Tạm dừng</option>
                <option value="ketthuc">Kết thúc</option>
            </select></td>
      </tr>
       <tr>
        <td style="width: 25%;">Mô tả ngắn:</td>
        <td><textarea style="height: 100px; width: 100%;" name="gioithieu" >{{$truyen->gioiThieu}}</textarea></td>
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
        <button type="submit">Cập nhật</button> <input type="button" onclick="window.location ='{{route('chitiettruyennhom',['id'=>$truyen->maTruyen])}}'" value="Hủy">
      </div>
    </form>


    </div>
    <div class="col-md-1">

    </div>
   

</div>

</div>
@stop
