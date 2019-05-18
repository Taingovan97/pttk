<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/TV_dexuat.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Đề xuất truyện</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
	<form action="{{route('guidexuat')}}" method="post">
        {{csrf_field()}}
   <h2>Đề xuất</h2>
    <div style="text-align: center;">
        <h3>Tiêu đề*:</h3>
        <input type="text" name="tieude" placeholder="Tieu de">
    </div>
   <p>Điền nội dung đề xuất vào ô dưới đây*:</p>
   <textarea name="noidung"></textarea>
   <div>
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
    </div>
   <div style="float: right;">
     <button type="submit">Gửi</button><button onclick="window.location='{{route('trangchu')}}'">Hủy</button>
   </div>
  </form>
</body>
</html>