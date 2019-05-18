@extends('layouts.master_qltk')

@section('noidung')
<div class="main container">
    
	<div class="row">
	<div class="col-md-7">
		<h3 style="margin-bottom: 20px;">Xem tài khoản</h3>
	</div>
	<div class="col-md-2">
        <p style="margin:5px 0; text-align: right;">Chọn tài khoản :</p>
      </div>
      <div class="col-md-3">
        <div class="find-element">
          <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
          <button type="submit"></button>
        </div>
      </div>
	
	</div>
    <div class="">
      <h4>Thông tin tài khoản</h4>
      <div class="row">
        <div class="col-md-4">
          <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;border: 1px solid;">
         
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-3">
              <p>Tên đăng nhập:</p>
            </div>
            <div class="col-md-4">
              <p>Tung_tokyo</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Email:</p>
            </div>
            <div class="col-md-4">
              <p>vtv1@gmail.com</p>
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

        </div>
      </div>
    </div>

  </div>

@endsection 
