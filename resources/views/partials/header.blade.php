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
                @yield('head.user')
                <a href={{route('taoformdangky')}}><button type="button" name="signup">Đăng ký</button></a>
                <a href={{route('taoformdangnhap')}}><button type="button" name="login">Đăng nhập</button></a>
            </div>
        </div>
        <div class="row direct">
            <ul>
                <li><a href="#">Truyện mới</a></li>
                <li><a href="#">Thể loại</a></li>
                <li><a href="#">Nhóm dịch</a></li>
                <li><a href="#">Tác giả</a></li>
                <li><a href="#">Năm</a></li>
            </ul>
        </div>
    </div>
</header>