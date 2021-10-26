@extends('../admin/index')
@section('content')
    <div class="x-body">
        <form class="layui-form" action="/admins/user/{{ $data->id }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put"/>
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>用户名
                </label>
                <div class="layui-input-inline">
                    <input type="text" name="name"  value="{{ $data->name }}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>手机号
                </label>
                <div class="layui-input-inline">
                    <input type="text" name="phone" value="{{ $data->phone }}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>用户权限
                </label>
                <div class="layui-input-inline">
                    <select name="permission" class="layui-input">
                        @switch($data -> permission)
                            @case(0)
                            <option value="0">普通用户</option>
                            @break
                            @case(2)
                            <option value="2">内部员工</option>
                            @break
                            @case(3)
                            <option value="3">超级管理员</option>
                            @break
                        @endswitch
                        <option value="0">普通用户</option>
                        <option value="2">内部员工</option>
                        <option value="3">超级管理员</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    确认修改
                </button>
            </div>
        </form>
    </div>
@endsection
