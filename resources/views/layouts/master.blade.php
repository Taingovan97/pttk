<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('head.css')
    <title>@yield('head.title')</title>
</head>
<body>


@include('partials.header')


<div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><span>Trang chủ</span>/</h5>
            </div>

        </div>
    </div>
    @yield('head.content')

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
