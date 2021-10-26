@extends('../admin.index')
@section('content')
    <body>
    <div class="x-nav">
      <span class="layui-breadcrumb" style="visibility: visible;">

      </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
            <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">

        <table class="layui-table">
            <thead>
            <tr>
                <th>facility</th>
                <th>finisheddate</th>
                <th>sequencenumber</th>
                <th>ordernumber</th>
                <th>estimatedduration</th>
                <th>materialnumber</th>
                <th>materialdescription</th>
                {{--                <th>bundlelength</th>--}}
                {{--                <th>bundlewidth</th>--}}
                <th>bundleheight</th>
                <th>bundleweight</th>
                <th>bundlepiececount</th>
                {{--                <th>piecewidth</th>--}}
                <th>pieceheight</th>
                <th>piecegauge</th>
                <th>operation</th>
            </tr></thead>
            <tbody>
            @foreach($data as $v)
                <tr>

                    <td>{{$v->Facility}}</td>
                    <td>{{$v->FinishDate}}</td>
                    <td>{{$v->SequenceNumber}}</td>
                    <td>{{$v->OrderNumber}}</td>
                    <td>{{$v->EstimatedDuration}}</td>
                    <td>{{$v->MaterialNumber}}</td>
                    <td>{{$v->MaterialDescription}}</td>
                    {{--                    <td>{{$v->BundleLengtd}}</td>--}}
                    {{--                    <td>{{$v->BundleWidtd}}</td>--}}
                    <td>{{$v->BundleHeight}}</td>
                    <td>{{$v->BundleWeight}}</td>
                    <td>{{$v->BundlePieceCount}}</td>
                    <td>{{$v->PieceHeight}}</td>
                    <td>{{$v->PieceGauge}}</td>
                    <td class="td-manage">
                        <a title="excel导入" onclick="x_admin_show('excel导入','/admin/excel/{{ $v->id }}',500,400)" href="javascript:;">
                            <i class="layui-icon"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <xblock>
            <button class="layui-btn" onclick="x_admin_show('excel add','Producing_bundle/create',500,500)"><i class="layui-icon"></i>excel add</button>
            <a class="layui-btn layui-btn-warm" href="/admin/Producing_bundle_excel_derive"><i class="layui-icon"></i>excel derive</a>
            <span class="x-right" style="line-height:40px">A total of data：{{ $data->total() }} strip</span>
        </xblock>

        <div class="page">{{ $data->links() }}</div>

    </div>

    </body>
@endsection