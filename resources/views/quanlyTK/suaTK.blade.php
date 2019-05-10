@extends('layouts.master_qltk')

@section('noidung')
	<div class="main container">
    <h4>Quản lý tài khoản cá nhân/Sửa tài khoản cá nhân</h4>
    <div class="">
      <h5>Thông tin tài khoản</h5>
      <div class="row">
        <div class="col-md-4">
          <img src="./images/x.png" alt="" style="width: 100%;border: 1px solid;">
          <button type="button" name="button" style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Đổi avatar</button>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-3">
              <p>Tên đăng nhập:</p>
            </div>
            <div class="col-md-4">
              <input type="text" name="" value="" placeholder="Tung_tokyo">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Mật khẩu cũ:</p>
            </div>
            <div class="col-md-4">
              <input type="password" name="" value="Tung_tokyo" placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Mật khẩu mới:</p>
            </div>
            <div class="col-md-4">
              <input type="password" name="" value="Tung_tokyo" placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Nhập lại:</p>
            </div>
            <div class="col-md-4">
              <input type="password" name="" value="Tung_tokyo" placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Email:</p>
            </div>
            <div class="col-md-4">
              <input type="email" name="" value="Tung_tokyo" placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Số điện thoại:</p>
            </div>
            <div class="col-md-4">
              <input type="text" name="" value="Tung_tokyo" placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Ngày gia nhập:</p>
            </div>
            <div class="col-md-4">
              <p>24/03/2019</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Chức vụ:</p>
            </div>
            <div class="col-md-4">
              <p>Người quản lý nội dung</p>
            </div>
          </div>
          <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-del">Lưu</button>
          <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Hủy</button>
        </div>
      </div>
    </div>
  </div>
  <div class="popup-alert" style="display: none;width: 500px;margin: 0 auto;position: fixed;top: 200px;background: #ccc;left: 35%;padding: 20px;border-radius: 10px;text-align: center;">
    <h2>Xác nhận lưu ?</h2>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Đồng ý</button>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-cal">Hủy</button>
  </div> 



@endsection