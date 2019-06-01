@extends('layouts.master')

@section('head.title')
    sua tai khoan
@endsection

@section('head.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@stop
@section('head.content')
    <?php $user = Auth::guard('thanhvien')->user()?>

    <div class="row">
    <div class="col-md-4">
        <img id = 'avatar' src="{{asset($user->linkAnh)}}" alt="avatar" onerror="this.src='{{asset('images/x.png')}}'" style="width: 100%;border: 1px solid;">

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
        <form method="post" action="{{route('postsuatk')}}" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="row">
            <div class="col-md-3">
                <p>Tên đăng nhập:</p>
            </div>
            <div class="col-md-4">
                <input type="text" name="tentaikhoan"  value="{{$user->name}}">
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
                <input type="text" name="email"  value="{{$user->email}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Số điện thoại:</p>
            </div>
            <div class="col-md-4">
                <input type="text" name="std"  value="{{$user->std}}" placeholder="so dien thoai">
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
                <p>Nhóm</p>
            </div>
            <div class="col-md-4">
                @if($user->nhom)
                    <p>xxx</p>
                @else
                    <p> Không tham gia nhóm</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Avartar</p>
            </div>
            <div class="col-md-4">
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

        </div>
        <button type="submit" name="save" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;" class="button-del" >Lưu</button>
        <button type="button" name="canle" style="margin: 10px auto;width: 40%;background: #00b2bf;padding: 10px;border: none;font-weight: bold;color: #fff;font-size: 18px;"
                onclick="window.location='{{route("thongtintaikhoan")}}'">Hủy</button>

        <?php // Xử Lý Upload

        // Nếu người dùng click Upload
        if (isset($_POST['save']))
        {
            // Nếu người dùng có chọn file để upload
            if (isset($_FILES['avatar']))
            {
                // Nếu file upload không bị lỗi,
                // Tức là thuộc tính error > 0
                if ($_FILES['avatar']['error'] > 0)
                {
                    echo "<script type='text/javascript'>alert('File bi loi');</script>";
                }
                else{
                    // Upload file
                    move_uploaded_file($_FILES['avatar']['tmp_name'], './images/'.$_FILES['avatar']['name']);
                    echo 'File Uploaded';
                }
            }
            else{
                echo 'Bạn chưa chọn file upload';
            }
        }
        ?>
        </form>
    </div>
    </div>
@endsection