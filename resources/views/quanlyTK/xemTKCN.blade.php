@extends('layouts.master_qltk')
@section('head.title')
    Tài khoản cá nhân
@endsection
@section('noidung')
<div class="main container">
    <h3 style="margin-bottom: 20px;">Xem tài khoản</h3>
    <div class="">
      <h4>Thông tin tài khoản</h4>
      <div class="row">
        <?php $user = Auth::guard('admin')->user()?>
        <div class="col-md-4">
          <img onerror="this.src='{{asset('images/x.png')}}'" src="{{$user->avatar}}" alt="" style="width: 100%;border: 1px solid;">
          <button type="button" name="button" onclick="window.location='{{route('suaTK', ['ten'=>$user->name])}}'" style="margin: 10px auto;display: block;width: 80%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" >Sửa tài khoản</button>
        </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-3">
              <p>Tên đăng nhập:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $user->name; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Email:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $user->email; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Số điện thoại:</p>
            </div>
            <div class="col-md-4">
                @if($user->sdt)
                    <p>{{$user->sdt}}</p>
                @else
                    <p> Chưa nhập </p>
                @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Ngày gia nhập:</p>
            </div>
            <div class="col-md-4">
              <p><?php echo $user->create_at; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Chức vụ:</p>
            </div>
            <div class="col-md-4">
              @if($user->quyen == 'noidung')
                    <p><?php echo "Người quản lý nội dung"; ?></p>
                @else
                    <p> <?php echo "Người quản lý tài khoản"; ?></p>
                @endif
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>


@endsection