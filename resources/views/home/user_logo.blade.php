<!doctype html>
<html  class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>TELIA- management system</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/Xadmin/css/font.css">
    <link rel="stylesheet" href="/Xadmin/css/xadmin.css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script src="/Xadmin/lib/layui/layui.js" charset="utf-8"></script>

    <script type="text/javascript" src="/Xadmin/js/xadmin.js"></script>
    <script type="text/javascript" src="/Xadmin/js/cookie.js"></script>
</head>
<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">TELIA- management system</div>
    <div id="darkbannerwrap"></div>

    <form method="post" class="layui-form" action="/index/login_post" method="post">
        @csrf
        <input name="name" placeholder="User Name"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="Password"  type="password" class="layui-input">
        <hr class="hr15">
        <input value="login" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    </form>
    @if(Session::has('message'))
        <div style="height: 20px;width: 300px;font-size:15px;color: red" class="alert alert-info" > {{Session::get('message')}}
        </div>
    @endif
</div>

</body>
</html>