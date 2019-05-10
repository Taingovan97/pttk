@extends('layouts.master')

@section('head.title')
Truyện tranh online
@endsection
@section('head.css')
    <link rel="stylesheet" href="css/TV_like_share_xoa.css">
@stop
@section('head.content')

<div class="row root-view">
    <ul>
        <li>
            <div class="item">
                <div class="infor">
                    <a href="#"><img src="logo.png"/></a>
                    <a href="#"><h4>Truyện tranh 1</h4></a>
                    <p>Đánh giá:<span> ⭐ ⭐ ⭐ ⭐ ⭐ </span></p>
                    <p><span>Chap 50</span><span> | </span> Lượt xem:<span> 1000</span></p>
                    <p>Tác giả: ABC</p>
                    <p>Nhóm dịch: XYZ</p>
                    <p>Thể loại: Hành động</p>
                    <p>Tình trạng: Đang thực hiện</p>
                    <p>Sơ lược nội dung truyện: aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <nav>
                        <button id="share">Share</button>
                        <button id="delete">Xóa</button>
                    </nav>
                </div>
            </div>
        </li>

        <li>
            <div class="item">
                <div class="infor">
                    <a href="#"><img src="logo.png"/></a>
                    <a href="#"><h4>Truyện tranh 1</h4></a>
                    <p>Đánh giá:<span> ⭐ ⭐ ⭐ ⭐ ⭐ </span></p>
                    <p><span>Chap 50</span><span> | </span> Lượt xem:<span> 1000</span></p>
                    <p>Tác giả: ABC</p>
                    <p>Nhóm dịch: XYZ</p>
                    <p>Thể loại: Hành động</p>
                    <p>Tình trạng: Đang thực hiện</p>
                    <p>Sơ lược nội dung truyện: aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                    <nav>
                        <button id="share2" onclick="window.location='{{route("chiase",['id'=>1])}}'">Share</button>
                        <button id="delete2" onclick="window.location='{{route("xoatruyenyeuthich")}}'">Xóa</button>

{{--                        <form action="{{route('chiase')}}" method="get">--}}
{{--                            <button id="share2" type="submit" >Share</button>--}}
{{--                            --}}{{--                        onclick="window.location='{{route("chiase")}}'"--}}
{{--                            <button id="delete2" type="submit" formaction='{{route("xoatruyenyeuthich")}}'>Xóa</button>--}}
{{--                        </form>
dung form kha thu zi
--}}
                    </nav>
                </div>
            </div>
        </li>

    </ul>
</div>
@stop
