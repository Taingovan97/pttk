@extends('layouts.master_nhom')

@section('head.title')
    <?php
    $nhom = Auth::guard('thanhvien')->user()->getNhom;
    ?>
    {{$nhom->tenNhom}}
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_dsthanhvien.css')}}">
@stop
@section('head.content')
    <?php
    $nhom = Auth::guard('thanhvien')->user()->getNhom;
    $thanhviens = $nhom->getThanhVien;
    $count = 0;
    ?>
    <div class="main container">
        <div class="navigator">
            <div class="row">
                <div class="col-md-7">
                    <h5><a href="{{route('trangchu')}}">Trang chủ/</a><a href="{{route('trangchunhom')}}"> Nhóm/</a><a href="{{route('qldexuat')}}">đề xuất</a></h5>
                </div>

            </div>

        </div>

        <div class="row root-view">

            <div class="">
                <h4>Đề xuất: {{$dexuat->tieuDe}}</h4>
                <p>Người gửi: {{$dexuat->nguoiGui->name}}</p>
                <p>Ngày gửi: {{$dexuat->ngayGui}}</p>
                <p>Trạng thái:
                @if ($dexuat->trangThai)
                    Đã xử lý
                    @else
                    Chưa xử lý
                @endif
                </p>
                <textarea name="name" rows="8" cols="80">Nội dung: {{$dexuat->noiDung}}</textarea>
                <div class="" style="width: 60%;">
                    <button type="button" name="button" onclick="xacnhan()" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Xử lý xong</button>
                    <button type="button" name="button" onclick="xoa()" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-del">Xóa</button>
                    <script>
                        function xacnhan() {
                            var madx = '{{$dexuat->maDX}}';
                            window.location = '/nhom/de_xuat/xuli/'+madx;
                        }
                        function xoa() {
                            var madx = '{{$dexuat->maDX}}';
                            window.location = '/xoa/'+madx;

                        }
                    </script>
                </div>

            </div>

        </div>
        <div class="popup-alert" style="display: none;width: 500px;margin: 0 auto;position: fixed;top: 200px;background: #ccc;left: 35%;padding: 20px;border-radius: 10px;text-align: center;">
            <h2>Xóa báo cáo này ?</h2>
            <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Đồng ý</button>
            <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-cal">Hủy</button>


        </div>
    </div>


@endsection