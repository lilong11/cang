<?php

namespace App\Http\Controllers\Admin;

use Excel;
use DB;
use \App\Model\Rolling_schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{

    public function index()
    {
        $data = Rolling_schedule::paginate(6);
        return view('admin.rolling_schedule.index',compact('data'));
    }

    /**
     * add
     */
    public function create()
    {
        return view('admin.rolling_schedule.add');
    }
    /**
     * creates
     */
    public function creates()
    {
        return view('admin.rolling_schedule.create');

    }

    /**
     * creates_post
     */
    public function creates_post(Request $request)
    {
        $tab = new Rolling_schedule;
        $tab->Facility = $request->input('Facility','');
        $tab->FinishDate = $request->input('FinishDate','');
        $tab->SequenceNumber = $request->input('SequenceNumber','');
        $tab->OrderNumber = $request->input('OrderNumber','');
        $tab->EstimatedDuration = $request->input('EstimatedDuration','');
        $tab->MaterialNumber = $request->input('MaterialNumber','');
        $tab->MaterialDescription = $request->input('MaterialDescription','');
        $tab->BundleLength = $request->input('BundleLength','');
//        $tab->BundleWidth = $request->input('BundleWidth','');
        $tab->BundleHeight = $request->input('BundleHeight','');
        $tab->BundleWeight = $request->input('BundleWeight','');
        $tab->BundlePieceCount = $request->input('BundlePieceCount','');
        $tab->PieceWidth = $request->input('PieceWidth','');
        $tab->PieceHeight = $request->input('PieceHeight','');
        $tab->PieceGauge = $request->input('PieceGauge','');
        $tab->ConfigWidth = $request->input('ConfigWidth','');
        $tab->ConfigHeight = $request->input('ConfigHeight','');
        $tab->QtyRequired = $request->input('QtyRequired','');
        $tab->HeatTreat = $request->input('HeatTreat','');
        $tab->SurfaceCritical = $request->input('SurfaceCritical','');
        $tab->Scarfing = $request->input('Scarfing','');
        $tab->Outside = $request->input('Outside','');
        $tab->Shape = $request->input('Shape','');
        $tab->Mill = $request->input('Mill','');
        $tab->Customer = $request->input('Customer','');
        $tab->RollCompleted = $request->input('RollCompleted');
        if ($tab->save()){
            $request->flashExcept('_token','password');
            return redirect($_SERVER['HTTP_REFERER'])->with('1', 'create prosperity');
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('0', 'create failed!');

        }
        return view('admin.rolling_schedule.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');
        if(!empty($file)){
            $path = $file->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
//            dd($data->count());
            if(!empty($data->count())){

                foreach ($data as $key => $value) {

                $BundleLength = $value->bundlelength;
                $BundleWidth = $value->bundlewidth;

                $BundleHeight = $value->bundleheight;
                $BundleWeight = $value->bundleweight;

               	$sum = $BundleLength+$BundleWidth+$BundleHeight+$BundleWeight;



                   // dd($value);
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

                    
                    foreach($insert as $v){

                    $sum =	$v['BundleLength']+$v['BundleWidth']+$v['BundleHeight']+$v['BundleWeight'];
                    	if( $sum <= 3000){

                    		$data_sum[] = [
				                'Facility' =>$v['Facility'],
				                'FinishDate' =>$v['FinishDate'],
				                'SequenceNumber' =>$v['SequenceNumber'],
				                'OrderNumber' =>$v['OrderNumber'],
				                'EstimatedDuration' =>$v['EstimatedDuration'],
				                'MaterialNumber' =>$v['MaterialNumber'],
				                'MaterialDescription' =>$v['MaterialDescription'],
				                'BundleLength' =>$v['BundleLength'],
				                'BundleWidth' =>$v['BundleWidth'],
				                'BundleHeight' =>$v['BundleHeight'],
				                'BundleWeight' =>$v['BundleWeight'],
				                'BundlePieceCount' =>$v['BundlePieceCount'],
				                'PieceWidth' =>$v['PieceWidth'],
				                'PieceHeight' =>$v['PieceHeight'],
				                'PieceGauge' =>$v['PieceGauge'],
				                'ConfigWidth' =>$v['ConfigWidth'],
				                'ConfigHeight' =>$v['ConfigHeight'],
				                'QtyRequired' =>$v['QtyRequired'],
				                'HeatTreat' =>$v['HeatTreat'],
				                'SurfaceCritical' =>$v['SurfaceCritical'],
				                'Scarfing' =>$v['Scarfing'],
				                'Outside' =>$v['Outside'],
				                'Shape' =>$v['Shape'],
				                'Mill' =>$v['Mill'],
				                'Customer' =>$v['Customer'],
				                'RollCompleted' =>$v['RollCompleted'],

                    		];

                    	}

                        if( $sum >= 4000){
                            $data_log[] = [
                                'Facility' =>$v['Facility'],
                                'FinishDate' =>$v['FinishDate'],
                                'SequenceNumber' =>$v['SequenceNumber'],
                                'OrderNumber' =>$v['OrderNumber'],
                                'EstimatedDuration' =>$v['EstimatedDuration'],
                                'MaterialNumber' =>$v['MaterialNumber'],
                                'MaterialDescription' =>$v['MaterialDescription'],
                                'BundleLength' =>$v['BundleLength'],
                                'BundleWidth' =>$v['BundleWidth'],
                                'BundleHeight' =>$v['BundleHeight'],
                                'BundleWeight' =>$v['BundleWeight'],
                                'BundlePieceCount' =>$v['BundlePieceCount'],
                                'PieceWidth' =>$v['PieceWidth'],
                                'PieceHeight' =>$v['PieceHeight'],
                                'PieceGauge' =>$v['PieceGauge'],
                                'ConfigWidth' =>$v['ConfigWidth'],
                                'ConfigHeight' =>$v['ConfigHeight'],
                                'QtyRequired' =>$v['QtyRequired'],
                                'HeatTreat' =>$v['HeatTreat'],
                                'SurfaceCritical' =>$v['SurfaceCritical'],
                                'Scarfing' =>$v['Scarfing'],
                                'Outside' =>$v['Outside'],
                                'Shape' =>$v['Shape'],
                                'Mill' =>$v['Mill'],
                                'Customer' =>$v['Customer'],
                                'RollCompleted' =>$v['RollCompleted'],
                                'Model_table' =>'Rolling Schedule',
                                'created_at' =>date("Y-m-d h:i:s"),
                                'updated_at' =>date("Y-m-d h:i:s"),
                            ];
                        }


                    	}




 				$add_count =	count($data_sum);
				$insert_count =	count($insert);
				$failed = $insert_count-$add_count;
                if(!empty($data_sum)){
                    $excel_logs = DB::table('excel_log')->insert($data_log);
                    $bool = DB::table('Rolling_schedule')->insert($data_sum);
                    if ($bool){



                 $round = round($failed/$insert_count*100,2);
                  session()->flash('round',$round);

           			 return redirect($_SERVER['HTTP_REFERER'])->with('message', 'Add '.$add_count.' , Insert '.$failed.' failed');

                        // echo '<script>alert("添加成功");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
                    }else{
                        echo '<script>alert("addition failed!!!");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
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
        $data = Rolling_schedule::find($id);
        return view('admin.rolling_schedule.show',compact('data'));
    }

    /**
     * edit
     */
    public function edit($id)
    {
        $data = Rolling_schedule::find($id);
        return view('admin.rolling_schedule.edit',compact('data','id'));
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
        $tab = Rolling_schedule::find($id);
        $tab->Facility = $request->input('Facility','');
        $tab->FinishDate = $request->input('FinishDate','');
        $tab->SequenceNumber = $request->input('SequenceNumber','');
        $tab->OrderNumber = $request->input('OrderNumber','');
        $tab->EstimatedDuration = $request->input('EstimatedDuration','');
        $tab->MaterialNumber = $request->input('MaterialNumber','');
        $tab->MaterialDescription = $request->input('MaterialDescription','');
        $tab->BundleLength = $request->input('BundleLength','');
//        $tab->BundleWidth = $request->input('BundleWidth','');
        $tab->BundleHeight = $request->input('BundleHeight','');
        $tab->BundleWeight = $request->input('BundleWeight','');
        $tab->BundlePieceCount = $request->input('BundlePieceCount','');
        $tab->PieceWidth = $request->input('PieceWidth','');
        $tab->PieceHeight = $request->input('PieceHeight','');
        $tab->PieceGauge = $request->input('PieceGauge','');
        $tab->ConfigWidth = $request->input('ConfigWidth','');
        $tab->ConfigHeight = $request->input('ConfigHeight','');
        $tab->QtyRequired = $request->input('QtyRequired','');
        $tab->HeatTreat = $request->input('HeatTreat','');
        $tab->SurfaceCritical = $request->input('SurfaceCritical','');
        $tab->Scarfing = $request->input('Scarfing','');
        $tab->Outside = $request->input('Outside','');
        $tab->Shape = $request->input('Shape','');
        $tab->Mill = $request->input('Mill','');
        $tab->Customer = $request->input('Customer','');
        $tab->RollCompleted = $request->input('RollCompleted');
//        dd($tab->BundleWidth);
//        dd($tab->save());
        if ($tab->save()){
            return redirect($_SERVER['HTTP_REFERER'])->with('1', 'modify successfully!');
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('0', 'fail to modify!');
        }
    }


    public function excel_derive()
    {
        $data = Rolling_schedule::all();
        //title标题
        $export[] = [
            "Facility","FinishDate","SequenceNumber","OrderNumber","EstimatedDuration","MaterialNumber","MaterialDescription","BundleLength","BundleWidth","BundleHeight","BundleWeight","BundlePieceCount","PieceWidth","PieceHeight","PieceGauge","ConfigWidth","ConfigHeight","QtyRequired","HeatTreat","SurfaceCritical","Scarfing","Outside","Shape","Mill","Customer","RollCompleted"
        ];
        foreach ($data as $v){
            //excel导出必须封装一下数组
            $export[] = array(
                $v["Facility"],
                $v["FinishDate"],
                $v["SequenceNumber"],
                $v["OrderNumber"],
                $v["EstimatedDuration"],
                $v["MaterialNumber"],
                $v["MaterialDescription"],
                $v["BundleLength"],
                $v["BundleWidth"],
                $v["BundleHeight"],
                $v["BundleWeight"],
                $v["BundlePieceCount"],
                $v["PieceWidth"],
                $v["PieceHeight"],
                $v["PieceGauge"],
                $v["ConfigWidth"],
                $v["ConfigHeight"],
                $v["QtyRequired"],
                $v["HeatTreat"],
                $v["SurfaceCritical"],
                $v["Scarfing"],
                $v["Outside"],
                $v["Shape"],
                $v["Mill"],
                $v["Customer"],
                $v["RollCompleted"],
//                $v["id"],
            );
        }
       session(['export_session'=>$export]);
       $export_session = session('export_session');
        DB::table('rolling_schedule')->truncate();
    Excel::create('Rolling_schedule',function($excel) use ($export_session){
           $bool = $excel->sheet('score', function($sheet) use ($export_session){
              $sheet->rows($export_session);
            });

		session()->pull('export_session');
        })->export('xls');

    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del($id)
    {
        $flight = Rolling_schedule::find($id);
        if ($flight->delete()){
            echo '<script>location="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }else{
            echo '<script>alert("删除失败");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }
    }
}
