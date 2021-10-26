@extends('../admin.index')
@section('content')

    <body>
    <div class="x-nav">
        <span class="layui-breadcrumb" style="visibility: visible;">
          <a href="{{$_SERVER['HTTP_REFERER']}}">get back</a><span lay-separator="">/</span>
          <a><cite>particulars</cite></a>
        </span>
        <span class="layui-breadcrumb" style="visibility: visible;">
        <a>
      </a></span><a>
        </a><a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">Facility</label>
                <div class="layui-input-inline">
                    <input type="text" readonly readonly name="Facility"  value="{{$data->Facility}}"  autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">FinishDate</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="FinishDate"  value="{{$data->FinishDate}}" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label" style="width:200px">SequenceNumber</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="SequenceNumber" value="{{$data->SequenceNumber}}" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>

        <div class="layui-form-item">

            <div class="layui-inline">
                <label class="layui-form-label">OrderNumber</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="OrderNumber" value="{{$data->OrderNumber}}" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label" style="width: 90px">EstimatedDuration</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="EstimatedDuration" value="{{$data->EstimatedDuration}}" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label"  style="width:200px">MaterialNumber</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="MaterialNumber" value="{{$data->MaterialNumber}}" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label" style="width: 90px;">MaterialDescription</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="MaterialDescription" value="{{$data->MaterialDescription}}" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">BundleLength</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="BundleLength" value="{{$data->BundleLength}}" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label"  style="width:200px">BundleLength</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="BundleLength" value="{{$data->BundleLength}}" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">BundleHeight</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="BundleHeight" value="{{$data->BundleHeight}}" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">BundleWeight</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="BundleWeight" value="{{$data->BundleWeight}}" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label"  style="width:200px">BundlePieceCount</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="BundlePieceCount" value="{{$data->BundlePieceCount}}" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">PieceWidth</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="PieceWidth" value="{{$data->PieceWidth}}" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">PieceHeight</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="PieceHeight" value="{{$data->PieceHeight}}" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label"  style="width:200px">PieceGauge</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="PieceGauge" value="{{$data->PieceGauge}}" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">ConfigWidth</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="ConfigWidth" value="{{$data->ConfigWidth}}" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">ConfigHeight</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="ConfigHeight" value="{{$data->ConfigHeight}}" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label"  style="width:200px">QtyRequired</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="QtyRequired" value="{{$data->QtyRequired}}" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">HeatTreat</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="HeatTreat" value="{{$data->HeatTreat}}" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">SurfaceCritical</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="SurfaceCritical" value="{{$data->SurfaceCritical}}" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label"  style="width:200px">Scarfing</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="Scarfing" value="{{$data->Scarfing}}" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">Outside</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="Outside" value="{{$data->Outside}}" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">Shape</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="Shape" value="{{$data->Shape}}" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label"  style="width:200px">Mill</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="Mill" value="{{$data->Mill}}" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">

            <div class="layui-inline">
                <label class="layui-form-label">RollCompleted</label>
                <div class="layui-input-inline">
                    <input type="text" readonly name="RollCompleted" value="{{$data->RollCompleted}}" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>

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