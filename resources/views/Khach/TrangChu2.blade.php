@extends('layouts.master')

@section('head.title')
   99 Comics
@endsection

@section('head.content')

<div class="row root-view">

    <div class="col-md-7 view-comics">
        <div class="row">
            @if(!empty($dstruyen))
                @foreach($dstruyen as $truyen)
                    @if($truyen->chuongMoiNhat()!=0)
                    <div class="col-md-3 comic-border">
                        <div class="comic">
                            <a href="{{asset(route('chitiettruyen',['id'=>$truyen->maTruyen]))}}">
                            <img src="{{$truyen->linkAnh}}" alt="{{$truyen->tenTruyen}}" style="width: 100%;">
                            <h3>
                                    {{$truyen->tenTruyen}}

                            </h3>
                            </a>
                            <a href="{{route('doctruyen',['idTruyen'=>$truyen->maTruyen,'idChuong'=>$truyen->chuongMoiNhat()['maChuong']])}}">
                                <p>{{$truyen->chuongMoiNhat()['tenChuong']}}</p>
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <div class="col-md-1">

    </div>
@include('partials.chart', ['chartTruyens' => $chartTruyens])
</div>
@endsection