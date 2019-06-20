<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css')}}">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" href="{{asset('images/favicon.png')}}">
    @yield('head.css')
    <title>@yield('head.title')</title>
</head>

<body>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <a href="{{route('index_qlnd')}}" title="Trang chủ"><img src="{{asset('images/logo1.png')}}" alt="Logo"></a>
        </div>
        <div class="col-md-4 find">
          <div class="find-element">
            <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
            <button type="submit" ></button>
          </div>
          <div class="filter-element">
            <select name="mostLike" class="select">
              <option value="tên truyện">Tìm theo tên truyện</option>
              <option value="tác giả">Tìm theo tên tác giả</option>
              <option value="thể loại">Tìm theo thể loại truyện</option>
            </select>
          </div>
          <script>
                    $(document).on("keypress", "input", function(e){
                        var option = $('select').val();
                        if(e.which == 13){
                            var inputVal = $(this).val();
                            window.location = 'quanlyND/timtruyen/'+option + '/' + inputVal;

                        }
                    });
          </script>
        </div>
        
        <div class="col-md-4 user">
        @if (Auth::guard('admin')->user())
          <div class="dropdown " style="float:right;margin-left: 20px;">
            <div class="dropdown-toggle text-danger" data-toggle="dropdown">
              <strong>{{Auth::guard('admin')->user()->name}}</strong>
            </div>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('admin_nd')}}">Thông tin tài khoản</a>
              <a class="dropdown-item" href="{{route('dangxuat_admin')}}">Đăng xuất</a>
            </div>
          </div>
           @if (Auth::guard('admin')->user()->quyen == 'noidung')
          <div class="dropdown " style="float:right;">
            <div class="dropdown-toggle text-danger" data-toggle="dropdown">
              <strong>Thông báo</strong>
            </div>
            <div class="dropdown-menu">
              
              <a class="dropdown-item" href="{{route('xemBC', ['id'=>2])}}">Báo cáo 1</a>
              <a class="dropdown-item" href="{{route('xemBC', ['id'=>1])}}">Báo cáo 2</a>
             
              <a class="dropdown-item" href="{{route('tracuuBC')}}">Xem tất cả</a>
             
            </div>
          </div>
          @endif
        @endif
        </div>
        
      </div>
      <div class="row direct-manager">
        <ul>
          <li style="width: 33.33%;"><a href="{{route('truyennew')}}">Truyện mới</a></li>
          <li style="width: 33.33%;"><a href="{{route('type',['content'=>'Action'])}}">Thể loại</a></li>
          <li style="width: 33.33%;"><a href="{{route('year',['nam'=>2019])}}">Năm</a></li>
        </ul>
      </div>
      <div class="row direct-manager">
        <ul>
          <li><div class="dropdown">
            <div class="dropdown-toggle" data-toggle="dropdown">
              <strong>Quản lý truyện</strong>
            </div>
            <div class="dropdown-menu" style="text-align: center;width: 100%;">
              <a class="dropdown-item text-dark" href="{{route('xetduyet_truyen')}}">Xét duyệt truyện</a>
              <a class="dropdown-item text-dark" href="{{route('xoatruyen')}}">Xóa truyện</a>
              <a class="dropdown-item text-dark" href="{{route('thongke_truyen')}}">Thống kê truyện</a>
            </div>
          </div></li>
          <li><a href="{{route('admin_nd')}}">Quản lý tài khoản cá nhân</a></li>
          <li><a href="{{route('tracuuBC')}}">Quản lý báo cáo</a></li>
        </ul>
      </div>
    </div>
  </header>
  @yield('noidung')
  <footer class="main container" style="background-color: green">
    Copyright © 2019 by ANH_EM_AN_HAI_TEAM
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </footer>
@yield('tool')
</body>

</html>
<style media="screen">
.menu-manager{
  background: #fff;
}
.menu-manager ul{

}
.menu-manager ul li{

}
.menu-manager a{

}

</style>
@yield('style')