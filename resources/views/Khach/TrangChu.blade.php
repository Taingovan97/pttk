@extends('layouts.master')

@section('head.title')
  99 Comics
@endsection
@section('head.css')
  <style>
    .mySlides {display:none;}
    .w3-content{
      margin-left:auto;
      margin-right:auto;

    }
    .w3-display-container:hover .w3-display-hover{display:block}
    .w3-display-container:hover span.w3-display-hover{display:inline-block}
    .w3-display-hover{display:none}
    .w3-button:hover{
      color:#000!important;
      background-color:
              #ccc!important;
    }
    .w3-black,.w3-hover-black:hover{
      color:#fff!important;
      background-color:#000!important;
      margin: 0px 20px 0px 20px;
      width: 40px;
      height: 40px;

    }
    .w3-display-left{
      position:absolute;
      top:380px;
      left:0%;
      transform:translate(0%,-50%);
      -ms-transform:translate(-0%,-50%)
    }
    .w3-display-right{
      position:absolute;
      top:380px;
      right:0%;
      transform:translate(0%,-50%);
      -ms-transform:translate(0%,-50%)

    }
  </style>
@stop
@section('head.content')
<div class="row root-view">
<div class="col-md-8 view-comics">
  <div class="row" style="border: 1px solid;margin: 2px;padding:30px 10px;margin-bottom: 20px; min-height: 400px;">
    <div class="col-md-12" style="border-bottom: 1px solid;margin-bottom: 10px; height: 60px;">
      <h3>TRUYỆN MỚI</h3>
    </div>
    <div class="w3-content w3-display-container" style="margin:10px">
      @foreach($truyenmoi as $truyenm)
        <div class="row" style="padding-left: 30px; width: 100%;" >
          <div class="mySlides" style="width:100%;" >
            <div class="col-md-4">
              <img src="{{asset($truyenm->linkAnh)}}" alt="cover"  class="cover">
            </div>
            <div class="row" style="width: 100%">
            <div class="" style="width: 100%; word-wrap: break-word">
              <h4><a href="{{route('chitiettruyen',['id'=>$truyenm->maTruyen])}}">{{$truyenm->tenTruyen}}</a></h4>
              <div class="" style="border-bottom: 1px solid; width: 100%">
                @foreach($truyenm->getTheLoai as $tr_tl)
                  <a href="{{route('theloai',['id'=>$tr_tl->getTheLoai->tenTL])}}"><button>{{$tr_tl->getTheloai->tenTL}}</button></a>
                @endforeach
              </div>
              <div class="" style="width: 100%">
                <p>{{substr($truyenm->gioiThieu,0, 70)}}</p>
              </div>
            </div>
            </div>
            <div style="width: 100%">
              <button type="button" name="button" style="    margin-left: 30%;    width: 200px;    display: block;    background: red;    border: none;    padding: 5px;    font-weight: bold;"><a href="{{route('chitiettruyen',['id'=>$truyenm->maTruyen])}}" style="color: white">Đọc liền cho máu!!!</a></button>
            </div>
          </div>
        </div>
      @endforeach
      <div class="row">
      <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
      <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
      </div>
    </div>
  </div>


  <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex-1].style.display = "block";
    }
  </script>
  <div class="row" style="border: 1px solid;margin: 2px;padding:30px 10px;">
    <div class="col-md-12">
      <h3>Chap mới</h3>
    </div>
    @foreach($dstruyen as $truyen)
      @if (count($truyen->ChuongMoiNhat()) !=0)
        <div class="row" style="padding-top: 10px; width: 100%;">
{{--          <div class="col-md-3">--}}
            <img src="{{asset($truyen->linkAnh)}}" alt="cover" class="cover">
{{--          </div>--}}
          <div class="col-md-7" >
            <h6><a href="{{route('chitiettruyen',['id'=>$truyen->maTruyen])}}">{{$truyen->tenTruyen}}</a></h6>
            <div class="">
              <p>{{substr($truyen->gioiThieu,0,50)}}</p>
            </div>
            <div>
              <a href="{{asset(route('doctruyen',['idTruyen'=>$truyen->maTruyen, 'idChuong' =>$truyen->ChuongMoiNhat()[0]->maChuong]))}}">{{$truyen->ChuongMoiNhat()[0]->tenChuong}}</a>
            </div>
          </div>
          <div class="col-md-2">
            <p>{{$truyen->ChuongMoiNhat()[0]->thoiGianDaDang()}}</p>
          </div>
        </div>
      @endif
    @endforeach
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        {!! $dstruyen->render() !!}
      </div>
    </div>
  </div>
</div>
@include('partials.chart', ['chartTruyens' => $chartTruyens])
  @if(session('thongbao'))
    <?php echo session('thongbao')?>
  @endif
</div>

@endsection
