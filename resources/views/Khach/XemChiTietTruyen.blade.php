@extends('layouts.master')

@section('head.title')
    {{ $truyen->tenTruyen}}
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_xemchitiettruyen.css')}}">
@stop
@section('head.content')
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><span><a href="{{route('trangchu')}}">Trang chủ</a></span>/
                    <span>{{$truyen->tenTruyen}}</span></h5>
            </div>

        </div>
    </div>
<div class="row root-view">
    <div class="col-md-7 view-comics">
        <div class="row">
            <div class="col-md-5">
                <img src="{{asset($truyen->linkAnh)}}" alt="{{$truyen->tenTruyen}}" style="width: 100%;border: 2px solid;">
            </div>
{{--            <div class="col-md-7">--}}
{{--                <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>--}}
{{--                <p>Đánh giá:{{$truyen->diemDG}}</p>--}}
{{--                <p>Nhóm dịch: {{$truyen->nhom->toArray()['tenNhom']}}</p>--}}
{{--                <div class="author">--}}
{{--                    <p>Tác giả: {{$truyen->tacGia}}</p>--}}

{{--                    <p>Thể loại:--}}
{{--                        @foreach($truyen->theloai as $theloai)--}}
{{--                            <a href="{{route('theloai',['id'=>$theloai->maTL])}}">{{$theloai->tenTL}}</a>--}}
{{--                        @endforeach--}}
{{--                    </p>--}}
{{--                    <p>Trạng thái: đang tiến hành</p>--}}
{{--                    <p>Lượt xem: {{$truyen->luotXem}}</p>--}}
{{--                </div>--}}
{{--                <div class="summary">--}}
{{--                    <p>Tóm tắt:{{$truyen->gioiThieu}}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-md-7">
                <b>{{$truyen->tenTruyen}}</b>
                <ul>
                    <li><p>Đánh giá:{{$truyen->diemDG}}</p></li>
                    <li>Tác giả: {{$truyen->tacGia}}</li>
                    <li>Nhóm dịch: <a href="{{route('nhomdich',['id'=>$truyen->nhom->tenNhom])}}">{{$truyen->nhom->toArray()['tenNhom']}}</a></li>
                    <li><span>Chap {{$truyen->soChuong()}}</span><span> | </span> Lượt xem:<span> {{$truyen->luotXem}}</span></li>
                    <li>Thể loại:
                        @foreach($truyen->getTheLoai as $tr_tl)
                            <a href="{{route('theloai',['id'=>$tr_tl->getTheLoai->tenTL])}}">{{$tr_tl->getTheloai->tenTL}}</a>
                        @endforeach
                    </li>
                    <li>Trạng thái: đang tiến hành</li>
                    <li style="border: 1px solid grey; height: 100px;">Sơ lược nội dung truyện: {{$truyen->gioiThieu}}</li>
                </ul>
                <div class="row" style="margin-top: 20px;">
                    <button>Like</button>
                    <button>Share</button>
                </div>
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
                            <a href="{{route('doctruyen',['idTruyen'=>$truyen->maTruyen, 'idChuong'=>$chuong->maChuong])}}">{{$chuong->tenChuong}}</a>
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

@include('partials.chart', ['chartTruyens' => $chartTruyens])

</div>
@endsection
