@extends('layouts.master_qltk')

@section('noidung')
<div class="main container" style="min-height:500px;">
    
	<div class="row">
	<div class=col-md-7></div>
	<div class="col-md-2">
        <p style="margin:5px 0; text-align: right;">Chọn tài khoản :</p>
      </div>
      <div class="col-md-3">
        <form action="{{route("xoaTK")}}" method="post">
        {{ csrf_field() }}
        <div class="find-element" >
          <input type="text" name="keyword" placeholder="   Tìm kiếm" value="">
          <button type="submit" ></button>
        </div>
        </form>
      </div>
	
	</div>
    

  </div>

@endsection