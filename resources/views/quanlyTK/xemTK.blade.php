@extends('layouts.master_qltk')

@section('noidung')

<div class="main container">
    <div class="row" >
      <div class="col-md-7">
        <h3 >Quản lý tài khoản / Thông tin tài khoản</h3>
      </div>
      <div class="col-md-2">
        <p style="margin:5px 0; text-align: right;">Chọn tài khoản :</p>
      </div>
      <div class="col-md-3">
        <form action="{{route("hienthi")}}" method="post">
        {{ csrf_field() }}
        <div class="find-element">
          <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
          <button type="submit"></button>
        </div>
      </form>
      </div>
    </div>
    <div class="">
      <h4>Thông tin tài khoản</h4>
      <div class="row">
        <div class="col-md-4">
          <img src="{{asset('images/x.png')}}" alt="" style="width: 100%;border: 1px solid;">
     
        </div>
      <div class="col-md-8">
          <div class="row">
            <div class="col-md-3">
              <p>Tên đăng nhập:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $account->name; ?></p>
            </div>
          </div>
      <div class="row">
            <div class="col-md-3">
              <p>Tình trạng xác thực:</p>
            </div>
            <div class="col-md-4">
              <p><?php 
              if ($account->active == true) 
                echo "Đã xác thực";
              else
                echo "Chưa xác thực";
               ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Email:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $account->email; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Số điện thoại:</p>

            </div>
            <div class="col-md-4">
              @if($account->sdt)
                  <p>{{$account->std}}</p>
              @else
                  <p> Chưa nhập </p>
              @endif
            </div>
          </div>

      <div class="row">
            <div class="col-md-3">
              <p>Giới tính:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $account->gioiTinh; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Mã tài khoản:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $account->maTK; ?></p>
            </div>
          </div>
          <div class="row">
            @if(isset($nhom))
            <div class="col-md-3">
              <p>Tên nhóm:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $nhom; ?></p>
            </div>
            @else
            <div class="col-md-3">
              <p>Quyền:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $account->quyen; ?></p>
            </div>
            @endif
          </div>

        </div>
          
        </div>
      </div>
    </div>
  </div>

@endsection


