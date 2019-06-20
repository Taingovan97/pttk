@extends('layouts.master_qltk')

@section('noidung')
	<div class="main container" >
    <h3>Thống kê nhóm</h3>
    <div class="" style="padding: 30px 0;">
      <table border="1px" cellpadding="0px" cellspacing="0px" width="100%" style="text-align: center;">
        <tr>
          <td>Nhóm</td>
          <td>Số lượng thành viên</td>
          <td>Số lượng truyện</td>
          <td>Ngày thành lập</td>
        </tr>
        @foreach($temp as $nhom)
        <tr>
          <td><?php echo $nhom->tenNhom; ?></td>
          <td><?php echo $nhom->getSoLuongThanhVien(); ?></td>
          <td><?php echo $nhom->getSoLuongTruyen(); ?></td>
          <td><?php echo $nhom->ngayLap; ?></td>
        </tr>
        @endforeach
        
        
      </table>
    </div>
  </div>


@endsection