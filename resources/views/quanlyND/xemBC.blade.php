@extends('layouts.master_qlnd')

@section('noidung')

<div class="location container">
      <div class="row">
        <div class="col-md-7">
          <h5><span>Trang chủ</span>/<span>Quản lý báo cáo</span>/<span>Xem báo cáo</span>/</h5>
        </div>
        <div class="col-md-5">
          <ul>
            <span><a href="#">Tất cả</a></span>
            <li><a href="#"><</a></li>
            <li><a href="#">></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <span><a href="#">...</a></span>
          </ul>
        </div>
      </div>

    </div>



  <div class="main container" style="min-height: 500px;">
    <h3 style="border-bottom: 1px solid;display: none;">Tra lỗi báo cáo</h3>
    <div class="">
      <h4>Báo lỗi: One punch man [error 1]</h4>
      <p>Người gửi: ayato97</p>
      <p>Ngày gửi: 04/03/2019</p>
      <p>Lý do: Chap truyện die</p>
      <p>Vị trí lỗi: Chap 21</p>
      <textarea name="name" rows="8" cols="80">Ghi chú: Chap die rất nhiều ảnh</textarea>
      <div class="" style="width: 60%;">
        <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Trả lời</button>
        <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-del">Xóa</button>
      </div>

    </div>

  </div>
  <div class="popup-alert" style="display: none;width: 500px;margin: 0 auto;position: fixed;top: 200px;background: #ccc;left: 35%;padding: 20px;border-radius: 10px;text-align: center;">
    <h2>Xóa báo cáo này ?</h2>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Đồng ý</button>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-cal">Hủy</button>


  </div>


@endsection