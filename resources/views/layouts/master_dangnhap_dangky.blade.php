<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('head.title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<style>
    .content{
        width: 500px;
        margin: 20px auto;
        border: 1px solid #cce3f6;
    }
    .content h1{
        background-color: #d6e9f9;
        padding: 5px;
    }
    .form_content{
        padding: 20px;
        /*border: 1px solid;*/
    }
    .form_content button{
        width: 50%;
        background: #25e8e8;
        font-size: 25px;
        border: 1px solid;
        padding: 5px;
        border-radius: 10px;
        margin-left: 25%;
    }
    .form_content .input-login{
        width: 100%;

    }
    .form_content a{
        display: block;
        color: red;
    }
    .title{
        width: 100%;
        background-color: #d6d8db;
        /*padding: 10px;*/
        /*margin: 0px;*/
    }
</style>
<body class="body-form-dangky">
<header>
</header>
<div class="content">
    <h1>@yield('head.option')</h1>
    <div class="form_content">
        {{--  Thong Bao      --}}
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif

        <form action=@yield('head.route') method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="" style="margin: 10px 0;">
                @yield('head.content')
                <button type="submit" name="submit">@yield('head.button')</button>
            </div>
{{--            <div class="" style="clear:both;">--}}

{{--            </div>--}}
        </form>

    </div>
</div>
<footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</footer>
</body>

</html>
