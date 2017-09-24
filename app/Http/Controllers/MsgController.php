<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Msg;

class MsgController extends Controller
{
    public function edit_msg(Request $request)
    {
        $title=$request->title;
        $content=$request->content;
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['teacher','admin']);

        if($result!==false){
            if($title===""||$content==""){
                echo "请输入内容",'[<a href="javascript:history.back()">点此返回</a> ]';
            }else{
                $num = \DB::insert('insert into msgs (title,content,publisher) values(?,?,?)',[$title,$content,$user]);
                if($num){
                    return view('edit_msg_middle_index');
                }else{
                    echo "发布失败";
                }
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }
    }
    
    public function select_msg(Request $request){
        $result = \DB::select('select * from msgs'); 
        dd($result);

       
    
    }

    public function edit_msg_index(){
        return view('edit_msg_index');
    }
}
