<?php

namespace App\Http\Controllers\Admin;

use Excel;
use DB;
use \App\Model\Create_Load;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoadController extends Controller
{

    public function index()
    {
        $data = Create_Load::paginate(8);
        return view('admin.create_load.index',compact('data'));
    }

    /**
     * add
     */
    public function create()
    {
        return view('admin.rolling_schedule.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('photo');
        if(!empty($file)){
            $path = $file->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
//            dd($data->count());
            if(!empty($data->count())){

                foreach ($data as $key => $value) {
//                    dd($value);
                    $insert[] = [
                        'Facility' =>$value-> facility,
                        'FinishDate' =>$value-> finisheddate,
                        'SequenceNumber' =>$value-> sequencenumber,

                        'OrderNumber' =>$value-> ordernumber,
                        'EstimatedDuration' =>$value-> estimatedduration,
                        'MaterialNumber' =>$value-> materialnumber,
                        'MaterialDescription' =>$value-> materialdescription,
                        'BundleLength' =>$value-> bundlelength,
                        'BundleWidth' =>$value-> bundlewidth,
                        'BundleHeight' =>$value-> bundleheight,
                        'BundleWeight' =>$value-> bundleweight,
                        'BundlePieceCount' =>$value-> bundlepiececount,
                        'PieceWidth' =>$value-> piecewidth,
                        'PieceHeight' =>$value-> pieceheight,
                        'PieceGauge' =>$value-> piecegauge,
                        'ConfigWidth' =>$value-> configwidth,
                        'ConfigHeight' =>$value-> configheight,
                        'QtyRequired' =>$value-> qtyrequired,
                        'HeatTreat' =>$value-> heattreat,
                        'SurfaceCritical' =>$value-> surfacecritical,
                        'Scarfing' =>$value-> scarfing,
                        'Outside' =>$value-> outside,
                        'Shape' =>$value-> shape,
                        'Mill' =>$value-> mill,
                        'Customer' =>$value-> customer,
                        'RollCompleted' =>$value-> rollcompleted,
                    ];
                }
//                dd($insert);
                if(!empty($insert)){
                    $bool = DB::table('create_load')->insert($insert);
                    if ($bool){
                        echo '<script>alert("添加成功");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
                    }else{
                        echo '<script>alert("添加失败");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
                    }
                }
            }
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('message', 'Please select Excel after submission!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function excel_derive()
    {
        $data = Rolling_schedule::all();
        //title标题
        $export[] = [
            "Facility","LoadId","Bol","BolLine","Customer","CustomerName","SoldTo","ShipTo","SalesOrderNumber","SalesOrderLine","ItemNumber","MaterialDescription",
            "Batch","Length","BundleWidth","BundleHeight","BundleWeight","BundlePieceCount","PieceWidth","PieceHeight","PieceGauge","ConfigWidth","ConfigHeight","Shape",
            "BundleQuantity","PieceQuantity","CarrierId","CarrierName","LoadType","TrailerType","AppointmentDate","AppointmentTime","ForeignCoilPreference","MixedHeat",
            "Action","Warehouse"
        ];
        dd($data[5]);
        foreach ($data as $v){
            //excel导出必须封装一下数组
            $export[] = array(
                $v["Facility"],
                $v["LoadId"],
                $v["Bol"],
                $v["BolLine"],
                $v["Customer"],
                $v["CustomerName"],
                $v["SoldTo"],
                $v["ShipTo"],
                $v["SalesOrderNumber"],
                $v["SalesOrderLine"],
                $v["ItemNumber"],
                $v["MaterialDescription"],
                $v["Batch"],
                $v["Length"],
                $v["BundleWidth"],
                $v["BundleHeight"],
                $v["BundleWeight"],
                $v["BundlePieceCount"],
                $v["PieceWidth"],
                $v["PieceHeight"],
                $v["PieceGauge"],
                $v["ConfigWidth"],
                $v["ConfigHeight"],
                $v["Shape"],
                $v["BundleQuantity"],
                $v["PieceQuantity"],
                $v["CarrierId"],
                $v["CarrierName"],
                $v["LoadType"],
                $v["TrailerType"],
                $v["AppointmentDate"],
                $v["AppointmentTime"],
                $v["ForeignCoilPreference"],
                $v["MixedHeat"],
                $v["Action"],
                $v["Warehouse"]

            );
        }
        dd($export);
        Excel::create('开泰生物-客户项目进度',function($excel) use ($export){
            $excel->sheet('score', function($sheet) use ($export){
                $sheet->rows($export);
            });
        })->export('xls');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
