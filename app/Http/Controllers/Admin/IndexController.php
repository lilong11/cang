<?php

namespace App\Http\Controllers\Admin;

use Excel;
use DB;
use \App\Model\Excel_log;
use App\Model\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index.index');
    }

    public function excel_post(Request $request){


        $file = $request->file('photo');
//        dd($file);
        if($file){
            $path = $file->getRealPath();
            dd($path);

            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = [
//                        'id' => $value->id,//注释代表添加
                        'contract_name' => $value->contract_name,
                        'contract_no' => $value->contract_no,
                        'sell_id' => $value->sell_id,
                        'uid' => $value->uid,
                        'sample' => $value->sample,
                        'sample_type' => $value->sample_type,
                        'updated_at' => $value->updated_at,
                        'created_at' => $value->created_at,
                        'status' => $value->status,
                        'completion' => $value->completion,
                        'del' => $value->del,
                    ];
                }
                if(!empty($insert)){
                    $bool = DB::table('project')->insert($insert);
                    if ($bool){
                        echo '<script>alert("添加成功");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
                    }else{
                        echo '<script>alert("添加失败");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
                    }
                }
            }
        }else{
            echo '<script>alert("请选择文件后提交");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }

    }

 

    public function login() {
        return view('admin.login');
    }

    public function dologin(Request $request) {
        $uname = $request['name'];
        $password = $request['password'];
        if (Auth::attempt(['name' => $uname,'password' => $password])) {
            $user = User::where('name','=',$uname)->get();
            $permission = $user[0]->permission;
            if ($permission!=3){
                echo '<script>alert("用户权限不够，请联系管理员");location="/admin/index"</script>';exit;
            }
            session(['admin'=>$uname]);
            echo '<script>location="/admin/index"</script>';
        }else{
            return redirect('/admin/login')->with('message', 'wrong password!');

        }

    }

public function excel($uid){
        dump($uid);
        return view('admin.excel.add');
//    return redirect('/admin/login')->with('message', 'wrong password!');
}
public function excel_log(Request $request){

//        if ()
    $data = Excel_log::paginate(6);
//dd($data[0]['created_at']);
    return view('admin.excel_log',compact('data'));
}


public function excel_log_clearing(){
   $bool = DB::table('excel_log')->truncate();
       return redirect($_SERVER['HTTP_REFERER'])->with('1', 'clearing succeed');

}

    public function excel_log_derive(Request $request){

        if (empty($request->date)){
            $data = Excel_log::all();
        }else{
            $value = $request->date;
            $data = Excel_log::where('created_at','like','%'.$value.'%')->get();
            $data_count = count($data);
            if ($data_count == 0){
                return redirect($_SERVER['HTTP_REFERER'])->with('1', 'The date you selected was not found');exit;
            }
        }
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

public function user_list(){
    $data = User::paginate(8);
    return view('admin.user.index',compact('data'));
}

    public function exit()
    {
        //用户退出
        session()->pull('admin');
        return view('admin.login');
    }

}
