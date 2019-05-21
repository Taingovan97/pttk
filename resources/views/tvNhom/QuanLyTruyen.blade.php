@extends('layouts.master_nhom')

@section('head.title')
    <?php
    $nhom = Auth::guard('thanhvien')->user()->getNhom;
    ?>
    {{$nhom->tenNhom}}
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_qltruyennhom.css')}}">
@stop
@section('head.content')
    {{----}}

    <div class="main container">
        <div class="navigator">
            <div class="row">
                <div class="col-md-10">
                    <h5><a href="#">Trang chủ/</a><a href="#"> Nhóm/</a><a href="#"> ABC Team/</a><a href="#"> Danh sách truyện</a></h5>
                    <p>Tìm Truyện: </p>
                    <div class="find-element" style="width: 25%; margin-left: 10px;">
                        <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
                        <button type="submit"></button>
                    </div>
                </div>

            </div>

        </div>
        <h6>ABC Team</h6>
        <div class="row root-view" style="padding-left: 20px;">
            <?php
            $nhom =Auth::guard('thanhvien')->user()->getNhom;
            $count = 0;
            ?>

            @foreach($dstruyen as $truyen)
                @if ($count%2==0)
                    <?php $start_count =$count; ?>
                        <div class="col-md-6 view-comics">
                @endif


                    <div class="row" style="margin-top: 20px;">

                        <img src="{{asset($truyen->linkAnh)}}" onerror="this.src='{{asset('images/anh1.png')}}'">
                        <div class="col-md-8">
                            <b><a href="{{route('chitiettruyen',['id'=>$truyen->maTruyen])}}">{{$truyen->tenTruyen}}</a></b>
                            <ul>
                                <li>Đánh giá:<span> {{$truyen->diemDG}}</span></li>
                                <li><span>Chap {{$truyen->soChuong()}}</span><span> | </span> Lượt xem:<span> {{$truyen->luotXem}}</span></li>
                                <li>Thể loại:

                                    @foreach($truyen->getTheLoai as $tr_theloai)
                                        {{$tr_theloai->getTheLoai->tenTL}},
                                    @endforeach
                                </li>
                                <li>Tình trạng: Đang thực hiện</li>
                                <li>Sơ lược nội dung truyện: {{$truyen->gioiThieu}}</li>
                            </ul>
                            <div class="row" style="margin-top: 20px;">
                                <button onclick="window.location='{{route("formthemchuongmoi",['maTruyen'=>$truyen->maTruyen])}}'">Thêm chương truyện</button>
                                <button onclick="confirmDelete()">Xóa truyện</button>
                                <script>
                                    function confirmDelete(){
                                        var name = "{{$truyen->tenTruyen}}"
                                        var r = confirm("Xác nhận xóa truyện " + name + ' khỏi danh sách của bạn?');

                                        if (r==true){
                                            window.location ='{{route("xoatruyennhom",["maTruyen"=>$truyen->maTruyen])}}';

                                        }
                                    }

                                </script>
                            </div>
                        </div>
                    </div>
                @if (($count== $start_count + 1) or  $sltruyen ==1 or ( $sltruyen==3 and $count==2))
                </div>
                @endif
            <?php $count +=1;?>
            @endforeach

        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                {!! $dstruyen->render() !!}
            </div>
        </div>
    </div>
@endsection



