@extends('../admin/index')
@section('content')
    <div class="x-body">
        <form class="layui-form" action="/admin/excel_post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>用户名
                    </labe
                    <div class="layui-input-inline">
                        <span style="color: red;"> 请选择excel文件(excel编码必须是UTF-8)</span>
                        <br><br>
                        <input type="text" name="photo" value="{{old('photo')}}" id="fileShowName" required readonly="readonly" />
                        <!-- 按钮的onclick事件关联file的onclick事件，点击按钮效果等同于点击file控件 -->
                        <input type="button" id="fileButton" name="fileButton" class="input" value="浏览" onclick="$('#submitFile').click();" />
                        <!-- 隐藏的file控件值改变时同步更新到text上 -->
                        <input name="photo" value="{{old('photo')}}" required id="submitFile" type="file" style="display: none;" onchange="$('#fileShowName').val($(this).val());" />
{{--                        <input type="text" name="name"  value="{{ old('name') }}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">--}}
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>将会成为您的登入名
                    </div>
            </div>


            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    增加
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
