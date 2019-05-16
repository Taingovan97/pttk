@extends('layouts.master_qlnd')

@section('noidung')
<div class="main container" style="min-height: 500px;">
    <h3 ">Thống kê truyện</h3>
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6">
            <button type="button" name="button" style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Thống kê theo thể loại</button>
          </div>
          <div class="col-md-6">
            <button type="button" name="button" style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Thống kê theo nhóm dịch</button>
          </div>
          <div class="col-md-6">
            <button type="button" name="button" style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Thống kê theo lượt xem</button>
          </div>
          <div class="col-md-6">
            <button type="button" name="button" style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Thống kê theo đánh giá</button>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection