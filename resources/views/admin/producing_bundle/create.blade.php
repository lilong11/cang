@extends('../admin.index')
@section('content')
    <body>
    <div class="x-nav">
        <span class="layui-breadcrumb" style="visibility: visible;">
          <a href="/admin/Rolling_Schedule">get back</a><span lay-separator="">/</span>
          <a><cite>edit</cite></a>
        </span>
        <span class="layui-breadcrumb" style="visibility: visible;">
        <a>
      </a></span><a>
        </a><a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <form class="layui-form" action="/admin/Rolling_Schedule/creates_post" method="post">
            @csrf
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">Facility</label>
                    <div class="layui-input-inline">
                        <input type="text" name="Facility"   autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">FinishDate</label>
                    <div class="layui-input-inline">
                        <input type="text" name="FinishDate"   autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label" style="width:200px">SequenceNumber</label>
                    <div class="layui-input-inline">
                        <input type="text" name="SequenceNumber"  autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">

                <div class="layui-inline">
                    <label class="layui-form-label">OrderNumber</label>
                    <div class="layui-input-inline">
                        <input type="text" name="OrderNumber"  autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label" style="width: 90px">EstimatedDuration</label>
                    <div class="layui-input-inline">
                        <input type="text" name="EstimatedDuration"  autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"  style="width:200px">MaterialNumber</label>
                    <div class="layui-input-inline">
                        <input type="text" name="MaterialNumber"  autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label" style="width: 90px;">MaterialDescription</label>
                    <div class="layui-input-inline">
                        <input type="text" name="MaterialDescription"  autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">BundleLength</label>
                    <div class="layui-input-inline">
                        <input type="text" name="BundleLength"  autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"  style="width:200px">BundleLength</label>
                    <div class="layui-input-inline">
                        <input type="text" name="BundleLength"  autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">BundleHeight</label>
                    <div class="layui-input-inline">
                        <input type="text" name="BundleHeight"  autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">BundleWeight</label>
                    <div class="layui-input-inline">
                        <input type="text" name="BundleWeight"  autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"  style="width:200px">BundlePieceCount</label>
                    <div class="layui-input-inline">
                        <input type="text" name="BundlePieceCount"  autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">PieceWidth</label>
                    <div class="layui-input-inline">
                        <input type="text" name="PieceWidth"  autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">PieceHeight</label>
                    <div class="layui-input-inline">
                        <input type="text" name="PieceHeight"  autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"  style="width:200px">PieceGauge</label>
                    <div class="layui-input-inline">
                        <input type="text" name="PieceGauge" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">ConfigWidth</label>
                    <div class="layui-input-inline">
                        <input type="text" name="ConfigWidth" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">ConfigHeight</label>
                    <div class="layui-input-inline">
                        <input type="text" name="ConfigHeight" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"  style="width:200px">QtyRequired</label>
                    <div class="layui-input-inline">
                        <input type="text" name="QtyRequired" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">HeatTreat</label>
                    <div class="layui-input-inline">
                        <input type="text" name="HeatTreat" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">SurfaceCritical</label>
                    <div class="layui-input-inline">
                        <input type="text" name="SurfaceCritical" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"  style="width:200px">Scarfing</label>
                    <div class="layui-input-inline">
                        <input type="text" name="Scarfing" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">Outside</label>
                    <div class="layui-input-inline">
                        <input type="text" name="Outside" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-inline">
                    <label class="layui-form-label">Shape</label>
                    <div class="layui-input-inline">
                        <input type="text" name="Shape"  autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label"  style="width:200px">Mill</label>
                    <div class="layui-input-inline">
                        <input type="text" name="Mill"  autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">

                <div class="layui-inline">
                    <label class="layui-form-label">RollCompleted</label>
                    <div class="layui-input-inline">
                        <input type="text" name="RollCompleted"  autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    Submit
                </button>
            </div>
        </form>
        @if(Session::has('1'))
            <div style="height: 20px;width: 300px;font-size:15px;color: green" class="alert alert-info" > {{Session::get('1')}}
            </div>
        @endif
        {{--        @if(Session::has('0'))--}}
        {{--            <div style="height: 20px;width: 300px;font-size:15px;color: red" class="alert alert-info" > {{Session::get('0')}}--}}
        {{--            </div>--}}
        {{--        @endif--}}
    </div>

    </body>
@endsection