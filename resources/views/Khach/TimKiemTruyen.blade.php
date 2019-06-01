@extends('layouts.master')

@section('head.title')
Truyện tranh online
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_like_share_xoa.css')}}">
@stop
@section('head.content')
    @if (isset($option))
        <div class="navigator">
            <div class="row">
                <div class="col-md-7">
                    <h5><a href="{{route('trangchu')}}">Trang chủ/</a> {{$option}}: {{$content}}</h5>
                </div>

            </div>
        </div>

    @endif

<div class="row root-view">
    <ul>
            @if ($dstruyen)
                @foreach($dstruyen as $tv_tl)
                    <li>

                        <div class="item">
                            <div class="infor">
                                <a href="{{route('chitiettruyen',['id'=>$tv_tl->maTruyen])}}"><img src="{{asset($tv_tl->linkAnh)}}"/></a>
                                <a href="{{route('chitiettruyen',['id'=>$tv_tl->maTruyen])}}"><h4>{{$tv_tl->tenTruyen}}</h4></a>
                                <p>Đánh giá: <span>
                            @if($tv_tl->diemDG>0)
                                            {{$tv_tl->diemDG}} điểm
                                        @else
                                            Chưa có đánh giá
                                        @endif
                             </span>
                                </p>
                                <p><span>Chap: {{$tv_tl->soChuong()}}</span><span> | </span> Lượt xem:<span> {{$tv_tl->luotXem}}</span></p>
                                <p>Tác giả:{{$tv_tl->tacGia}}</p>
                                <p>Nhóm dịch: {{$tv_tl->nhom->tenNhom}}</p>
                                <p>Thể loại:
                                    <span>
                            @foreach($tv_tl->getTheloai as $theloai)
                                            {{$theloai->getTheLoai->tenTL}},
                                        @endforeach
                        </span>
                                </p>
                                <p>Tình trạng:
                                    @if ($tv_tl->trangThai ==0)
                                        Đang thưc hiện
                                    @elseif($tv_tl->trangThai == 1)
                                        Tạm dừng
                                    @else
                                        Hoàn thành
                                    @endif
                                </p>
                                <p>Sơ lược nội dung truyện:<span> {{$tv_tl->gioiThieu}}</span></p>

                            </div>
                        </div>
                        {{--            {{$tv_tl->getTruyen->tenTruyen}}--}}
                    </li>
                @endforeach
            @else
                @if ($content)
                    <div style="padding-left: 20px; ">Không có {{$option}}  {{$content}}</div>
                @endif
            @endif





    </ul>
</div>
@stop
