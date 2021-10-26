<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserBlogPost;
use App\Model\User;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(8);
        return view('admin.user.index',['data'=>$data]);
    }

    public function create()
    {
//        dd('添加');
        return view('admin.user.add');

    }
    public function store(UserBlogPost $request)
    {
        //用户添加处理
        $tab = new User;
        $uname = $request->input('name','');//传过来的用户名
        $tab->name = $uname;
        $tab->phone = $request->input('phone','');
        $tab->permission = $request->input('permission','');
        $tab->status = $request->input('status',0);
        $tab->password = Hash::make($request->input('password',''));
        $sole = $tab->where('name','=',$uname)->get();
        if ($sole->count()){
            //判断用户是否存在
            $request->flashExcept('_token','password');
            return redirect($_SERVER['HTTP_REFERER'])->with('message', 'this user name already exists!');

//            echo '<script>alert("用户已存在！");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }else{
            if($tab->save()){
                $request->flashExcept('_token','password');
                return redirect($_SERVER['HTTP_REFERER'])->with('message', 'successfully added');

//                echo '<script>alert("添加成功");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
            }else{
                return redirect($_SERVER['HTTP_REFERER'])->with('message', 'fail to add!');
            }
        }

    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.user.edit',['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $tab = User::find($id);
        $uname = $request->input('name','');//传过来的用户名
        $tab->name = $uname;
        $tab->phone = $request->input('phone','');
        $tab->permission = $request->input('permission','');
        $sole = $tab->where('name','=',$uname)->get();
        if ($sole->count()){
            //判断用户是否存在
            echo '<script>alert("修改失败，用户已存在！");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }else{
            if($tab->save()){
                echo '<script>alert("修改成功");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
            }else{
                echo '<script>alert("修改失败！");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
            }
        }
    }

    public function del($id)
    {
        $flight = User::find($id);
        if ($flight->delete()){
            echo '<script>location="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }else{
            echo '<script>alert("删除失败");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }
    }

    public function pasword($id)
    {
        $data = User::find($id);
        return view('admin.user.password',['data'=>$data]);
    }
    public function doPasword(Request $request,$id)
    {
        if ($request->repassword != $request->password){
            echo '<script>alert("俩次的密码不一致！");location="'.$_SERVER['HTTP_REFERER'].'"</script>';exit;
        }
        $tab = User::find($id);
//        $tab->password =  $tab->password = $request->input('password','');
        $tab->password =  Hash::make($request->input('password',''));
        if($tab->save()){
            echo '<script>alert("修改成功");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }else{
            echo '<script>alert("修改失败");location="'.$_SERVER['HTTP_REFERER'].'"</script>';
        }

    }




}
