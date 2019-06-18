@extends('layouts.master')

@section('head.title')
    {{ $truyen->tenTruyen}}
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_xemchitiettruyen.css')}}">
    <link rel="stylesheet" href="{{asset('css/rate_bar.css')}}">
{{--    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>--}}

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
                    <li>  
                        <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                      </div>
                        <script>
                            $(document).ready(function () {
                               $('input[name="rate"]').click(function () {
                                   var diem = $('input[name="rate"]:checked').val();
                                   var idTruyen = "{{$truyen->maTruyen}}";
                                       $.get('/danhgia/'+idTruyen+'/'+diem, function (data) {
                                       $('#diem').html(data);
                                   })
                               });
                            });
                        </script>
                  </li>
                    <li>Tác giả: {{$truyen->tacGia}}</li>
                    <li>Nhóm dịch: <a href="{{route('nhomdich',['id'=>$truyen->nhom->tenNhom])}}">{{$truyen->nhom->toArray()['tenNhom']}}</a></li>
                    <li><span>Chap {{$truyen->soChuong()}}</span><span> | </span> Lượt xem:<span> {{$truyen->luotXem}}</span></li>
                    <li>Thể loại:
                        @foreach($truyen->getTheLoai as $tr_tl)
                            <a href="{{route('theloai',['id'=>$tr_tl->getTheLoai->tenTL])}}">{{$tr_tl->getTheloai->tenTL}}</a>,
                        @endforeach
                    </li>
                    <li>Trạng thái: {{$truyen->trangThaiTruyen()}}</li>
                    <li style="border: 1px solid grey; height: 100px;">Sơ lược nội dung truyện: 
                        <div style="word-wrap: break-word;">{{$truyen->gioiThieu}}</div></li>
                </ul>
                <div class="row" style="margin-top: 20px;">
                    <button onclick="window.location = '{{route('themTruyenYeuThich',['id'=>$truyen->maTruyen])}}'">Like</button>
                    <button><a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup" style="color: white; text-decoration: none;">Chia sẻ</a></button>
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
