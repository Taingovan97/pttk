<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset("css/TV_binhluan.css")}}">
    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <title>
        @if(isset($truyen))
            {{$truyen->tenTruyen}}
        @endif
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
	<div class="all">
	<div class="menu">
		<header>
		   <div class="logo"><a href="{{route('trangchu')}}" title="Trang chủ"><img src="{{asset('images/logo1.png')}}" alt="Logo"></a></div>
		   <div class="container">
		       <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
		       <button type="submit"></button>
		   </div>
             <select name="select" class="select">
	            <option selected value><a href="#">Tìm theo tên truyện</a></option>
	            <option value="tác giả"><a href="#">Tìm theo tên tác giả</a></option>
	            <option value="thể loại"><a href="#">Tìm theo thể loại truyện</a></option>
             </select>
                 @if (Auth::guard('thanhvien')->user() or Auth::guard('admin')->user())
                <div class="dropdown">
                    <div id="account"> <strong>xxxx</strong>
                        <nav class="dropdown-list">
                            <a href="{{route('thongtintaikhoan')}}" class="dropdown-link">Thông tin tài khoàn</a>
                            <br>
                            <a href="" class="dropdown-link">Nhóm</a>
                            <br>
                            <a href="{{route('dangxuat')}}" class="dropdown-link">Đăng xuất</a>
                        </nav>
                    </div>
                </div>
                <a id="heart" href="{{route('dstruyenyeuthich')}}" title="Truyện yêu thích">❤</a>
                @else
                <a href="{{route('taoformdangky')}}"><button type="button" name="signup">Đăng ký</button></a>
                <a href="{{route('taoformdangnhap')}}"><button type="button" name="login">Đăng nhập</button></a>
                @endif

        </header>
        <div id="menu_left">
		  <ul>
            <li><a class="active" href="#home">Truyện mới</a></li>
            <li><a href="#">Thể loại</a></li>
            <li><a href="#">Nhóm dịch</a></li>
            <li><a href="#">Tác giả</a></li>
            <li><a href="#">Năm</a></li>
          </ul>
        </div>
        
	</div>
	<div class="main">
			<div class="main_header">
				<b><a href="#">Trang chủ</a><span> / </span><a href="#">Đọc truyện</a><span> / </span><a href="#">Doraemon</a></b>	
      </div>
        <div class="title" id="navbar">
        	<button type="button" class="next"><</button>
        	<select name="select">
                @foreach($truyen->dsChuong as $chuong)
	            <option value="{{$chuong->maChuong}}"><a href="#">{{$chuong->tenChuong}}</a></option>
                @endforeach
             </select>
        	<button type="button" class="next">></button>
        	<button type="button" title="Nhấp vào đây để báo lỗi" class="else">Báo lỗi</button>
        </div>
      <ul class="content">
          @foreach($chuongxem->dsTrangTruyen as $trang)
            <li><img src="{{$trang->link}}" alt="{{$chuongxme->tenChuong}}"></li>
          @endforeach
      </ul>
     
      <h2>Bình luận</h2>
      <hr>
      <ul class="listcomment">
        <li>
      <div class="comment">
        <img src="{{asset('images/comment.png')}}">
        <div class="comment_left">
        <textarea>Thêm bình luận</textarea>
        <footer>
          <button>Hủy</button>
          <button>Đăng</button>
        </footer>
      </div>
      </div>
    </li>
    <li>
      <div class="comment">
        <img src="{{asset('images/comment.png')}}">
        <div class="comment_completed">
        <p>Truyện hay quá</p>
        <p><span><a href="#">Thích</a></span><span><a href="#">Phản hồi</a></span><span>9 giờ trước</span></p>
        
      </div>
      </div>
    </li>
	
	<li>
      <div class="comment">
        <img src="{{asset('images/comment.png')}}">
        <div class="comment_completed">
        <p>Truyện hay quáfgdfg dfdfgdfg dfgdfgdfggg  g dg  dgdgd  gd gdg df  gdgdg dg   gdgdgdg</p>
        <p><span><a href="#">Thích</a></span><span><a href="#">Phản hồi</a></span><span>9 giờ trước</span></p>
        
      </div>
      </div>
    </li>
  </ul>
    </div>
		
	<footer>Copy by X</footer>
</div>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

</body>
</html>
