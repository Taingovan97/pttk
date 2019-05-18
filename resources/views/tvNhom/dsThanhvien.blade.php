<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/TV_dsthanhvien.css')}}">

    <title>trang mau</title>
</head>
<body>
@include('partials.header')
<?php
$nhom = Auth::guard('thanhvien')->user()->getNhom;
$thanhviens = $nhom->getThanhVien;
$count = 0;
?>
<div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><a href="{{route('trangchu')}}">Trang chủ/</a><a href="{{route('trangchunhom')}}"> Nhóm/</a><a href=""> DS Thành viên</a></h5>
            </div>

        </div>

    </div>
     <h6>Danh sách thành viên</h6>
    <div class="row root-view">

        <div class="col-md-2">

        </div>
    <div class="col-md-10 view-comics" style="margin-top: 30px;">
                <table style="width:80%">
          <tr>
            <th>Thành viên</th>
            <th>Ngày gia nhập</th>
            <th>Đóng góp</th>
          @if (Auth::guard('thanhvien')->user()->maTK == $nhom->maTruongNhom)
             <th>Xóa</th>
          @endif
          </tr>
            @foreach($thanhviens as $thanhvien)
              <tr>
                <td>{{$thanhvien->name}}</td>
                <td>{{$thanhvien->getNgayThamGia()}}</td>
                <td>Dịch {{$thanhvien->getSoLuongTruyenDang()}} truyện</td>
                  @if (Auth::guard('thanhvien')->user()->maTK == $nhom->maTruongNhom)
                      <td><button id ="{{$count}}"  onclick="confirmDelete('{{$count}}')" style="background-color: red" value="{{$thanhvien->maTK}}">Xóa</button></td>
                      <?php $count +=1?>
                      <script>
                          function confirmDelete(id){
                              var maTK = document.getElementById(id).value;
                              var r = confirm("Xác nhận xóa thành viên " + maTK+ " khỏi danh sách của bạn?");
                              if (r==true){
                                  window.location ='xoatv/'+maTK;
                              }
                          }

                      </script>
                  @endif
              </tr>
            @endforeach


        </table>
        <div class="row">
             @if (Auth::guard('thanhvien')->user()->maTK == $nhom->maTruongNhom)
                 <p><b>Xóa các thành viên đã chọn:</b><button onclick="confirmDelete()" style="width: 100px;">Xóa</button></p>

             @endif
        </div>


    </div>
    <div class="col-md-1">

    </div>


</div>

</div>



<footer class="main container" style="background-color: green">
    Copyright © 2019 by ANH_EM_AN_HAI_TEAM
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</footer>
</body>
</html>
<style media="screen">


</style>
