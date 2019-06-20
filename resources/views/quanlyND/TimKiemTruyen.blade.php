@extends('layouts.master_qlnd')

@section('head.title')
Truyện tranh online
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_like_share_xoa.css')}}">
@stop
@section('noidung')
    @if (isset($option))
        <div class="navigator">
            <div class="row">
                <div class="col-md-7">
                    <h5><a href="{{route('trangchu')}}">Trang chủ/</a> {{$option}}:
                        @if(isset($content))
                            {{$content}}
                        @endif
                    </h5>
                </div>
                @if($option =='Thể loại' or $option =='Năm' or $option == 'Nhóm' )
                <div ><select style="right: 0px; width: 150px; height: 30px; border-radius: 10px" id="select_">
                        <option disabled selected>{{$option}}</option>
                        @foreach($select as $op)
                            <option>{{$op}}</option>
                        @endforeach
                    </select>
                </div>
                    @endif
                <script>
                    $(document).ready(function () {
                        $('#select_').change(function () {
                            var content = $(this).val();
                            var option = "{{$option}}";
                            switch (option) {
                                case 'Thể loại':
                                    window.location = 'quanlyND/theloai/'+content;
                                    break;
                                case 'Năm':
                                    window.location = 'quanlyND/nam/'+content;
                                    break;
                                case 'Nhóm':
                                    window.location = 'quanlyND/timtruyen/tennhom/'+content;
                                    break;

                            }
                        })
                    })
                </script>
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
                                <a href="{{route('cttruyen',['id'=>$tv_tl->maTruyen])}}"><img src="{{asset($tv_tl->linkAnh)}}"/></a>
                                <a href="{{route('cttruyen',['id'=>$tv_tl->maTruyen])}}"><h4>{{$tv_tl->tenTruyen}}</h4></a>
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
                @if (isset($option))
                    @if ($content)
                        <div style="padding-left: 20px; ">Không có {{$option}}  {{$content}}</div>
                    @endif
                @endif

            @endif





    </ul>
    <div style="text-align: center">{{$dstruyen->render()}}</div>
</div>
@stop
