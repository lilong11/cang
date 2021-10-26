@extends('../admin.index')
@section('content')
    <body>
    <div class="x-nav">
      <span class="layui-breadcrumb" style="visibility: visible;">
        <a>
      </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <div class="layui-row">
{{--            <form class="layui-form layui-col-md12 x-so">--}}
{{--                <input type="text" name="username" placeholder="请输入用户名" autocomplete="off" class="layui-input">--}}
{{--                <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon"></i></button>--}}
{{--            </form>--}}
        </div>

        <table class="layui-table">
            <thead>
            <tr>
                <th>User name</th>
                <th>phone</th>
                <th>user right</th>
{{--                <th>状态</th>--}}
{{--                <th>operation</th>--}}
            </tr></thead>
            <tbody>
            @foreach($data as $v)
            <tr>
                <td>{{ $v->name }}</td>
                <td>{{ $v->phone }}</td>
                <td>
                    @switch($v -> permission)
                        @case(0)
                        <a href="user/status/{{$v->id}}"><span class="layui-btn layui-btn-normal">domestic consumer</span></a>
                        @break
                        @case(3)
                        <a href="user/status/{{$v->id}}"> <span class="layui-btn layui-btn-danger">Admin</span></a>
                        @break
                    @endswitch
                </td>
{{--                <td class="td-status">--}}
{{--                    @switch($v -> status)--}}
{{--                        @case(0)--}}
{{--                        <a href="user/status/{{$v->id}}"><span class="layui-btn layui-btn-normal">已开启</span></a>--}}
{{--                        @break--}}
{{--                        @case(1)--}}
{{--                        <a href="user/status/{{$v->id}}"> <span class="layui-btn layui-btn-danger">已禁用</span></a>--}}
{{--                        @break--}}
{{--                    @endswitch--}}
{{--                </td>--}}
{{--                <td class="td-manage">--}}
{{--                    <a title="edit" onclick="x_admin_show('edit','/admins/user/{{ $v->id }}/edit',500,400)" href="javascript:;">--}}
{{--                        <i class="layui-icon"></i>--}}
{{--                    </a>--}}
{{--                    <a title="edit password" onclick="x_admin_show('edit password','/admin/user/{{ $v->id }}/pasword',500,300)" href="javascript:;">--}}
{{--                        <i class="layui-icon layui-icon-password"></i>--}}
{{--                    </a>--}}
{{--                    <a title="删除" onclick="return confirm('确定要删除吗?')" href="user/{{ $v->id }}">--}}
{{--                        <i class="layui-icon"></i>--}}
{{--                    </a>--}}
{{--                </td>--}}
            </tr>
            @endforeach
            </tbody>
        </table>
        <xblock>
            <button class="layui-btn" onclick="x_admin_show('user add','user/create',500,500)"><i class="layui-icon"></i>add</button>
            <span class="x-right" style="line-height:40px">共有数据：{{ $data->total() }} 条</span>
        </xblock>

        <div class="page">{{ $data->links() }}</div>

    </div>

    </body>
@endsection