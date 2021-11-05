<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>report</title>
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
<div style="width: 100%;background-color: #fff;height: 350px;margin-bottom: 20px">
    <div style="width: 1280px;padding:20px;height: 300px;margin: 0 auto;">
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
                        {{$round_bundle}}%
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
                        {{100-$round_bundle}}%
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
                        {{$round_Schedule}}%
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
                        {{100-$round_Schedule}}%
                    @endif
                </td>
            </tr>
            </tbody>
        </table>


    </div>
</div>
<br>
<br>

<div style="width: 100%;background-color: #fff;height: 350px;margin-bottom: 20px">

<div style="width: 1280px;height: 400px;margin: 0 auto;padding-top: 20px;padding: 20px">

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

    </script>
@endif
    @if(Session::has('messages'))
        <div style="width: 100%;height: 100px;">
            <div style="height: 20px;width: 300px;font-size:15px;color: green" class="alert alert-info" > {{Session::get('messages')}}
            </div>
        </div>
    @endif
</body>
</html>