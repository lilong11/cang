@extends('../admin.index')
@section('content')
    <body>
    <div class="x-nav">
      <span class="layui-breadcrumb" style="visibility: visible;">
        <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so layui-form-pane" action="/admin/excel_log_derive" method="get">
        <input type="text" class="layui-input" id="test1" name="date" style="margin-top: -9px;">
        <button class="layui-btn" lay-submit="" lay-filter="sreach">Select date export</button>
        </form>
        </div>


      </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        @if(Session::has('1'))
            <div style="height: 20px;width: 300px;font-size:15px;color: green" class="alert alert-info" > {{Session::get('1')}}
            </div>

        @endif
        <table class="layui-table">
            <thead>
            <tr>
                <th>facility</th>
                <th>finisheddate</th>
                <th>sequencenumber</th>
                <th>ordernumber</th>
                <th>estimatedduration</th>
                <th>materialnumber</th>
                <th>materialdescription</th>
                <th>bundleheight</th>
                <th>bundleweight</th>
                <th>bundlepiececount</th>
                <th>pieceheight</th>
                <th>piecegauge</th>
                <th>reason for failure</th>
                <th>Import Failure time</th>
                <th>Model_table</th>
            </tr></thead>
            <tbody>
            @foreach($data as $v)
                <tr>

                    <td>{{$v->Facility}}</td>
                    <td>{{$v->FinishDate}}</td>
                    <td>{{$v->SequenceNumber}}</td>
                    <td>{{$v->OrderNumber}}</td>
                    <td>{{$v->EstimatedDuration}}</td>
                    <td>{{$v->MaterialNumber}}</td>
                    <td>{{$v->MaterialDescription}}</td>
                    {{--                    <td>{{$v->BundleLengtd}}</td>--}}
                    {{--                    <td>{{$v->BundleWidtd}}</td>--}}
                    <td>{{$v->BundleHeight}}</td>
                    <td>{{$v->BundleWeight}}</td>
                    <td>{{$v->BundlePieceCount}}</td>
                    <td>{{$v->PieceHeight}}</td>
                    <td>{{$v->PieceGauge}}</td>
                    <td>BundleLength+BundleWidth+BundleHeight+BundleWeight > 4000</td>
                    <td>{{$v->created_at}}</td>
                    <td>{{$v->Model_table}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <xblock>
            <a class="layui-btn layui-btn-warm" href="/admin/excel_log_derive"><i class="layui-icon"></i>excel derive</a>
            <a class="layui-btn layui-btn-normal" onclick="return confirm('Are you sure you want to clear the log?')" href="/admin/excel_log/clearing"><i class="layui-icon"></i>clearing log</a>
            <span class="x-right" style="line-height:40px">A total of data：{{ $data->total() }} strip</span>
        </xblock>

        <div class="page">{{ $data->links() }}</div>

    </div>

    </body>
    <script>


        layui.use("laydate", function () {
            var laydate = layui.laydate;
            //常规用法
            laydate.render({
                elem: "#test1",
                // 当前日期 --添加下面这句
                value: new Date(),
                done: function (value, date, endDate) {
                    // console.log(value); //得到日期生成的值，如：2017-08-18
                    // console.log(date); //得到日期时间对象：{year: 2017, month: 8, date: 18, hours: 0, minutes: 0, seconds: 0}
                    // console.log(endDate); //得结束的日期时间对象，开启范围选择（range: true）才会返回。对象成员同上。


                }
            });


        });
    </script>
@endsection