@extends('layouts.master_qltk')

@section('noidung')

<div class="main container">
    <h3 style="margin-bottom:50px;">Quản lý nhóm/Thông tin nhóm</h3>
    <div class="">
      <h4></h4>
      <div class="row">
        <div class="col-md-4">
          <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;border: 1px solid;">
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-3">
              <p>Tên nhóm: </p>
            </div>
            <div class="col-md-4">
              <p><?php echo $group->tenNhom; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Ngày thành lập:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $group->getNgayLap(); ?></p>
            </div>
          </div>
          <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-del">Xóa</button>
        </div>
      </div>
    </div>
    <div class="" style="margin: 50px auto; ">
      <table border="1px" cellpadding="0px" cellspacing="0px" width="80%" style="text-align: center;">
        <tr>
          <td>
            Giới thiệu
            
          </td>
          <td >Danh sách thành viên</td>
          <td>Danh sách truyện</td>
        </tr>
        <tr>
          <td rowspan="{{$length+1}}"><?php echo $group->gioiThieu; ?></td>
        </tr>
        @for($i=0; $i< $length; $i++)
          <tr>
            <td>{{$ds_tv[$i]['name']}}</td>
            <td>truyen 1</td>
          </tr>
        @endfor
        

      </table>

    </div>
  </div>
  <div class="popup-alert" style="display: none;width: 500px;margin: 0 auto;position: fixed;top: 200px;background: #ccc;left: 35%;padding: 20px;border-radius: 10px;text-align: center;">
    <h2>Xác nhận xóa nhóm?</h2>
    <a  href="{{route('xoaNhom',['id_nhom'=>$group->maNhom])}}" type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Đồng ý</a>
    <a type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-cal">Hủy</a>
  </div>


@endsection
@section('style')
<script type="text/javascript">
$(function(){
  $(".button-del").click(function(){
    $(".popup-alert").show();
  });
  $(".button-cal").click(function(){
    $(".popup-alert").hide();
  });
});
</script>

@endsection