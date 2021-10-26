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
                <th>Facility</th>
                <th>LoadId</th>
                <th>Bol</th>
                <th>BolLine</th>
                <th>Customer</th>
                <th>CustomerName</th>
                <th>SoldTo</th>
                <th>ShipTo</th>
                <th>SalesOrderNumber</th>
                <th>SalesOrderLine</th>
                <th>ItemNumber</th>
                <th>MaterialDescription</th>
{{--                <th>Batch</th>--}}
{{--                <th>Length</th>--}}
{{--                <th>BundleWidth</th>--}}
{{--                <th>BundleHeight</th>--}}
{{--                <th>BundleWeight</th>--}}
{{--                <th>BundlePieceCount</th>--}}
{{--                <th>PieceWidth</th>--}}
{{--                <th>PieceHeight</th>--}}
{{--                <th>PieceGauge</th>--}}
{{--                <th>ConfigWidth</th>--}}
{{--                <th>ConfigHeight</th>--}}
{{--                <th>Shape</th>--}}
{{--                <th>BundleQuantity</th>--}}
{{--                <th>PieceQuantity</th>--}}
{{--                <th>CarrierId</th>--}}
{{--                <th>CarrierName</th>--}}
{{--                <th>LoadType</th>--}}
{{--                <th>TrailerType</th>--}}
{{--                <th>AppointmentDate</th>--}}
{{--                <th>AppointmentTime</th>--}}
{{--                <th>ForeignCoilPreference</th>--}}
{{--                <th>MixedHeat</th>--}}
{{--                <th>Action</th>--}}
{{--                <th>Warehouse</th>--}}
                <th>operation</th>
            </tr></thead>
            <tbody>
            @foreach($data as $v)
                <tr>
                    <td>{{$v->Facility}}</td>
                    <td>{{$v->LoadId}}</td>
                    <td>{{$v->Bol}}</td>
                    <td>{{$v->BolLine}}</td>
                    <td>{{$v->Customer}}</td>
                    <td>{{$v->CustomerName}}</td>
                    <td>{{$v->SoldTo}}</td>
                    <td>{{$v->ShipTo}}</td>
                    <td>{{$v->SalesOrderNumber}}</td>
                    <td>{{$v->SalesOrderLine}}</td>
                    <td>{{$v->ItemNumber}}</td>
                    <td>{{$v->MaterialDescription}}</td>
{{--                    <td>{{$v->Batch}}</td>--}}
{{--                    <td>{{$v->Lengtd}}</td>--}}
{{--                    <td>{{$v->BundleWidtd}}</td>--}}
{{--                    <td>{{$v->BundleHeight}}</td>--}}
{{--                    <td>{{$v->BundleWeight}}</td>--}}
{{--                    <td>{{$v->BundlePieceCount}}</td>--}}
{{--                    <td>{{$v->PieceWidtd}}</td>--}}
{{--                    <td>{{$v->PieceHeight}}</td>--}}
{{--                    <td>{{$v->PieceGauge}}</td>--}}
{{--                    <td>{{$v->ConfigWidtd}}</td>--}}
{{--                    <td>{{$v->ConfigHeight}}</td>--}}
{{--                    <td>{{$v->Shape}}</td>--}}
{{--                    <td>{{$v->BundleQuantity}}</td>--}}
{{--                    <td>{{$v->PieceQuantity}}</td>--}}
{{--                    <td>{{$v->CarrierId}}</td>--}}
{{--                    <td>{{$v->CarrierName}}</td>--}}
{{--                    <td>{{$v->LoadType}}</td>--}}
{{--                    <td>{{$v->TrailerType}}</td>--}}
{{--                    <td>{{$v->AppointmentDate}}</td>--}}
{{--                    <td>{{$v->AppointmentTime}}</td>--}}
{{--                    <td>{{$v->ForeignCoilPreference}}</td>--}}
{{--                    <td>{{$v->MixedHeat}}</td>--}}
{{--                    <td>{{$v->Action}}</td>--}}
{{--                    <td>{{$v->Warehouse}}</td>--}}
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
            <button class="layui-btn" onclick="x_admin_show('excel add','Rolling_Schedule/create',500,500)"><i class="layui-icon"></i>excel add</button>
            <a class="layui-btn layui-btn-warm" href="/admin/Rolling_Schedule/excel_derive"><i class="layui-icon"></i>excel derive</a>
            <span class="x-right" style="line-height:40px">A total of data：{{ $data->total() }} strip</span>
        </xblock>

        <div class="page">{{ $data->links() }}</div>

    </div>

    </body>
@endsection