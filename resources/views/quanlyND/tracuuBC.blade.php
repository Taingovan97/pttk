@extends('layouts.master_qlnd')

@section('noidung')

<div class="main container" style="min-height: 500px;">
    
	<div class="row" >
      <div class="col-md-7">
        <h5><span><a style="color: blue;" href="{{route('index_qlnd')}}">Trang chủ</a></span>/<span>Quản lý báo cáo</span>/
      </div>
      <div class="col-md-2">
        <p style="margin:5px 0; text-align: right;">Chọn báo cáo :</p>
      </div>
      <div class="col-md-3">
        <form action="{{route('baocao')}}" method="post">
        {{csrf_field()}}
        <div class="find-element">
          <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
          <button type="submit"></button>
        </div>
        </form>
      </div>
    </div>
    <div class="" style="padding: 30px 0;">
      <table border="1px" cellpadding="0px" cellspacing="0px" width="80%" style="text-align: center;">
        <tr>
          <td>Tiêu đề</td>
          <td>Kiểu</td>
          <td>Ngày gửi</td>
        </tr>
        @foreach($baocao as $temp)
        <tr>
          <td><a href="{{route('xemBC', ['id'=>$temp['maBC']])}}">{{$temp['tieuDe']}}</a></td>
          <td><?php  
            if ($temp['loaiBC']==0) {
              echo "Báo cáo truyện lỗi";
            }
            else
              echo "Báo cáo vi phạm";
          ?>
            
          </td>
          <td><?php echo $temp['ngayGui']; ?></td>
        </tr>
        @endforeach
        
      </table>
    </div>
  </div>
  


@endsection