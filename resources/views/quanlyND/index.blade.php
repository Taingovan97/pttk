@extends('layouts.master_qlnd')

@section('noidung')
<div class="location container">
    <div class="row">
      <div class="col-md-7">
        <h5><span>Trang chủ</span>/</h5>
      </div>
      <div class="col-md-5">
        <ul>
          <span><a href="#">Tất cả</a></span>
          <li><a href="#">
              <</a> </li> <li><a href="#">></a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <span><a href="#">...</a></span>
        </ul>
      </div>
    </div>
  </div>

  <div class="main container">
    <div class="row root-view">
      <div class="col-md-7 view-comics">
        <div class="row">
          <div class="col-md-3 comic-border">
            <div class="comic">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              <h3><a href="read.html">Truyện 1</a></h3>
              <p>Chap 11</p>
            </div>
          </div>
          <div class="col-md-3 comic-border">
            <div class="comic">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              <h3><a href="read.html">Truyện 1</a></h3>
              <p>Chap 11</p>
            </div>
          </div>
          <div class="col-md-3 comic-border">
            <div class="comic">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              <h3><a href="read.html">Truyện 1</a></h3>
              <p>Chap 11</p>
            </div>
          </div>
          <div class="col-md-3 comic-border">
            <div class="comic">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              <h3><a href="read.html">Truyện 1</a></h3>
              <p>Chap 11</p>
            </div>
          </div>
          <div class="col-md-3 comic-border">
            <div class="comic">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              <h3><a href="read.html">Truyện 1</a></h3>
              <p>Chap 11</p>
            </div>
          </div>
          <div class="col-md-3 comic-border">
            <div class="comic">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              <h3><a href="read.html">Truyện 1</a></h3>
              <p>Chap 11</p>
            </div>
          </div>
          <div class="col-md-3 comic-border">
            <div class="comic">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              <h3><a href="read.html">Truyện 1</a></h3>
              <p>Chap 11</p>
            </div>
          </div>
          <div class="col-md-3 comic-border">
            <div class="comic">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              <h3><a href="read.html">Truyện 1</a></h3>
              <p>Chap 11</p>
            </div>
          </div>
          <div class="col-md-3 comic-border">
            <div class="comic">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              <h3><a href="read.html">Truyện 1</a></h3>
              <p>Chap 11</p>
            </div>
          </div>
          <div class="col-md-3 comic-border">
            <div class="comic">
              <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
              <h3><a href="read.html">Truyện 1</a></h3>
              <p>Chap 11</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-1">

      </div>
      <div class="col-md-4 border-charts">
        <h3>Bảng xêp hạng</h3>
        <div class="row" style="border-bottom: 1px solid #d5d72f;">
          <div class="col-md-4 charts select">
            <a href="#">Top ngày</a>
          </div>
          <div class="col-md-4 charts">
            <a href="#">Top tuần</a>
          </div>
          <div class="col-md-4 charts">
            <a href="#">Top tháng</a>
          </div>
        </div>
        <div class="">
          <div class="charts-element">
            <h4>Sự ngây thơ tội lỗi</h4>
            <p><span>Chap 49</span> | <span>Lượt xem: 6987</span></p>
          </div>
          <div class="charts-element">
            <h4>Sự ngây thơ tội lỗi</h4>
            <p><span>Chap 49</span> | <span>Lượt xem: 6987</span></p>
          </div>
          <div class="charts-element">
            <h4>Sự ngây thơ tội lỗi</h4>
            <p><span>Chap 49</span> | <span>Lượt xem: 6987</span></p>
          </div>
          <div class="charts-element">
            <h4>Sự ngây thơ tội lỗi</h4>
            <p><span>Chap 49</span> | <span>Lượt xem: 6987</span></p>
          </div>
          <div class="view-all">
            <a href="#">Xem tất cả</a>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection