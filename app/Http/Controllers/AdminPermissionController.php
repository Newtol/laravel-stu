<?php

namespace App\Http\Controllers;

use EntrustUserTrait; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Role;
use App\Permission;
use App\User;



class AdminPermissionController extends Controller
{
    public function edit_user_role(Request $request){
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['admin']);
        if($result!==false){
            $username=$request->username;
            $rolename=$request->rolename;

            $user = User::where('name', '=', $username)->first();
            $user->attachRole($rolename);

            if($user){
                echo "添加成功";
            }else{
                echo "添加失败";
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }
    }

    public function delete_user_role(Request $request){
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['admin']);
        if($result!==false){

            $user_id=$request->user_id;
            $role_id=$request->role_id;
            $result = \DB::delete('delete from role_user where user_id =? and role_id=?',[$user_id,$role_id]);

            if($result){
                echo "删除成功";
            }else{
                echo "删除失败";
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }

    }

    public function edit_permission_role(Request $request){
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['admin']);
        if($result!==false){

            $username=$request->username;
            $rolename=$request->rolename;
            $user = Role::where('name', '=', $rolename)->first();

            $user->attachPermission($username);
            if($user){
                echo "添加成功";
            }else{
                echo "添加失败";
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }
    }

    public function delete_permission_role(Request $request){
        $user=\Auth::user()->name;
        $user = User::where('name', '=', $user)->first();
        $result=$user->hasRole(['admin']);
        if($result!==false){
            $permission_id=$request->permission_id;
            $role_id=$request->role_id;
            $result = \DB::delete('delete from permission_role where permission_id =? and role_id=?',[$permission_id,$role_id]);

            if($result){
                echo "删除成功";
            }else{
                echo "删除失败";
            }
        }else{
            echo "您没有权限进行此操作",'[<a href="javascript:history.back()">点此返回</a> ]';
        }

    }




    public function edit_user_role_index(){
        return view('edit_user_role_index');
    }
    public function delete_user_role_index(){
        return view('delete_user_role_index');
    }
    public function edit_permission_role_index(){
        return view('edit_permission_role_index');
    }
    public function delete_permission_role_index(){
        return view('delete_permission_role_index');
    }

}
