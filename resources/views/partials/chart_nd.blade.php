<div class="col-md-4 border-charts">
    <h3>Bảng xêp hạng</h3>
    <div class="row" style="border-bottom: 1px solid #d5d72f;">
        <div class="col-md-4 charts select">
           <button value="ngay">Top ngày</button>
        </div>
        <div class="col-md-4 charts">
            <button value="tuan">Top tuần</button>
        </div>
        <div class="col-md-4 charts">
            <button value="thang">Top tháng</button>
        </div>
    </div>
    <div class="" id="contentChart">
        @if(isset($chartTruyens))
            @foreach($chartTruyens as $Truyen)
                <div class="charts-element">
                    <h4><a href="{{route('cttruyen',['id'=>$Truyen->maTruyen])}}">{{$Truyen->tenTruyen}}</a></h4>
                    <p><span>Số Chương: {{$Truyen->soChuong()}}</span> | <span> Lượt xem: {{$Truyen->luotXem}}</span></p>
                </div>
            @endforeach
        @endif

    </div>

    <script type="text/javascript">

        $(document).on("click", "button", function(e){
            var option = $(this).val();
            $.get('chart/'+option, function (data) {
                $('#contentChart').html(data);
            });

        });

    </script>
</div>