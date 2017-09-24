<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
header( "Content-type:text/html;Charset=utf-8" );


class StuinfController extends Controller
{
    public function select_stuinf(Request $request)
    {
        $stu_id=$request->stu_id;
        $username=\Auth::user()->name;
        $user = User::where('name', '=', $username)->first();
        $result=$user->hasRole(['teacher','admin']);
        if($result!==false){
            $res = \DB::select('select * from stuinf where stuid = ?', [$stu_id]);
            echo "查询结果如下:";
            dd($res);
        }else{
            $stu_id=$request->stu_id;
            $result=$user->hasRole(['student']);
            $res = \DB::select('select * from stuinf where name = ?', [$username]);
            $num=$res[0]->stuid;

            if($stu_id === $num){
                $res = \DB::select('select * from stuinf where stuid = ?', [$stu_id]);
                echo "查询结果如下:";
                dd($res);
            }else{
                echo "您无权查询他人信息",'[<a href="javascript:history.back()">点此返回</a> ]';
            }
            
        }
    }
    public function update_stuinf(Request $request)
    {
        
        $stu_name=$request->stu_name;
        $stu_id=$request->stu_id;
        $stu_class=$request->stu_class;
        $stu_banji=$request->stu_banji;

        $username=\Auth::user()->name;
        $user = User::where('name', '=', $username)->first();
        $result=$user->hasRole(['teacher','admin']);

        if($result!==false){
            $num = \DB::update('update stuinf set stuid =?,class=?,banji=? where name = ?',[$stu_id,$stu_class,$stu_banji,$stu_name]);
            if($num){
                echo "修改成功";
            }else{
                echo "修改失败";
            }

        }else{
            $result=$user->hasRole(['student']);
            if($username==$stu_name){
                $num = \DB::update('update stuinf set stuid =?,class=?,banji=? where name = ?',[$stu_id,$stu_class,$stu_banji,$username]);
                if($num){
                    echo "修改成功";
                }else{
                    echo "修改失败";
                }
            }else{
                echo "您无权修改他人信息",'[<a href="javascript:history.back()">点此返回</a> ]';
            }
        }
    }
    public function delete_stuinf(Request $request)
    {
        $stu_id=$request->stu_id;
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['teacher','admin']);
        if($result!==false){
            $num = \DB::delete('delete from stuinf where stuid = ?',[$stu_id]);
            if($num){
                echo "删除成功";
            }else{
                echo "删除失败";
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }
        
    }
    public function select_logs(Request $request)
    {
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['admin']);
        $logs_url="d:/Program Files (x86)/wamp/logs/mysql.log";
        if($result!==false){
            $res=file_get_contents($logs_url);
            dd($res);
            
            
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }
    }

    public function select_stuinf_index(){
        return view('select_stuinf_index');
    }
    public function delete_stuinf_index(){
        return view('delete_stuinf_index');
    }
    public function update_stuinf_index(){
        return view('update_stuinf_index');
    }

}

