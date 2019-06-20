@extends('layouts.master_qltk')

@section('head.title')
    quan ly nhom
@endsection

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
  <buttontype="button" name="button" style="margin: 10px auto; display: block;width: 65%;background: #00b2bf;padding: 4px 10px;border: 1px;font-weight: bold;color: #fff;font-size: 18px;" onclick="window.location='{{route('thongkeNhom')}}'">Thống kê nhóm</button>
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
                  <img onerror="this.src='{{asset('images/x.png')}}'" src="{{asset('$nhom->linkAnh')}}" alt="" style="width: 100%;">
                </div>
                <div class="col-md-7" >
                  <h5><a href="{{route('xemNhom', ['id_nhom'=> $nhom->maNhom])}}"><?php echo $nhom->tenNhom; ?></a></h5>
                
                  <p style="margin-left: 0px;"><?php echo "Số lượng thành viên: ".$nhom->getSoLuongThanhVien();?></p>
                  <p style="margin-left: 0px;"><?php echo "Số lượng truyện: ".$nhom->getSoLuongTruyen(); ?></p>
                  <p style="margin-left: 0px;"><?php echo "Ngày thành lập: ".$nhom->getNgayLap(); ?></p>
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
