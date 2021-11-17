<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forecasting Scheduling Wizard-report</title>
    <script src="/js/echarts.min.js"></script>
    <link rel="stylesheet" href="/Xadmin/css/font.css">
    <link rel="stylesheet" href="/Xadmin/css/xadmin.css">
    <script src="/Xadmin/lib/layui/layui.js" charset="utf-8"></script>

    <script type="text/javascript" src="/js/jquery.min.js"></script>

    <script type="text/javascript" src="/Xadmin/js/xadmin.js"></script>
    <script type="text/javascript" src="/Xadmin/js/cookie.js"></script>
</head>
<style>
    body{
        background-color: #f0f0f0;
    }
    .a{
        padding-left: 30px;
        background: #009688;
        margin-top: 20px;
        position: relative;
        top:50px;
        padding-right: 30px;
        padding-top: 20px;
        font-weight: 600;
        padding-bottom: 20px;
        border-radius: 10px;
        color: #fff;
    }
</style>
<body>


<div style="" id="nav1">
    <ul class="layui-nav" style="padding-left: 115px" lay-filter="">
        <li class="layui-nav-item">        <img src="/img/logo.jpg" style="width: 200px;height: 50px" alt="">
        </li>
        <li class="layui-nav-item"><a href="/indexs">index</a></li>

        <li class="layui-nav-item"><a href="/index/report">report</a></li>
        <li class="layui-nav-item right" style="float: right;margin-right: 100px">
            <a href="javascript:;">{{session('home_user')}}<span class="layui-nav-more"></span></a>
            <dl class="layui-nav-child layui-anim layui-anim-upbit"> <!-- 二级菜单 -->
                <dd><a href="/admin/exit">exit</a></dd>
            </dl>
        </li>
    </ul>
{{--    <ul class="layui-nav right" lay-filter="">--}}

{{--        <li class="layui-nav-item to-index"><a href="/">HOME</a></li>--}}
{{--        <span class="layui-nav-bar" style="left: 20px; top: 39.8px; width: 0px; opacity: 0;"></span></ul>--}}
    <script>
        //注意:下方代码不能删除,使用导航需要引入element模块
        layui.use('element', function(){
            var element = layui.element;
        });
    </script>
</div>
<br>
<div style="width: 100%;background-color: #fff;margin-bottom: 20px">
    <div style="width: 1280px;padding:20px; margin: 0 auto;">

        <div class="x-nav">
        <span class="layui-breadcrumb" style="visibility: visible;">
          <a href="/indexs">get back</a><span lay-separator="">/</span>
          <a><cite>report</cite></a>
        </span>
            <span class="layui-breadcrumb" style="visibility: visible;">
        <a>
      </a></span><a>
            </a><a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
                <i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>

        <table class="layui-table" lay-even="" lay-skin="row">
            <colgroup>
                <col width="150">
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>Submission</th>
                <th>Success</th>
                <th>%</th>
                <th>Faild</th>
                <th>%</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Producing_bundle</td>
                <td>{{$Producing_bundle}}</td>
                <td>
                    @if(empty($round_bundle))
                        0
                    @else
                        {{100-$round_bundle}}%
                    @endif
                </td>
                <td>
                    @if(empty($data_bundle_log))
                        0
                    @else
                        {{$data_bundle_log}}
                    @endif
                </td>
                <td>

                        @if(empty($round_bundle))
                            0
                        @else
                            {{$round_bundle}}%
                        @endif
                </td>
            </tr>
            <tr>
                <td>Rolling Order</td>
                <td>
                    @if(empty($Rolling_schedule))
                        0
                    @else
                        {{$Rolling_schedule}}
                    @endif
                </td>
                <td>

                        @if(empty($round_Schedule))
                            0
                        @else
                            {{100-$round_Schedule}}%
                        @endif
                </td>
                <td>
                    @if(empty($data_Schedule_log))
                        0
                    @else
                        {{$data_Schedule_log}}
                    @endif
                </td>
                <td>
                    @if(empty($round_Schedule))
                        0
                    @else
                        {{$round_Schedule}}%
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
{{--        <p>success:</p>--}}
{{--        <div style="" class="layui-progress layui-progress-big" lay-filter="demo" lay-showPercent="yes">--}}
{{--            <div class="layui-progress-bar layui-bg-green" lay-percent="{{$round_bundle}}%"></div>--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <p>faild:</p>--}}
{{--        <div style="" class="layui-progress layui-progress-big" lay-filter="demo" lay-showPercent="yes">--}}
{{--            <div class="layui-progress-bar " style="background-color: red" lay-percent="{{100-$round_bundle}}%"></div>--}}
{{--        </div>--}}
{{--        <br>--}}
        <h1>Date report</h1>
    <div style="height: 200px;width: 600px;overflow-y: auto;">
        <table class="layui-table" lay-even=""   lay-skin="row" style="">
            <colgroup>
                <col width="150">
                <col width="150">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>Date</th>
                <th>Run Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($date_list as $k=>$v)
                <tr>
                    <td>{{$v}}</td>
                    <td>{{$k}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>


    </div>

    </div>


</div>
<br>
<br>

<div style="width: 100%;background-color: #fff;height: 350px;margin-bottom: 20px">

<div style="width: 1280px;height: 400px;margin: 0 auto;padding-top: 20px;padding: 20px">
    <h1>report</h1>
<br>
<form action="/index/search"  method="get">
    @csrf
    <input type="hidden" name="sum" value="1">
    <input type="text" placeholder="Producing bundle" class="layui-input" style="width: 300px" name="report_name">
    <input type="submit" class="layui-btn" style="margin-top: -57px;margin-left: 310px" value="search export">
</form>

    <form action="/index/search"  method="get">
        @csrf
        <input type="hidden" name="sum" value="2">
        <input type="text" placeholder="Rolling Order" class="layui-input" style="width: 300px" name="report_name">
        <input type="submit" class="layui-btn" style="margin-top: -57px;margin-left: 310px" value="search export">
    </form>
    @if(Session::has('null'))
        <div style="width: 100%;height: 100px;">
            <div style="height: 20px;width: 300px;font-size:15px;color: green" class="alert alert-info" > {{Session::get('null')}}
            </div>
        </div>
    @endif    @if(Session::has('report_name_messages'))
        <div style="width: 100%;height: 100px;">
            <div style="height: 20px;width: 300px;font-size:15px;color: green" class="alert alert-info" > {{Session::get('report_name_messages')}}
            </div>
        </div>
    @endif
    <br>
    <a href="/excel_log_derive" class="a">Exporting failure Logs</a>
    <a href="/excel_log_clearing" onclick="return confirm('Are you sure you want to clear the log?')" class="a" style="background-color: #FF5722">Clearing log</a>
    <a href="/order_clearing" onclick="return confirm('Are you sure you want to clear the order?')" class="a" style="background-color: #FF5722">Clearing order</a>
    <a href="/producing_bundle_clearing" onclick="return confirm('Are you sure you want to clear the bundle clearing?')" class="a" style="background-color: #FF5722">Clearing bundle clearing</a>

</div>
</div>
<br>
@if(!empty($log_data[0]))
    <div style="width: 100%;background-color: #fff;margin-bottom: 20px">

    <div style="width: 1280px;margin: 0 auto;padding-top: 20px;padding: 20px">
    <div class="grid-demo">
        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
        <div id="main" style="width: 100%;height:400px;"></div>
    </div>
    <div class="grid-demo">
        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
        <div id="main2" style="width: 100%;height:400px;"></div>
    </div>

    <div class="grid-demo">
        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
        <div id="main3" style="width: 100%;height:400px;"></div>
    </div>

        <div class="grid-demo">
        <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
        <div id="main6" style="width: 100%;height:400px;"></div>
    </div>


</div>
</div>
    <script>
        var myChart = echarts.init(document.getElementById('main'));
        option = {
            title: {
                text: 'Producing Bundle faild Length'
            },
            xAxis: {
                type: 'category',
                data: [
                    @foreach($BundleLength as $k=> $v)
                    '{{$k}}',
                    @endforeach
                ]
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    data: [
                        @foreach($BundleLength as $v)
                        {{$v}},
                        @endforeach
                    ],
                    type: 'bar'
                }
            ]
        };
        myChart.setOption(option);
        var fruits = [@foreach($BundleWidth_data as $k=> $v)
                    '{{$k}}',
                    @endforeach];
                    // alert(fruits);
        // console.log(fruits.sort());
        // console.log(fruits.reverse());

        var myChart = echarts.init(document.getElementById('main2'));
        option = {
            title: {
                text: 'Producing Bundle faild Width'
            },
            xAxis: {
                type: 'category',
                data: [
                    @foreach($BundleWidth_data as $k=> $v)
                        '{{$k}}',
                    @endforeach
                ]
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    data: [
                        @foreach($BundleWidth_data as $v)
                        {{$v}},
                        @endforeach
                    ],
                    type: 'bar'
                }
            ]
        };
        myChart.setOption(option);
        var myChart = echarts.init(document.getElementById('main3'));
        option = {
            title: {
                text: 'Producing Bundle faild Height'
            },
            xAxis: {
                type: 'category',
                data: [
                    @foreach($BundleHeight_data as $k=> $v)
                        '{{$k}}',
                    @endforeach
                ]
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    data: [
                        @foreach($BundleHeight_data as $v)
                        {{$v}},
                        @endforeach
                    ],
                    type: 'bar'
                }
            ]
        };
        myChart.setOption(option);

        var myChart = echarts.init(document.getElementById('main6'));
        option = {
            title: {
                text: 'Material Description Description of the failure',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left'
            },
            series: [
                {
                    // name: 'Access From',
                    type: 'pie',
                    radius: '50%',
                    data: [
                            @foreach($list as $k=>$v)
                        { value: {{$k}}, name: '{{$v}}' },
                        @endforeach
                    ],

                }
            ]
        };
        myChart.setOption(option);

    </script>
@endif
    @if(Session::has('messages'))
        <div style="width: 100%;height: 100px;">
            <div style="height: 20px;width: 300px;font-size:15px;color: green" class="alert alert-info" > {{Session::get('messages')}}
            </div>
        </div>
    @endif
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
</body>
</html>