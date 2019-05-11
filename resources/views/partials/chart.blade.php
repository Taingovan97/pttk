<div class="col-md-4 border-charts">
    <h3>Bảng xêp hạng</h3>
    <div class="row" style="border-bottom: 1px solid #d5d72f;">
        <div class="col-md-4 charts select">
            <a href="#">Top ngày</a>
        </div>
        <div class="col-md-4 charts">
            <a href="#">Top tuần</a>
        </div>
        <div class="col-md-4 charts">
            <a href="#">Top tháng</a>
        </div>
    </div>
    <div class="">
        @if(isset($chartTruyens))
            @foreach($chartTruyens as $Truyen)
                <div class="charts-element">
                    <h4><a href="{{route('chitiettruyen',['id'=>$Truyen->maTruyen])}}">{{$Truyen->tenTruyen}}</a></h4>
                    <p><span>Số Chương: {{$Truyen->soChuong()}}</span> | <span> Lượt xem: {{$Truyen->luotXem}}</span></p>
                </div>
            @endforeach
        @endif
        <div class="charts-element">
            <h4>Sự ngây thơ tội lỗi</h4>
            <p><span>Chap 49</span> | <span>Lượt xem: 6987</span></p>
        </div>
        <div class="view-all">
            <a href="#">Xem tất cả</a>
        </div>
    </div>
</div>