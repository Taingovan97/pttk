@extends('layouts.master_nhom')

@section('head.title')
    <?php
    $nhom = Auth::guard('thanhvien')->user()->getNhom;
    ?>
    {{$nhom->tenNhom}}
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_dsthanhvien.css')}}">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
@stop
@section('head.content')
    <?php
    $nhom = Auth::guard('thanhvien')->user()->getNhom;
    $thanhviens = $nhom->getThanhVien;
    $count = 0;
    ?>
    <div class="main container">
        <div class="row" style="border-bottom: 1px solid;">
            <div class="col-md-7">
                <h3><a href="{{route('qldexuat')}}">Quản lý đề xuất</a></h3>
            </div>
            <div class="col-md-2">
                <p style="margin:5px 0; text-align: right;">Chọn báo cáo :</p>
            </div>
            <div class="col-md-3">
                <div class="find-element">
                    <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
                    <button type="submit"></button>
                    <script>
                        $(document).on("keypress", "input", function(e){
                            if(e.which == 13){
                                var inputVal = $(this).val();
                                window.location = '/nhom/de_xuat/tracuu/'+inputVal;
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="" style="padding: 30px 0;">
            <table border="1px" cellpadding="0px" cellspacing="0px" width="80%" style="text-align: center;">
                <tr>
                    <td>Tiêu đề</td>
                    <td>Ngày gửi</td>
                    <td>Trạng thái</td>
                </tr>
                @foreach($dexuat as $dx)
                <tr>
                    <td><a href="{{route('xemdexuat',['id'=>$dx->maDX])}}">{{$dx->tieuDe}}</a></td>
                    <td>{{$dx->ngayGui}}</td>
                    <td>
                        @if ($dx->trangThai)
                            Đã xử lý
                            @else
                            Chưa xử lý
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
            <div>
                @if(!isset($find))
                    {{$dexuat->render()}}
                @endif
            </div>
        </div>
    </div>
@endsection

