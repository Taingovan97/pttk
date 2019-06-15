@extends('layouts.master_nhom')

@section('head.title')
  Quản lý truyện
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_xemchitiettruyenNhom.css')}}">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

@stop
@section('head.content')
    <div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-9">
                <h5><a href="{{route('trangchu')}}">Trang chủ/</a><a href="{{route('trangchunhom')}}"> Nhóm/</a><a href="{{route('quanlytruyen')}}"> Danh sách truyện</a></h5>
                <p style="margin-left: 50px; float: left;">Tìm Truyện: </p>
                <div class="find-element" style="width: 25%; margin-left: 10px;">
                    <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
                    <button type="submit"></button>
                    <script>
                        $(document).on("keypress", "input", function(e){
                            if(e.which == 13){
                                var inputVal = $(this).val();
                                window.location = '/nhom/quan_ly_truyen/timtruyennhom/'+inputVal;
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="right_row">
                <a href="{{route('thongketruyennhom')}}"><button class="else">Thống kê truyện</button></a>
                <a href="{{route('formthemtruyenmoi')}}"><button class="else">Thêm truyện mới</button></a>
            </div>
        </div>

    </div>
    <div class="row root-view">
        <div class="col-md-1">
        </div>
        <div class="col-md-10 view-comics" style="margin-left: 70px;">

            <div class="row" style="margin-top: 20px;">

                <img src="{{asset($truyen->linkAnh)}}">
                <div class="col-md-8">
                    <b>{{$truyen->tenTruyen}}</b>
                    <ul>
                        <li><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>⭐ ⭐ ⭐ ⭐ ⭐</li>
                        <li>Đánh giá:<span> {{$truyen->DiemDG}}</span></li>
                        <li><span>Chap {{$truyen->soChuong()}}</span><span> | </span> Lượt xem:<span> 1000</span></li>
                        <li>Thể loại:
                            @foreach($truyen->getTheLoai as $tr_theloai)
                                {{$tr_theloai->getTheLoai->tenTL}},
                            @endforeach
                        </li>
                        <li>Tình trạng: {{$truyen->trangThaiTruyen()}}     </li>
                        <li style="border: 1px solid grey; height: 120px;">Sơ lược nội dung truyện: {{$truyen->gioiThieu}}</li>
                    </ul>
                    <div class="row">
                        <button>Like</button>
                        <button>Share</button>
                        <button onclick="confirmDelete()">Xóa</button>
                        <script>
                            function confirmDelete(id){
                                // var maTruyen = document.getElementById(id).value;
                                var r = confirm("Xác nhận xóa truyện " +  " khỏi danh sách của nhóm?");
                                if (r==true){
                                    window.location ='nhom/quan_ly_truyen/xoa_truyen='+1;
                                }
                            }

                        </script>
                    </div>
                </div>
            </div>
            <div class="row"><a href="{{route('formchinhsuatruyen',['id'=>$truyen->maTruyen])}}"><button>Sửa thông tin truyện</button></a></div>

            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <li>
                            <p class="left"><b>Danh sách chap</b></p>
                            <p class="right"><b>Ngày đăng</b></p>
                        </li>
                        @foreach($truyen->dsChuong as $chuong)
                        <a href="{{route('doctruyen',['idTruyen'=>$truyen->maTruyen,'idChuong'=>$chuong->maChuong])}}">
                            <li>
                                <p class="left">{{$chuong->tenChuong}}</p>
                                <p class="right">{{$chuong->thoiGianDaDang()}}</p>
                            </li>
                        </a>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-1">
                    <li></li>
                    @foreach($truyen->dsChuong as $chuong)
                    <li><a href="{{route('formsuachuongtruyen',['id'=>$chuong->maChuong])}}">Sửa</a></li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

