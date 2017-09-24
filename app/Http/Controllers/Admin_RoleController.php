<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Spider;
use App\Role;
use App\Permission;
use App\User;



header( "Content-type:text/html;Charset=utf-8" );

class Admin_RoleController extends Controller
{

    public function edit_Role(Request $request){
        //权限检查
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['admin']);
        if($result!==false){

        //获取角色信息
            $name=$request->role_Name;
            $display_name=$request->display_name;
            $discription=$request->discription;

        //添加角色
            $admin = new Role();
            $admin->name = $name;
            $admin->display_name = $display_name;
            $admin->description = $discription;
            $res = $admin->save();

        //判断是否添加成功
            if($res!==false){
                echo "添加成功";
            }else{
                echo "添加失败";
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }
    }   
    public function update_Role(Request $request){
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['admin']);
        if($result!==false){
        //获取角色信息
            $name=$request->role_Name;
            $display_name=$request->display_name;
            $discription=$request->discription;

        //更新角色
            $result = \DB::update('update roles set name =?,display_name=?,description=? where name = ?',[$name,$display_name,$discription,$name]);
        //判断是否更新成功
            if($result){
                echo "更新成功";
            }else{
                echo "更新失败";
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }
    }
    public function delete_Role(Request $request){

        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['admin']);
        if($result!==false){

            $name=$request->role_Name;
            $res = \DB::delete('delete from roles where name = ?',[$name]);
            if($res){
                echo "删除成功";
            }else{
                echo "删除失败";
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }



    }

    











    public function edit_Role_index(){
        return view('edit_Role_index');
    }

    public function update_Role_index(){
        return view('update_Role_index');
    }
    public function delete_Role_index(){
        return view('delete_Role_index');
    }
}
