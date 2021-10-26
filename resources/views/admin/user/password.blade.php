@extends('../admin/index')
@section('content')
    <div class="x-body">
        <form class="layui-form" action="/admins/users/{{ $data->id }}/doPasword" method="post">
            @csrf
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>用户名
                </label>
                <div class="layui-input-inline">
                    <input type="text" readonly="readonly" value="{{ $data->name }}"  class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>新密码
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_pass" name="repassword"  required="" lay-verify="pass" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    6到15个字符
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                    <span class="x-red">*</span>确认密码
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_repass" name="password" required="" lay-verify="repass" autocomplete="off" class="layui-input">
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
    @if ($errors->any())
        <div style="width: 50%;text-align: center;margin-top:200px;margin-left:100px" class="layui-layer layui-layer-iframe">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
