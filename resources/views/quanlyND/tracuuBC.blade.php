@extends('layouts.master_qlnd')

@section('noidung')

<div class="main container" style="min-height: 500px;">
    
	<div class="row" >
      <div class="col-md-7">
        <h3>Quản lý báo cáo</h3>
      </div>
      <div class="col-md-2">
        <p style="margin:5px 0; text-align: right;">Chọn báo cáo :</p>
      </div>
      <div class="col-md-3">
        <div class="find-element">
          <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
          <button type="submit"></button>
        </div>
      </div>
    </div>
    <div class="" style="padding: 30px 0;">
      <table border="1px" cellpadding="0px" cellspacing="0px" width="80%" style="text-align: center;">
        <tr>
          <td>Tiêu đề</td>
          <td>Kiểu</td>
          <td>Ngày gửi</td>
        </tr>
        <tr>
          <td><a href="#">Aladin [error 1]</a></td>
          <td>Báo cáo truyện lỗi</td>
          <td>02/03/2019</td>
        </tr>
        <tr>
          <td><a href="#">Bomman [violation 1]</a></td>
          <td>Báo cáo vi phạm</td>
          <td>14/02/2019</td>
        </tr>
        <tr>
          <td><a href="#">Aladin [error 1]</a></td>
          <td>Báo cáo truyện lỗi</td>
          <td>02/03/2019</td>
        </tr>
        <tr>
          <td><a href="#">Bomman [violation 1]</a></td>
          <td>Báo cáo vi phạm</td>
          <td>14/02/2019</td>
        </tr>
        <tr>
          <td><a href="#">Aladin [error 1]</a></td>
          <td>Báo cáo truyện lỗi</td>
          <td>02/03/2019</td>
        </tr>
        <tr>
          <td><a href="#">Bomman [violation 1]</a></td>
          <td>Báo cáo vi phạm</td>
          <td>14/02/2019</td>
        </tr>
      </table>
    </div>
  </div>
  


@endsection