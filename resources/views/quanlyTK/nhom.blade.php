@extends('layouts.master_qltk')

@section('noidung')
  <div class="main container" style="min-height: 500px;">
   
  <div class="row">
  <div class="col-md-4">
  <h3>Quản lý nhóm</h3>
  </div>
  <div class="col-md-2">
        <p style="margin:5px 0; text-align: right;">Chọn nhóm :</p>
      </div>
      <div class="col-md-3">
        <form action="{{route('post_xemNhom')}}" method="post">
        {{ csrf_field() }}
        <div class="find-element" style="width: 70%;">
          <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
          <button type="submit" ></button>
        </div>
        </form>
    </div>
  <div class="col-md-3">
  <a type="button" name="button" style="display: block;width: 70%;background: #00b2bf;padding: 2px 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" href="{{route('thongkeNhom')}}">
  <center>Thống kê nhóm</center>
  </a>
  </div>
  
    
  
    <div class="row">
      <div class="col-md-10">

        <div class="row">
        @if(!empty($temp))  
          @foreach($temp as $nhom)
            <div class="col-md-6">
              <div class="row search-view-element">
                <div class="col-md-5">
                  <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;">
                </div>
                <div class="col-md-7">
                  <h5><a href="{{route('xemNhom', ['id_nhom'=> $nhom['maNhom']])}}"><?php echo $nhom['tenNhom']; ?></a></h5>
                <div class="">
                  <p><?php echo "Số lượng thành viên: ". $nhom['soLuongTV']; ?></p>
                  <p><?php echo "Số lượng truyện: ". $nhom['soLuongTruyen']; ?></p>
                  <p><?php echo "Ngày thành lập: ". $nhom['ngayLap']; ?></p>
                </div>
                </div>
              </div>
            </div>
          @endforeach
        @endif
        </div>

      </div>
    </div>

  </div>
  
  

@endsection