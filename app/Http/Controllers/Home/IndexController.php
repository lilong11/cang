<?php

namespace App\Http\Controllers\Home;

use Excel;
use DB;
use App\Model\User;
use Auth;
use \App\Model\Rolling_schedule;
use \App\Model\Producing_bundle;
use \App\Model\Excel_log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Complex\asec;

class IndexController extends Controller
{
    public function login_post(Request $request){
//        dd($request->all());

        $uname = $request['name'];
        $password = $request['password'];
        if (Auth::attempt(['name' => $uname,'password' => $password])) {
            $user = User::where('name','=',$uname)->get();
            $permission = $user[0]->permission;
//            if ($permission!=3){
//                echo '<script>alert("用户权限不够，请联系管理员");location="/home_user/login"</script>';exit;
//            }
            session(['home_user'=>$uname]);
            echo '<script>location="/indexs"</script>';
        }else{
            return redirect('/home_user/login')->with('message', 'wrong password!');

        }



        return view('home.login');
    }

    public function index(){
        return view('home.index');
    }
    public function login(){
        return view('home.user_logo');
    }
    public function search(Request $request){
        if (empty($request->report_name)){
            return redirect($_SERVER['HTTP_REFERER'])->with('null', 'please enter report name');exit;
        }
        if($request->sum == 1){
           $data = Producing_bundle::where('report_name',$request->report_name)->get();
            if (empty($data[0])){
               return redirect($_SERVER['HTTP_REFERER'])->with('report_name_messages', 'You did not find the data you wanted');exit;
           }else{
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

               Excel::create('Producing_bundle',function($excel) use ($export){
                   $bool = $excel->sheet('score', function($sheet) use ($export){
                       $sheet->rows($export);
                   });

               })->export('xls');

           }
        }else{
            $data = Rolling_schedule::where('report_name',$request->report_name)->get();
            if (empty($data[0])){
                return redirect($_SERVER['HTTP_REFERER'])->with('report_name_messages', 'You did not find the data you wanted');exit;
            }else{
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

                Excel::create('order',function($excel) use ($export){
                    $bool = $excel->sheet('score', function($sheet) use ($export){
                        $sheet->rows($export);
                    });

                })->export('xls');

            }
        }
    }

    public function report(){
        $data_list = Rolling_schedule::all();
        $Rolling_schedule = count($data_list);
        $data_bundle_list = Producing_bundle::all();
        $Producing_bundle = count($data_bundle_list);
        $data_bundle_log =  count(Excel_log::where('Model_table','producing bundle')->get());
        $data_Schedule_log = count(Excel_log::where('Model_table','Rolling Schedule')->get());
        if ($data_bundle_log == 0){
            $round_bundle = 100;
        }else{

            $ffff=$Producing_bundle+$data_bundle_log;
            $round_bundle = round($data_bundle_log/$ffff*100);
//            $round_bundle = round($Producing_bundle/$data_bundle_log*100,2);
        }
       $date_lists = DB::table('producing_bundle')->select('report_name','created_at')->get();
        foreach ($date_lists as $v){
           $report_name_list[] = $v->report_name;
           $created_at_list[] = $v->created_at;
        }

        $date_list2 =  array_unique($report_name_list);
        $created_at_list2 =  array_unique($created_at_list);
        $date_list = array_combine($date_list2,$created_at_list2);
//        dd($date_list);
//        $data_list = Rolling_schedule::where('name')->all();



        if ($data_Schedule_log == 0){
            $round_Schedule = 100;
        }else{
            $ffffs=$Rolling_schedule+$data_Schedule_log;

            $round_Schedule = round($data_Schedule_log/$ffffs*100);

//            $round_Schedule = round($Rolling_schedule/$data_Schedule_log*100,2);
        }

//        DB::table('producing_bundle')->select('name', 'email as user_email')->get();

        $log_data = Excel_log::where('Model_table','producing bundle')->get();
        if (!empty($log_data[0])){
            foreach ($log_data as $v){
            $data_sum[] = [
                $v['BundleLength'],
            ];
        }
        foreach ($log_data as $v){
            $BundleWidth[] = [
            $v['BundleWidth'],
            ];
        }
        foreach ($log_data as $v){
            $BundleHeight[] = [
            $v['BundleHeight'],
            ];
        }
        foreach ($log_data as $v){
           $MaterialDescription[] = $v['MaterialDescription'];
        }
            $arr_list = array_count_values($MaterialDescription);//计算出现的条数
            $array_del = array_unique($arr_list);//删除数组中的重复
            $array_del2 = array_unique($arr_list);//删除数组中的重复
            rsort($array_del2);//对数组逆向排序
            $list_he = array_sum($array_del2);//数组中的所有和
            arsort($array_del);//对数组逆向排序
           $arr_img = array_slice($array_del,0,5);//取出数组中前5个数据
           $arr_img2 = array_slice($array_del,0,5);//取出数组中前5个数据
            sort($arr_img);//计算百分比变量
//dd($arr_img2);
            foreach ($arr_img2 as $k=>$v){
                 $k_list[] =$k;
            }
            $k_list[5] ="others";
//            dump($k_list);
//            dd($k_list);
//            $list_he //总数
//            $arr_img[0] //单个数
            foreach ($arr_img as $v){
                $cpl[] =round( $v/$list_he * 100 , 2);

            }
//            $cpl[1] =round( $arr_img[1]/$list_he * 100 , 2);
//            $cpl[2] =round( $arr_img[2]/$list_he * 100 , 2);
//            $cpl[3] =round( $arr_img[3]/$list_he * 100 , 2);
//            $cpl[4] =round( $arr_img[4]/$list_he * 100 , 2);
            $cpl[5] =100-array_sum($cpl);
            $list =array_combine($cpl,$k_list);//合并成一个新的数组
//            dd($list);
//            dump($list);

            $BundleLengths =  array_reduce($data_sum, 'array_merge', array());
            $BundleWidths =  array_reduce($BundleWidth, 'array_merge', array());
            $BundleHeights =  array_reduce($BundleHeight, 'array_merge', array());
            $BundleLength = array_count_values($BundleLengths);
            $BundleWidth_data = array_count_values($BundleWidths);
            $BundleHeight_data = array_count_values($BundleHeights);

            arsort($BundleLength);
            arsort($BundleWidth_data);
            arsort($BundleHeight_data);

            $round_Schedule_log = round($data_Schedule_log/$Rolling_schedule*100,2);
            $round_bundle_log = round($data_bundle_log/$Producing_bundle*100,2);
        }else{
            $BundleHeight_data = [];
            $BundleWidth_data = [];
            $BundleLength = [];
            $round_Schedule_log = [];
            $round_bundle_log = [];

        }


        return view('home.report',compact('list','date_list','log_data','BundleHeight_data','BundleWidth_data','BundleLength','Rolling_schedule','round_bundle_log','round_Schedule_log','round_bundle','round_Schedule','Producing_bundle','data_bundle_log','data_Schedule_log'));
    }


    public function excel_log_clearing(){
        $bool = DB::table('excel_log')->truncate();
        return redirect($_SERVER['HTTP_REFERER'])->with('1', 'clearing succeed');

    }
    public function order_clearing(){
        $bool = DB::table('rolling_schedule')->truncate();
        return redirect($_SERVER['HTTP_REFERER'])->with('1', 'clearing succeed');

    }
    public function producing_bundle_clearing(){
        $bool = DB::table('producing_bundle')->truncate();
        return redirect($_SERVER['HTTP_REFERER'])->with('1', 'clearing succeed');

    }

    public function excel_log_derive(){
        $data = Excel_log::all();

        //title标题
        $export[] = [
            "Facility","FinishDate","SequenceNumber","OrderNumber","EstimatedDuration","MaterialNumber","MaterialDescription","BundleLength","BundleWidth","BundleHeight","BundleWeight","BundlePieceCount","PieceWidth","PieceHeight","PieceGauge","ConfigWidth","ConfigHeight","QtyRequired","HeatTreat","SurfaceCritical","Scarfing","Outside","Shape","Mill","Customer","RollCompleted","updated_at","created_at","reason for failure","Model_table"
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
                $v["updated_at"],
                $v["created_at"],
                'BundleLength+BundleWidth+BundleHeight+BundleWeight > 4000',
                $v["Model_table"],

            );
        }
        Excel::create('data_log',function($excel) use ($export){
            $bool = $excel->sheet('score', function($sheet) use ($export){
                $sheet->rows($export);
            });
        })->export('xls');
    }



    public function producing(Request $request){
//        Rolling_schedule::where->
        $Rolling_schedule = Rolling_schedule::where('report_name',$request->report_name)->get();
        $Producing_bundle = Producing_bundle::where('report_name',$request->report_name)->get();
        $Excel_log = Excel_log::where('report_name','$request->report_name')->get();
//dd($request->report_name);
    if (!empty(count($Rolling_schedule))){

        return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'Please submit another report name！！！');exit;
    }    if (!empty(count($Excel_log))){
        return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'Please submit another report name！！！');exit;
    } if (!empty(count($Producing_bundle))){
        return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'Please submit another report name！！！');exit;
    }
        $file = $request->file('photo');
        if(!empty($file)){
            $path = $file->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();


            if(!empty($data->count())){

                foreach ($data as $key => $value) {

                    $BundleLength = $value['bundlelength'];

                    $BundleWidth = $value->bundlewidth;

                    $BundleHeight = $value->bundleheight;
                    $BundleWeight = $value->bundleweight;

                    $sum = $BundleLength+$BundleWidth+$BundleHeight+$BundleWeight;



//                     dd($data);
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
                        'report_name' =>$request->report_name,
                    ];

                }

                foreach($insert as $v){

                    $sum =	$v['BundleLength']+$v['BundleWidth']+$v['BundleHeight']+$v['BundleWeight'];
                    if( $sum <= 4000){
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
                            'report_name' =>"$request->report_name",
                            'created_at' =>date("Y-m-d h:i:s"),
                            'updated_at' =>date("Y-m-d h:i:s"),
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
                            'Model_table' =>'producing bundle',
                            'report_name' =>"$request->report_name",
                            'created_at' =>date("Y-m-d h:i:s"),
                            'updated_at' =>date("Y-m-d h:i:s"),
                        ];
                    }

                }
//dd($data_sum[0]);

//                bundlelength
                $add_count =	count($data_sum);
                $insert_count =	count($insert);
                $failed = $insert_count-$add_count;

                if(!empty($data_sum)){



                    $newarr=array();
                    $newarr2=array();

                    foreach($data_sum as $k=>$v){
                        $size=$v['QtyRequired'];
                        for($i=0;$i<$size;$i++ ){
                            $newarr[]=$v;
                        }

                    }

                    $excel_logs = DB::table('excel_log')->insert($data_log);
                    $bool = DB::table('producing_bundle')->insert($newarr);
                    if ($bool){
                        $newarrs =	count($newarr);
                        $log_count = count($excel_logs);
                        $round = round($failed/$insert_count*100,2);
//                        dd($round);
                        session()->flash('rounds',$round);
                        return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'Add '.$newarrs.' , Insert '.$failed.' failed');
                    }else{
                        echo '<script>alert("addition failed!!!");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
                    }
                }
            }
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'Please select Excel after submission!');
        }
    }
    public function add_post(Request $request){


        $file = $request->file('photo');
//        dd($file);
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
                            'report_name' =>"$request->report_name",
                            'created_at' =>date("Y-m-d h:i:s"),
                            'updated_at' =>date("Y-m-d h:i:s"),
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
//                dd($data_sum[0]);




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
}
