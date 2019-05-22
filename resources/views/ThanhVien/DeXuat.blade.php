<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/TV_dexuat.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Đề xuất truyện</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<div class="content">
    <div class="form_content">
        <a href="{{route('trangchu')}}" style="border: solid dodgerblue; border-radius: 4px;">home</a>
	<form action="{{route('guidexuat')}}" method="post">
        {{csrf_field()}}

        <h2>Đề xuất</h2>
        {{--  Thong Bao      --}}
        @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
        @if(session('thongbao'))
            <script>
                alert("{{session('thongbao')}}");
            </script>
        @endif
        <div style="text-align: center;">
            <h3>Tiêu đề*:</h3>
            <input type="text" name="tieude" placeholder="Tieu de">
        </div>
        <p>Điền nội dung đề xuất vào ô dưới đây*:</p>
        <textarea name="noidung"></textarea>
{{--        <div>--}}
        <p>Chọn nhóm dịch:</p>
        <input type="text" name="tennhom" id="txtpname" size="30" class="tennhom" placeholder="Nhập tên nhóm">
            <script>
                $.get('tennhom', function (data) {
                    window.tennhom = data
                });
                $(document).ready(function () {

                    $('tennhom').autocomplete({
                        source:data,
                        minLength:1
                    });
                });
            </script>
{{--        </div>--}}
        <div style="float: right;">
        <button type="submit">Gửi</button>
        <input type="button"  id="huy" value="Hủy" onclick="window.location='{{route('trangchu')}}'"></input>
        </div>
    </form>
    </div>
</div>
</body>
</html>