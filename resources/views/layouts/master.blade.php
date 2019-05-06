<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    @yield('head.css')
    <title>@yield('head.title')</title>
</head>
<body>
@include('partials.header')

<div class="location container">
    <div class="row">
        <div class="col-md-7">
            <h5><span>Trang chủ</span>/</h5>
        </div>
        <div class="col-md-5">
            <ul>
                <span><a href="#">Tất cả</a></span>
                <li><a href="#"><</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <span><a href="#">...</a></span>
                <li><a href="#">></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="main container">
    @yield('head.content')

</div>
<footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</footer>
</body>
</html>
<style media="screen">


</style>