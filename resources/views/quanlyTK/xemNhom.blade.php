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
              <p><?php echo $group->ngayLap; ?></p>
            </div>
          </div>
          <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-del">Xóa</button>
        </div>
      </div>
    </div>
    <div class="" style="margin: 50px auto; ">
      <table border="1px" cellpadding="0px" cellspacing="0px" width="80%" style="text-align: center;">
        <tr>
          <td>Giới thiệu</td>
          <td>Danh sách thành viên</td>
          <td>Danh sách truyện</td>
        </tr>
        <tr>
          <td rowspan="4">Là nhóm dịch rất tâm huyết và vui vẻ, thân thiện và chuyên đảm nhận các bộ truyện hot nhất</td>
          <td>1. thành viên 1</td>
          <td>1. Truyện 1</td>
        </tr>
        <tr>
          <td>1. thành viên 2</td>
          <td>1. Truyện 2</td>
        </tr>
        <tr>
          <td>1. thành viên 3</td>
          <td>1. Truyện 3</td>
        </tr>
        <tr>
          <td>1. thành viên 4</td>
          <td>1. Truyện 4</td>
        </tr>

      </table>

    </div>
  </div>
  <div class="popup-alert" style="display: none;width: 500px;margin: 0 auto;position: fixed;top: 200px;background: #ccc;left: 35%;padding: 20px;border-radius: 10px;text-align: center;">
    <h2>Xác nhận xóa nhóm?</h2>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;">Đồng ý</button>
    <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-cal">Hủy</button>
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