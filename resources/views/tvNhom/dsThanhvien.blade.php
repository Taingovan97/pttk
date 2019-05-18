<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/TV_dsthanhvien.css">

    <title>trang mau</title>
</head>
<body>

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="#" title="Trang chủ"><img src="images/logo1.png" alt="Logo"></a>
            </div>
            <div class="col-md-4 find">
                <div class="find-element">
                    <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
                    <button type="submit"></button>
                </div>
                <div class="filter-element">
                    <select name="mostLike" class="select">
                        <option disabled selected value>Tìm theo tên truyện</option>
                        <option value="tác giả">Tìm theo tên tác giả</option>
                        <option value="thể loại">Tìm theo thể loại truyện</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 user">

                    <div class="dropdown " style="float:right;margin-left: 20px;">
                        <div class="dropdown-toggle text-danger" data-toggle="dropdown">
                            <strong>tentaikhoan</strong>
                        </div>
                        <div class="dropdown-menu">
                            <a class="dropdown-item item" href="#">Thông tin tài khoản</a>
                            <a class="dropdown-item item" href="#">Nhóm</a>
                            <a class="dropdown-item item" href="#"></a>
                            <a class="dropdown-item item" href="">Đăng xuất</a>
                        </div>
                    </div>
                <a href="truyenyeuthich" title="Truyện yêu thích" class="heart">❤</a>

               
            </div>
        </div>
        <div class="row direct">
            <ul>
                <li><a href="">Truyện mới</a></li>
                <li><a href="">Thể loại</a></li>
                <li><a href="">Nhóm dịch</a></li>
                <li><a href="">Tác giả</a></li>
                <li><a href="">Năm</a></li>
            </ul>
        </div>
    </div>
</header>

<div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><a href="#">Trang chủ/</a><a href="#"> Nhóm/</a><a href="#"> DS Thành viên</a></h5>
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
    <th>Chọn</th>
  </tr>
  <tr>
    <td>Nguyễn Văn A</td>
    <td>10/2/2019</td>
    <td>Dịch 2 truyện</td>
    <td><input type="checkbox" name=""></td>
  </tr>
  <tr>
    <td>Lê Mai Đào</td>
    <td>20/2/2019</td>
    <td>Dịch 4 truyện</td>
    <td><input type="checkbox" name=""></td>
  </tr>
  <tr>
    <td>Nguyễn Văn A</td>
    <td>10/2/2019</td>
    <td>Dịch 2 truyện</td>
    <td><input type="checkbox" name=""></td>
  </tr>
  <tr>
    <td>Lê Mai Đào</td>
    <td>20/2/2019</td>
    <td>Dịch 4 truyện</td>
    <td><input type="checkbox" name=""></td>
  </tr>
   <tr>
    <td>Nguyễn Văn A</td>
    <td>10/2/2019</td>
    <td>Dịch 2 truyện</td>
    <td><input type="checkbox" name=""></td>
  </tr>
  <tr>
    <td>Lê Mai Đào</td>
    <td>20/2/2019</td>
    <td>Dịch 4 truyện</td>
    <td><input type="checkbox" name=""></td>
  </tr>
   <tr>
    <td>Nguyễn Văn A</td>
    <td>10/2/2019</td>
    <td>Dịch 2 truyện</td>
    <td><input type="checkbox" name=""></td>
  </tr>
  <tr>
    <td>Lê Mai Đào</td>
    <td>20/2/2019</td>
    <td>Dịch 4 truyện</td>
    <td><input type="checkbox" name=""></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="checkbox" name=""></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="checkbox" name=""></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="checkbox" name=""></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="checkbox" name=""></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="checkbox" name=""></td>
  </tr>
 
</table>
 <div class="row">
    <p><b>Xóa các thành viên đã chọn:</b><button style="width: 100px;">Xóa</button></p>
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
