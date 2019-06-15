<!DOCTYPE html>
<html>
<head>
    <title>Activation Email - truyenCAM.com</title>
</head>
<body>
<p>
    Chào mừng <b>{{$user['name']}}</b> đã đăng ký thành viên tại truyenO.com. Bạn hãy click vào đường link sau đây để hoàn tất việc đăng ký.<br>
    </br>
    <a href="{{ $user['activation_link']}}">{{ $user['activation_link'] }}</a>
{{--    {{ $user->name }}--}}
</p>
</body>
</html>