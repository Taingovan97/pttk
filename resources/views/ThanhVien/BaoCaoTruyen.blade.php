<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/TV_baocao.css')}}">
   
    <title>TRUYỆN TRANH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
	<form >
        {{csrf_field()}}
    <h2>Báo lỗi</h2>
    <h3 style="text-align: center; color: red;">{{$truyen->tenTruyen}}</h3>
    <h3 style="text-align: center">{{$chuong->tenChuong}}</h3>
    <h3>Chọn lý do lỗi:</h3>
   <input type="checkbox" name="chapdie" value="chap die-"><label>Chap truyện die</label>
   <br>
   <input type="checkbox" name="chapnham" value=" chap up nhầm truyện-"><label>Post nhầm chap truyện khác</label>
   <br>
   <input type="checkbox" name="truyenthieuchap" value="{{' truyên '. $truyen->tenTruyen.' thiếu chap '.$chuong->tenChuong.'-'}}"><label>Truyện thiếu chap</label>
   <br>
   <input type="checkbox" name="chapmattrang" value=" chap mất trang-"><label>Bị mất/Thiếu trang</label>
   <br>
   <input type="checkbox" name="chapsaithutu" value=" chap sai thu tự-"><label>Sai tứ tự trang</label>
   <br>
    <input type="checkbox" name="chapvipham" value=" chap vi pham dieu khoan-"><label>chap dang khong dung quy dinh</label>
    <br>
   <input type="checkbox" name="khac" value=" vấn đề khác-"><label>Các vấn đề khác</label>
   <br>
   <p>Ghi chú:</p>
   <textarea name="ghichu" placeholder="Ghi chú vào đây để giúp chúng tôi xử lý nhanh chóng"></textarea>
   <div style="float: right;">
    <button type="submit" formaction="{{route('postbaocaotruyen',['Truyen'=>$truyen->maTruyen,'Chuong'=>$chuong->maChuong])}}" formmethod="post">Gửi</button>
    <button type="submit" formaction="{{route('doctruyen',['idTruyen'=>$truyen->maTruyen,'idChuong'=>$chuong->maChuong])}}">Hủy</button>
   </div>
  </form>
</body>
</html>