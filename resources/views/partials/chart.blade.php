<div class="col-md-4 border-charts">
    <h3>Bảng xêp hạng</h3>
    <div class="row" style="border-bottom: 1px solid #d5d72f;">
        <div class="col-md-4 charts select">
           <button value="ngay" onclick="changechart(this)">Top ngày</button>
        </div>
        <div class="col-md-4 charts">
            <button value="tuan" onclick="changechart(this)">Top tuần</button>
        </div>
        <div class="col-md-4 charts">
            <button value="thang" onclick="changechart(this)">Top tháng</button>
        </div>
    </div>
    <div class="" id="contentChart">
        @if(isset($chartTruyens))
            @foreach($chartTruyens as $Truyen)
                <div class="charts-element">
                    <h4><a href="{{route('chitiettruyen',['id'=>$Truyen->maTruyen])}}">{{$Truyen->tenTruyen}}</a></h4>
                    <p><span>Số Chương: {{$Truyen->soChuong()}}</span> | <span> Lượt xem: {{$Truyen->luotXem}}</span></p>
                </div>
            @endforeach
        @endif

    </div>

    <script type="text/javascript">
        function changechart(id){
            var option = $(id).val();
            $.get('chart/'+option, function (data) {
                $('#contentChart').html(data);
            });

        }

    </script>
</div>