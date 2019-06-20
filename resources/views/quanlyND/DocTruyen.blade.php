@extends('layouts.master_qlnd')

@section('head.title')
    {{ $truyen->tenTruyen}}
@endsection
@section('head.css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@stop
@section('noidung')
<div class="main">
			<div class="main_header">
				<b><a href="{{route('trangchu')}}">Trang chủ</a><span>/</span><a href="{{route('cttruyen',['id'=>$truyen->maTruyen])}}">{{$truyen->tenTruyen}}</a><span>/{{$chuongxem->tenChuong}}</span></b>
{{--                    onMouseOver="this.style.color='#00F'" onMouseOut="this.style.color='#000'" style="text-decoration: None"--}}

      </div>
        <div class="title" id="navbar">
        	<button type="button" class="next" onclick="window.location='<?php if($chuongxem->chuongTruoc())
                echo route("doctruyen",['idTruyen'=> $truyen->maTruyen, 'idChuong' =>$chuongxem->chuongTruoc()]);
            else
                echo route("doctruyen",['idTruyen'=> $truyen->maTruyen, 'idChuong' =>$chuongxem->maChuong]);
            ?>'"><</button>

        	<select id="selectChap" onchange="changechap()">
                @foreach($truyen->dsChuong as $chuong)
	            <option  value="{{$chuong->maChuong}}" ><a href="#">{{$chuong->tenChuong}}</a></option>
                @endforeach
             </select>

            <script>
                function changechap(){
                    var maChuong = document.getElementById("selectChap").value;
                    var maTruyen = '{{$truyen->maTruyen}}';
                    // alert(maChuong);
                    // alert(maTruyen);
                    window.location = '/truyen/'+ maTruyen +'/' +maChuong;

                }
            </script>

        	<button type="button" class="next"  onclick="window.location='<?php if($chuongxem->chuongSau())
                echo route("doctruyen",['idTruyen'=> $truyen->maTruyen, 'idChuong' =>$chuongxem->chuongSau()]);
            else
                echo route("doctruyen",['idTruyen'=> $truyen->maTruyen, 'idChuong' =>$chuongxem->maChuong]);
            ?>'">></button>
        </div>
      <ul class="content">
          @foreach($chuongxem->getdsTrangTruyen as $trang)
            <li><img src="{{$trang->link}}" alt="{{$chuongxem->tenChuong}}"></li>
          @endforeach
      </ul>
     
    </div>
@endsection
@section('tool')
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
@endsection