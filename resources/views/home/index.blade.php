<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forecasting Scheduling Wizard-index</title>
</head>
<style>
    body{
        background-color: #f0f0f0;
    }
    #fileButton{
        width: 70px;
        height: 40px;
        border-radius: 10px;
        background: #019ca1;
        cursor: pointer;
        border: 0px;
        /* border-radius: 10px; */
        color: #fff;
        margin-top: 15px;
        font-weight: 600;
    }
    #fileShowName{
        width: 220px;
        border-radius: 10px;
        height: 40px;
    }
    #fileButtons{
        width: 70px;
        height: 40px;
        background: #019ca1;
        cursor: pointer;
        border: 0px;
        border-radius: 10px;
        /* border-radius: 10px; */
        color: #fff;
        margin-top: 15px;
        font-weight: 600;
    }
    #fileShowNames{
        width: 220px;
        height: 40px;
        border-radius: 10px;
    }
</style>
<link rel="stylesheet" href="/Xadmin/css/font.css">
<link rel="stylesheet" href="/Xadmin/css/xadmin.css">
<script src="/Xadmin/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/Xadmin/js/xadmin.js"></script>
<script type="text/javascript" src="/Xadmin/js/cookie.js"></script>
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
    <script>
        //注意:下方代码不能删除,使用导航需要引入element模块
        layui.use('element', function(){
            var element = layui.element;
        });
    </script>
</div>
<br>
<div style="width: 100%;background-color: #fff;margin-bottom: 20px">

<form class="layui-form" action="/index/add" method="post" enctype="multipart/form-data" >
    @csrf

    <div style="width: 1280px;border-radius: 10px;height: 200px;margin: 0 auto;">
        <div style="width: 300px;height: 80px;float: left;margin-left: 20px;margin-top: 20px;">
            <p style="font-size: 20px;text-align: center;line-height: 70px;font-weight: 600">Rolling_orders import excel </p>
        </div>
        <div style="width: 300px;height: 80px;float: left;margin-left: 20px;margin-top: 20px;">
            <input type="text" name="photo" value="" placeholder=" &nbsp;click browse select excel" id="fileShowName" readonly="readonly">
            <input type="button" id="fileButton" name="fileButton" class="input" value="browse" onclick="$('#submitFile').click();">
            <input name="photo" value="" id="submitFile" type="file" style="display: none;" onchange="$('#fileShowName').val($(this).val());">
        </div>
        <div style="width: 300px;height: 80px;float: left;margin-left: 20px;margin-top: 20px;">
            <input type="txt" style="border-radius: 10px;width: 240px;padding-left:20px;height: 40px; margin-top: 15px;margin-left: 20px" placeholder="report name" value="" name="report_name">
        </div>
        <div style="width: 300px;height: 80px;float: left;margin-left: 20px;margin-top: 20px;">
            <input type="submit" style="border-radius: 10px;font-weight:600;width: 200px;border:0;font-weight: 600;color:#fff;cursor:pointer;height: 40px;background: #019ca1;margin-top: 15px;margin-left: 20px" value="add">
        </div>

        @if(Session::has('message'))
            <div style="width: 100%;height: 100px">
                <div style="height: 20px;width: 300px;font-size:15px;color: green" class="alert alert-info" > {{Session::get('message')}}
                </div>
                <div style="margin-top: 100px" class="layui-progress layui-progress-big" lay-filter="demo" lay-showPercent="yes">
                    <div class="layui-progress-bar layui-bg-green" lay-percent="{{Session::get('round')}}%"></div>
                </div>
                <br>
                <p>faild:</p>
                <div style="" class="layui-progress layui-progress-big" lay-filter="demo" lay-showPercent="yes">
                    <div class="layui-progress-bar " style="background-color: red" lay-percent="{{100-Session::get('round')}}%"></div>
                </div>
            </div>
        @endif

    </div>
</form>
</div>
<br>
<div style="width: 100%;background-color: #fff;margin-bottom: 20px">
<form class="layui-form" action="/index/producing" method="post" enctype="multipart/form-data" >
    @csrf
    <div style="width: 1280px;height: 400px;margin: 0 auto;">
        <div style="width: 300px;height: 80px;float: left;margin-left: 20px;margin-top: 20px;">
            <p style="font-size: 20px;text-align: center;line-height: 70px;font-weight: 600">Producing Bundles import  </p>
        </div>
        <div style="width: 300px;height: 80px;float: left;margin-left: 20px;margin-top: 20px;">
            <input type="text" name="photo" value="" placeholder=" &nbsp;click browse select excel" id="fileShowNames" readonly="readonly">
            <input type="button" id="fileButton" name="fileButton" class="input" value="browse" onclick="$('#submitFiles').click();">
            <input name="photo" value="" id="submitFiles" type="file" style="display: none;" onchange="$('#fileShowNames').val($(this).val());">
        </div>
        <div style="width: 300px;height: 80px;float: left;margin-left: 20px;margin-top: 20px;">
            <input type="txt" style="border-radius: 10px;width: 240px;padding-left:20px;height: 40px; margin-top: 15px;margin-left: 20px" placeholder="report name" value="" name="report_name">
        </div>
        <div style="width: 300px;height: 80px;float: left;margin-left: 20px;margin-top: 20px;">
            <input type="submit" style="width: 200px;height: 40px;background: #019ca1;border:0;cursor:pointer;font-weight: 600;color:#fff;border-radius: 10px;margin-top: 15px;margin-left: 20px" value="add">
        </div>

        @if(Session::has('messages'))
            <div style="width: 100%;height: 100px;">
                <div style="height: 20px;width: 300px;font-size:15px;color: green" class="alert alert-info" > {{Session::get('messages')}}
                </div>
                <div style="margin-top: 100px" class="layui-progress layui-progress-big" lay-filter="demo" lay-showPercent="yes">
                    <div class="layui-progress-bar layui-bg-green" lay-percent="{{Session::get('rounds')}}%"></div>
                </div>
            </div>
        @endif

        <br>
        <br>
        <br>
        <a href="/index/report" style="padding-left: 100px;border-radius: 10px;padding-right: 100px;padding-top: 20px;padding-bottom:20px;color:#fff;font-weight:600;background: #019ca1;position: relative;top:150px;margin-left: 500px">report</a>
        {{--        <a href="/index/report"><button  style="width: 400px;height: 40px;background: tan;margin-top: 150px;margin-left: 400px"></button> </a>--}}
    </div>
</form>
</div>

</body>
</html>