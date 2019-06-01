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
{{--        @if(empty(Auth::guard('thanhvien')->user()->truyenYeuThich))--}}

        @foreach(Auth::guard('thanhvien')->user()->truyenYeuThich as $tv_tl)
        <li>

            <div class="item">
                <div class="infor">
                    <a href="{{route('chitiettruyen',['id'=>$tv_tl->getTruyen->maTruyen])}}"><img src="{{$tv_tl->getTruyen->linkAnh}}"/></a>
                    <a href="{{route('chitiettruyen',['id'=>$tv_tl->getTruyen->maTruyen])}}"><h4>{{$tv_tl->getTruyen->tenTruyen}}</h4></a>
                    <p>Đánh giá: <span>
                            @if($tv_tl->getTruyen->diemDG>0)
                                {{$tv_tl->getTruyen->diemDG}} điểm
                            @else
                                Chưa có đánh giá
                            @endif
                             </span>
                    </p>
                    <p><span>Chap: {{$tv_tl->getTruyen->soChuong()}}</span><span> | </span> Lượt xem:<span> {{$tv_tl->getTruyen->luotXem}}</span></p>
                    <p>Tác giả:{{$tv_tl->getTruyen->tacGia}}</p>
                    <p>Nhóm dịch: {{$tv_tl->getTruyen->nhom->tenNhom}}</p>
                    <p>Thể loại:
                        <span>
                            @foreach($tv_tl->getTruyen->getTheLoai as $theloai)
                                {{$tv_tl->getTruyen->getTheLoai->tenTL}}<pre>, </pre>
                             @endforeach
                        </span>
                    </p>
                    <p>Tình trạng: Đang thực hiện</p>
                    <p>Sơ lược nội dung truyện:<span> {{$tv_tl->getTruyen->gioiThieu}}</span></p>
                    <nav>
                        <button id="share" onclick="window.location='{{route("chiase",['id'=>1])}}'">Share</button>
                        <button id="delete" onclick="confirmDelete()">Xóa</button>
                        <script>
                            function confirmDelete(){
                                var name = "{{$tv_tl->getTruyen->tenTruyen}}"
                                var r = confirm("Xác nhận xóa truyện " + name + ' khỏi danh sách của bạn?');

                                if (r==true){
                                    window.location ='{{route("xoatruyenyeuthich",["id"=>$tv_tl->getTruyen->maTruyen])}}';

                                }
                            }

                        </script>
                    </nav>
                </div>
            </div>
{{--            {{$tv_tl->getTruyen->tenTruyen}}--}}
        </li>
        @endforeach
{{--        @endif--}}
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
                    <p>Sơ lược nội dung truyện: giới thiệu truyện</p>
                    <nav>
                        <button id="share2" onclick="window.location='{{route("chiase",['id'=>1])}}'">Share</button>
                        <button id="delete2" onclick="window.location='{{route("xoatruyenyeuthich",['id'=>1])}}'">Xóa</button>

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
