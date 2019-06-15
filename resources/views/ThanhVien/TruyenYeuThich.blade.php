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
        @if(!empty(Auth::guard('thanhvien')->user()->truyenYeuThich))

        @foreach(Auth::guard('thanhvien')->user()->truyenYeuThich as $tv_tr)
        <li>

            <div class="item">
                <div class="infor">
                    <a href="{{route('chitiettruyen',['id'=>$tv_tr->getTruyen->maTruyen])}}"><img src="{{$tv_tr->getTruyen->linkAnh}}"/></a>
                    <a href="{{route('chitiettruyen',['id'=>$tv_tr->getTruyen->maTruyen])}}"><h4>{{$tv_tr->getTruyen->tenTruyen}}</h4></a>
                    <p>Đánh giá: <span>
                            @if($tv_tr->getTruyen->diemDG>0)
                                {{$tv_tr->getTruyen->diemDG}} điểm
                            @else
                                Chưa có đánh giá
                            @endif
                             </span>
                    </p>
                    <p><span>Chap: {{$tv_tr->getTruyen->soChuong()}}</span><span> | </span> Lượt xem:<span> {{$tv_tr->getTruyen->luotXem}}</span></p>
                    <p>Tác giả:{{$tv_tr->getTruyen->tacGia}}</p>
                    <p>Nhóm dịch: {{$tv_tr->getTruyen->nhom->tenNhom}}</p>
                    <p>Thể loại:
                        <span>
                            @foreach($tv_tr->getTruyen->getTheLoai as $tr_tl)
                                {{$tr_tl->getTheLoai->tenTL}},
                             @endforeach
                        </span>
                    </p>
                    <p>Tình trạng: Đang thực hiện</p>
                    <p>Sơ lược nội dung truyện:<span> {{$tv_tr->getTruyen->gioiThieu}}</span></p>
                    <nav>
                        <button id="share" onclick="window.location='{{route("chiase",['id'=>1])}}'">Share</button>
                        <button id="delete" onclick="confirmDelete()">Xóa</button>
                        <script>
                            function confirmDelete(){
                                var name = "{{$tv_tr->getTruyen->tenTruyen}}"
                                var r = confirm("Xác nhận xóa truyện " + name + ' khỏi danh sách của bạn?');

                                if (r==true){
                                    window.location ='{{route("xoatruyenyeuthich",["id"=>$tv_tr->getTruyen->maTruyen])}}';

                                }
                            }

                        </script>
                    </nav>
                </div>
            </div>
{{--            {{$tv_tl->getTruyen->tenTruyen}}--}}
        </li>
        @endforeach
            @else
            <h4 style="margin:20px;">Bạn không có truyện yêu thích nào sao? :( </h4>
        @endif


    </ul>
</div>
@stop
