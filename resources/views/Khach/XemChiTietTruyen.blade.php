@extends('layouts.master')

@section('head.title')
    {{ $truyen->tenTruyen}}
@endsection

@section('head.content')

<div class="row root-view">
    <div class="col-md-7 view-comics">
        <h4>{{$truyen->tenTruyen}}</h4>
        <div class="row">
            <div class="col-md-5">
                <img src="{{asset($truyen->linkAnh)}}" alt="{{$truyen->tenTruyen}}" style="width: 100%;border: 2px solid;">
            </div>
            <div class="col-md-7">
                <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
                <p>Đánh giá:{{$truyen->diemDG}}</p>
                <p>Nhóm dịch: {{$truyen->nhom->toArray()['tenNhom']}}</p>
                <div class="author">
                    <p>Tác giả: {{$truyen->tacGia}}</p>

{{--                    <p>Thể loại:--}}
{{--                        @foreach($truyen->theloai as $theloai)--}}
{{--                            <a href="{{route('theloai',['id'=>$theloai->maTL])}}">{{$theloai->tenTL}}</a>--}}
{{--                        @endforeach--}}
{{--                    </p>--}}
                    <p>Trạng thái: đang tiến hành</p>
                    <p>Lượt xem: {{$truyen->luotXem}}</p>
                </div>
                <div class="summary">
                    <p>Tóm tắt:{{$truyen->gioiThieu}}</p>
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
                    <div class="col-md-7">
                        <a href="#">Chap 31</a>
                    </div>
                    <div class="col-md-5">
                        <p>2 ngày trước</p>
                    </div>
                    <div class="col-md-7">
                        <a href="#">Chap 31</a>
                    </div>
                    <div class="col-md-5">
                        <p>2 ngày trước</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">

    </div>

@include('partials.chart', ['chartTruyens' => $chartTruyens])

</div>
@endsection
