@extends('layouts.master_qlnd')

@section('noidung')

<div class="location container">
      <div class="row">
        <div class="col-md-7">
          <h5>Thống kê theo Lượt xem</h5>
        </div>
        <div class="col-md-5">
          <ul>
            <span><a href="#">Tất cả</a></span>
            <li><a href="#"><</a></li>
            <li><a href="#">></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <span><a href="#">...</a></span>
          </ul>
        </div>
      </div>

    </div>



  <div class="main container" >
    <div class="" style="padding: 30px 0;">
      <table border="1px" cellpadding="0px" cellspacing="0px" width="100%" style="text-align: center;">
        <tr>
          <td>Tên truyện</td>
          <td>Thời gian</td>
          <td>Chap mới nhất</td>
          <td>Lượt xem</td>
        </tr>
        @foreach($truyen as $temp)
        <tr>
          <td><?php echo $temp['tenTruyen']; ?></td>
          <td><?php 
            $temp->time(); 
          ?>
             
          </td>
          <td><?php 
            echo "Chap ".$temp->chuongMoiNhat();

          ?>
          </td>
          <td><?php echo $temp['luotXem'] ?></td>
        </tr>
        @endforeach
        

      </table>
    </div>
  </div>

@endsection