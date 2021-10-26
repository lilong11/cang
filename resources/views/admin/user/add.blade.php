@extends('../admin/index')
@section('content')
    <div class="x-body">
        <form class="layui-form" action="/admin/user" method="post">
            @csrf
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>user name
                </label>
                <div class="layui-input-inline">
                    <input type="text" name="name"  value="{{ old('name') }}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>Will be your login name
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>phone
                </label>
                <div class="layui-input-inline">
                    <input type="text" name="phone" value="{{ old('phone') }}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>password
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_pass" name="repassword" value="{{ old('repassword') }}" required="" lay-verify="pass" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">
                    Six to 15 characters
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                    <span class="x-red">*</span>confirm password
                </label>
                <div class="layui-input-inline">
                    <input type="password" id="L_repass" name="password" required="" lay-verify="repass" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>user right
                </label>
                <div class="layui-input-inline">
                    <select name="permission" class="layui-input">
                        <option value="">please select</option>
                        <option value="3">Super Admin</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    add
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
