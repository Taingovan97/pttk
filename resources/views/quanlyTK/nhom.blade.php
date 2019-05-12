@extends('layouts.master_qltk')

@section('noidung')
  <div class="main container" style="min-height: 500px;">
   
  <div class="row">
  <div class="col-md-4">
  <h3>Quản lý nhóm</h3>
  </div>
  <div class="col-md-2">
        <p style="margin:5px 0; text-align: right;">Chọn nhóm :</p>
      </div>
      <div class="col-md-3">
        <div class="find-element" style="width: 100%;">
          <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
          <button type="submit"></button>
        </div>
    </div>
  <div class="col-md-3">
  <button type="button" name="button" style="display: block;width: 80%;background: #00b2bf;padding: 2px 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Thống kê nhóm</button>
  </div>
  
    
  
    <div class="row">
      <div class="col-md-10">

        <div class="row">
          <div class="col-md-6">
            <div class="row search-view-element">
              <div class="col-md-5">
                <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              </div>
              <div class="col-md-7">
                <h5><a href="#">Kanefusa group</a></h5>
                <div class="">
                  <p>Số lượng thành viên: 12</p>
                  <p>Số lượng truyện: 10</p>
                  <p>Ngày thành lập: 12/02/2019</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row search-view-element">
              <div class="col-md-5">
                <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              </div>
              <div class="col-md-7">
                <h5><a href="#">Mèo con</a></h5>
                <div class="">
                  <p>Số lượng thành viên: 12</p>
                  <p>Số lượng truyện: 10</p>
                  <p>Ngày thành lập: 12/02/2019</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row search-view-element">
              <div class="col-md-5">
                <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              </div>
              <div class="col-md-7">
                <h5><a href="#">Pinoy</a></h5>
                <div class="">
                  <p>Số lượng thành viên: 12</p>
                  <p>Số lượng truyện: 10</p>
                  <p>Ngày thành lập: 12/02/2019</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row search-view-element">
              <div class="col-md-5">
                <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              </div>
              <div class="col-md-7">
                <h5><a href="#">Ockyu</a></h5>
                <div class="">
                  <p>Số lượng thành viên: 12</p>
                  <p>Số lượng truyện: 10</p>
                  <p>Ngày thành lập: 12/02/2019</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  <div class="popup-alert" style="display: none;width: 500px;margin: 0 auto;position: fixed;top: 200px;background: #ccc;left: 35%;padding: 20px;border-radius: 10px;text-align: center;">
    <h2>Xóa truyện này ?</h2>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Đồng ý</button>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-cal">Hủy</button>


  </div>
  

@endsection