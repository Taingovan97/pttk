@extends('layouts.master_qlnd')

@section('head.title')
    {{ $truyen->tenTruyen}}
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_xemchitiettruyen.css')}}">
    <link rel="stylesheet" href="{{asset('css/rate_bar.css')}}">
{{--    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>--}}

@stop
@section('noidung')
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><span><a href="{{route('trangchu')}}">Trang chủ</a></span>/
                    <span>{{$truyen->tenTruyen}}</span></h5>
            </div>

        </div>
    </div>
    @if(session('thongbao'))
        <?php
        echo session('thongbao');
        ?>
    @endif
<div class="row root-view">
    <div class="col-md-7 view-comics">
        <div class="row">
            <div class="col-md-5">
                <img src="{{asset($truyen->linkAnh)}}" alt="{{$truyen->tenTruyen}}" style="width: 100%;border: 2px solid;">
            </div>
            <div class="col-md-7">
                <b>{{$truyen->tenTruyen}}</b>
                <ul>
                    <li><p id="diem">Điểm đánh giá: {{$truyen->diemDG}}</p></li>
                    <li>Tác giả: {{$truyen->tacGia}}</li>
                    <li>Nhóm dịch: <a href="{{route('nhomdich',['id'=>$truyen->nhom->tenNhom])}}">{{$truyen->nhom->toArray()['tenNhom']}}</a></li>
                    <li><span>Chap {{$truyen->soChuong()}}</span><span> | </span> Lượt xem:<span> {{$truyen->luotXem}}</span></li>
                    <li>Thể loại:
                        @foreach($truyen->getTheLoai as $tr_tl)
                            <a href="{{route('theloai',['id'=>$tr_tl->getTheLoai->tenTL])}}">{{$tr_tl->getTheloai->tenTL}}</a>,
                        @endforeach
                    </li>
                    <li>Trạng thái: {{$truyen->trangThaiTruyen()}}</li>
                    <li style="border: 1px solid grey; height: 100px;">Sơ lược nội dung truyện: {{$truyen->gioiThieu}}</li>
                </ul>
            </div>
        </div>
        <div class="">
            <div class="">
                <div class="row" style="border: 1px solid;">
                    <div class="col-md-7">
                        <p>Danh sách chap</p>
                    </div>
                    <div class="col-md-5">
                        <p>Ngày đăng</p>
                    </div>

                </div>
                <div class="row" style="height: 300px; overflow:auto; ">
                    @foreach($truyen->dsChuong as $chuong)
                        <div class="col-md-7">
                            <a href="{{route('read',['idTruyen'=>$truyen->maTruyen, 'idChuong'=>$chuong->maChuong])}}">{{$chuong->tenChuong}}</a>
                        </div>
                        <div class="col-md-5">
                            <p>{{$chuong->thoiGianDaDang()}}</p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">

    </div>

@include('partials.chart_nd', ['chartTruyens' => $chartTruyens])

</div>
@endsection
