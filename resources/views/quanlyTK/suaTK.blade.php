@extends('layouts.master_qltk')

@section('head.title')
    sua tai khoan
@endsection
@section('head.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@stop
@section('noidung')
	<div class="main container">
    <h4>Quản lý tài khoản cá nhân/Sửa tài khoản cá nhân</h4>
    <div class="">
      <h5>Thông tin tài khoản</h5>
      <?php $user = Auth::guard('admin')->user()?>
      <div class="row">
        <div class="col-md-4">

        <img id = 'avatar' src="{{asset($user->linkAnh)}}" alt="avatar" onerror="this.src='{{asset('images/x.png')}}'" style="width: 100%;border: 1px solid;">
        <input type="file" name="avatar" id="input_avatar"/>
                <script>

                    function readURL(input) {

                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#avatar').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $("#input_avatar").change(function() {
                        readURL(this);
                    });

                </script>
    </div>
        

        
        <div class="col-md-8">
          @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
            </div>
        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <form method="post" action="{{route('suaTK_admin')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="row">
            <div class="col-md-3">
              <p>Tên đăng nhập:</p>
            </div>
            <div class="col-md-4">
              <input type="text" name="tentaikhoan" value="{{$user->name}}" >
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Mật khẩu cũ:</p>
            </div>
            <div class="col-md-4">
              <input type="password" name="matkhaucu" >
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Mật khẩu mới:</p>
            </div>
            <div class="col-md-4">
              <input type="password" name="matkhaumoi"  placeholder="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Nhập lại:</p>
            </div>
            <div class="col-md-4">
              <input type="password" name="nhaplaimatkhau" >
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Email:</p>
            </div>
            <div class="col-md-4">
              <input type="email" name="email" value="{{$user->email}}" >
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Số điện thoại:</p>
            </div>
            <div class="col-md-4">
              <input type="text" name="sdt" value="{{$user->sdt}}" placeholder="so dien thoai">
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Ngày gia nhập:</p>
            </div>
            <div class="col-md-4">
              <p>{{$user->create_at}}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p>Chức vụ:</p>
            </div>
            <div class="col-md-4">
              @if($user->quyen == 'noidung')
                <p>Người quản lý nội dung</p>
              @else
                <p>Người quản lý tài khoản</p>
              @endif 
            </div>
          </div>
          <button type="submit" name="save" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-del" >Lưu</button>
          <button type="button" name="button" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" onclick="window.location='{{route('admin_tk')}}'"><center>Hủy</center></button>
        </form>
        </div>      
      </div>
    </div>
  </div>
  
@endsection