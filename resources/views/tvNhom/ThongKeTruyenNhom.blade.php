@extends('layouts.master_nhom')

@section('head.title')
    Truyện tranh online
@endsection
@section('head.css')
    <link rel="stylesheet" href="{{asset('css/TV_like_share_xoa.css')}}">
@stop
@section('head.content')

<div class="main container">
    <div class="navigator">
        <div class="row">
            <div class="col-md-7">
                <h5><a href="{{route('trangchu')}}">Trang chủ/</a><a href="{{route('trangchunhom')}}"> Nhóm/</a><a href="{{route('quanlytruyen')}}"> Quản lý truyện/</a><a href=""> Quản lý truyện</a></h5>
            </div>

        </div>

    </div>
     <h6>Danh sách truyện</h6>
    <div class="row root-view">
         
<div class="col-md-1">

    </div>
    <div class="col-md-10 view-comics" style="margin-top: 30px;">
        <table style="width:100%">
  <tr style="text-align: center;">
    <th>Tên truyện</th>
    <th>Thời gian</th> 
    <th>Chap mới nhất</th>
    <th>Lượt xem</th>
    <th>Đánh giá</th>
  </tr>
    @foreach($dsTruyen as $truyen)
      <tr>
        <td>{{$truyen->tenTruyen}}</td>
        <td>{{$truyen->ngayDang}}</td>
        <td>
            @if (empty($truyen->ChuongMoiNhat()->toArray()))
                Chưa có chap
            @else
                {{$truyen->ChuongMoiNhat()[0]->tenChuong}}
            @endif
        </td>
        <td>{{$truyen->luotXem}}</td>
        <td>{{$truyen->diemDG}}</td>
      </tr>
    @endforeach


</table>

    </div>
    <div class="col-md-1">

    </div>
   

</div>

</div>
@stop



