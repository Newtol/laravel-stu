<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Permission;
use App\User;

class PermissionController extends Controller
{
    public function edit_Permission(Request $request){
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['admin']);
        if($result!==false){
            $name=$request->permission_Name;
            $display_name=$request->display_name;
            $discription=$request->discription;

            $createPost = new Permission();
            $createPost->name = $name;
            $createPost->display_name = $display_name;
            $createPost->description = $discription;
            $createPost->save();
            if($createPost){
                echo "权限编辑成功";
            }else{
                echo "权限编辑失败";
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }
    }
    public function delete_Permission(Request $request){
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['admin']);
        if($result!==false){
            $name=$request->permission_Name;
            $result = \DB::delete('delete from permissions where name = ?',[$name]);
            if($result){
                echo "删除成功";
            }else{
                echo "删除失败";
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }

    }


    public function edit_Permission_index(){
        return view('edit_Permission_index');
    }
    public function delete_Permission_index(){
        return view('delete_Permission_index');
    }
}

