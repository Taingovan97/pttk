@extends('layouts.master')

@section('head.title')
    Trang chủ
@endsection

@section('head.content')

<div class="row root-view">

    <div class="col-md-7 view-comics">
        <div class="row">

            @if(!empty($dstruyen))
                @foreach($dstruyen as $truyen)
                    <div class="col-md-3 comic-border">
                        <div class="comic">
                            <a href="{{asset(route('chitiettruyen',['id'=>$truyen->maTruyen]))}}">
                            <img src="{{$truyen->linkAnh}}" alt="{{$truyen->tenTruyen}}" style="width: 100%;">
                            <h3>Truyện 1</h3>
                            </a>
                            <a href="{{route('doctruyen',['idTruyen'=>$truyen->maTruyen,'idChuong'=>$truyen->chuongMoiNhat()['tenChuong']])}}">
                                <p>{{$truyen->chuongMoiNhat()['tenChuong']}}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="col-md-1">

    </div>
@include('partials.chart', ['chartTruyens' => $chartTruyens])
</div>
@endsection