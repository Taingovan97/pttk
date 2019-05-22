@extends('layouts.master_qlnd')

@section('noidung')
<div class="main container" style="min-height: 500px;">
    <h3 ">Thống kê truyện</h3>
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6">
            <a href="{{route('thongke_theloai')}}" type="button" name="button" style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;"><center>Thống kê theo thể loại</center></a>
          </div>
          <div class="col-md-6">
            <a href="{{route('thongke_nhomdich')}}" type="button" name="button" style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;"><center>Thống kê theo nhóm dịch</center></a>
          </div>
          <div class="col-md-6">
            <a href="{{route('thongke_luotxem')}}" type="button" name="button" style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;"><center>Thống kê theo lượt xem</center></a>
          </div>
          <div class="col-md-6">
            <a href="{{route('thongke_danhgia')}}" type="button" name="button" style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;"><center>Thống kê theo đánh giá</center></a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection