@extends('../admin/index')
@section('content')
    <style>
        #fileButton{
            width: 70px;
            height: 35px;
            background: #019ca1;
            cursor: pointer;
            border: 0px;
            /* border-radius: 10px; */
            color: #fff;
            font-weight: 600;
        }
        #fileShowName{
        width: 180px;
        height: 30px;
        }
    </style>
    <div class="x-body">
        <form class="layui-form" action="/admin/Producing_bundle" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="layui-form-item">
                <label for="L_username" class="layui-form-label">
                    <span class="x-red">*</span>请选择excel(excel编码为utf8)
                </label>
                <div class="layui-input-inline" style="width: 60%">
                    <input type="text" name="photo" value="" placeholder=" &nbsp;请选择您的excel" id="fileShowName" required="" readonly="readonly">
                    <input type="button" id="fileButton" name="fileButton" class="input" value="浏览" onclick="$('#submitFile').click();">
                    <input name="photo" value="" required="" id="submitFile" type="file" style="display: none;" onchange="$('#fileShowName').val($(this).val());">
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


    @if(Session::has('message'))
        <div style="height: 20px;width: 300px;font-size:15px;color: green" class="alert alert-info" > {{Session::get('message')}}
        </div>
             <div class="layui-progress layui-progress-big" lay-filter="demo" lay-showPercent="yes">
                    <div class="layui-progress-bar layui-bg-green" lay-percent="{{Session::get('round')}}%"></div>
             </div>
    @endif


@endsection
