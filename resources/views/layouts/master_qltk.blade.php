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
          <a href="{{route('index_qltk')}}" title="Trang chủ"><img src="{{asset('images/logo1.png')}}" alt="Logo"></a>
        </div>
        <div class="col-md-4 find">

        </div>
        <div class="col-md-4 user">
          @if (Auth::guard('admin')->user()){
          <div class="dropdown " style="float:right;margin-left: 20px;">
            <div class="dropdown-toggle text-danger" data-toggle="dropdown">
              <strong>{{Auth::guard('admin')->user()->name}}</strong>
            </div>
            <div class="dropdown-menu">
              <a class="dropdown-item item" href="{{route('admin_tk')}}">Thông tin tài khoản</a>
              <a class="dropdown-item item" href="{{route('dangxuat_admin')}}">Đăng xuất</a>
            </div>
          </div>
          @endif
          
        </div>
      </div>
      <div class="row direct-manager">
        <ul>
          <li><div class="dropdown">
            <div class="dropdown-toggle" data-toggle="dropdown">
              <strong>Quản lý tài khoản</strong>
            </div>
            <div class="dropdown-menu" style="text-align: center;width: 100%;">
              <a class="dropdown-item text-dark" href="{{route('tracuuTK')}}">Tra cứu tài khoản</a>
              <a class="dropdown-item text-dark" href="{{route('tim_xoaTK')}}">Xóa tài khoản</a>
             
            </div>
          </div></li>
          <li><a href="{{route('admin_tk')}}">Quản lý tài khoản cá nhân</a></li>
          <li><a href="{{route('nhom')}}">Quản lý nhóm</a></li>
        </ul>
      </div>
    </div>
  </header>
  <div id="content">
  	@yield('noidung')
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
  .menu-manager {
    background: #fff;
  }

  .menu-manager ul {}

  .menu-manager ul li {}

  .menu-manager a {}
</style>
@yield('style')
