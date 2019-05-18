<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{route('trangchu')}}" title="Trang chủ"><img src="{{asset('images/logo1.png')}}" alt="Logo"></a>
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


                @if (Auth::guard('thanhvien')->user()){
                    <div class="dropdown " style="float:right;margin-left: 20px;">
                        <div class="dropdown-toggle text-danger" data-toggle="dropdown">
                            <strong>{{Auth::user()->name}}</strong>
                        </div>
                        <div class="dropdown-menu">
                            <a class="dropdown-item item" href="{{route('thongtintaikhoan')}}">Thông tin tài khoản</a>
                            <a class="dropdown-item item" href="{{route('trangchunhom')}}">Nhóm</a>
                            <a class="dropdown-item item" href="{{route('dexuat')}}">Đề xuất</a>
                            <a class="dropdown-item item" href="{{route('dangxuat')}}">Đăng xuất</a>
                        </div>
                    </div>
                <a href="{{route('dstruyenyeuthich')}}" title="Truyện yêu thích" class="heart">❤</a>

                }
                @else{
                    <a href="{{route('taoformdangky')}}"><button type="button" name="signup">Đăng ký</button></a>
                    <a href="{{route('taoformdangnhap')}}"><button type="button" name="login">Đăng nhập</button></a>
                }
                @endif
            </div>
        </div>
        <div class="row direct">
            <ul>
                <li><a href="{{route('truyenmoi')}}">Truyện mới</a></li>
                <li><a href="{{route('theloai')}}">Thể loại</a></li>
                <li><a href="{{route('nhomdich')}}">Nhóm dịch</a></li>
                <li><a href="{{route('tacgia')}}">Tác giả</a></li>
                <li><a href="{{route('nam')}}">Năm</a></li>
            </ul>
        </div>
    </div>
</header>