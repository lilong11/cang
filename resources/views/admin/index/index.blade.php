@extends('../admin/index')
@section('content')
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="">TELITELIA-Management System</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>

        <ul class="layui-nav right" lay-filter="">
            <li class="layui-nav-item">
                <a href="javascript:;">admin</a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a href="/admin/exit">exit</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item to-index"><a href="/">HOME</a></li>
        </ul>

    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
    <!-- 左侧菜单开始 -->
    <div class="left-nav">
        <div id="side-nav">
            <ul id="nav">
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe6b8;</i>
                        <cite>List</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a _href="user">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>Reload Admin</cite>
                            </a>
                        </li >
{{--                        <li>--}}
{{--                            <a _href="Create_Load">--}}
{{--                                <i class="iconfont">&#xe6a7;</i>--}}
{{--                                <cite>Create Load</cite>--}}
{{--                            </a>--}}
{{--                        </li >--}}
                        <li>
                            <a _href="Rolling_Schedule">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>Rolling Schedule</cite>
                            </a>
                        </li >
                        <li>
                            <a _href="Producing_bundle">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>Producing Bundle</cite>
                            </a>
                        </li >
                        <li>
                            <a _href="excel_log">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>excel Import log</cite>
                            </a>
                        </li >
                    </ul>

                </li>




            </ul>
        </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
            <ul class="layui-tab-title">
                <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
            </ul>
            <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                <dl>
                    <dd data-type="this">关闭当前</dd>
                    <dd data-type="other">关闭其它</dd>
                    <dd data-type="all">关闭全部</dd>
                </dl>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    @include('admin.index.welcome')
                    {{--                <iframe src='./welcome.html' frameborder="0" scrolling="yes" class="x-iframe"></iframe>--}}
                </div>
            </div>
            <div id="tab_show"></div>
        </div>
    </div>
    <div class="page-content-bg"></div>
    <!-- 右侧主体结束 -->
    <!-- 中部结束 -->
    <!-- 底部开始 -->
    <div class="footer">
        <div class="copyright" align="center">TELITELIA-Management System</div>
    </div>
    <!-- 底部结束 -->
@endsection