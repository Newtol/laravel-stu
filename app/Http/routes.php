<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');//登陆页面路由
});
Route::get('home', function () {
    return view('home');//主页路由
});
Route::get('2048_index', function () {
    return view('2048_index');//2048游戏路由
});

Route::auth();


Route::get('edit_Role_index','Admin_RoleController@edit_Role_index');
Route::post('edit_Role','Admin_RoleController@edit_Role');//添加角色信息路由

Route::post('update_Role','Admin_RoleController@update_Role');
Route::get('update_Role_index','Admin_RoleController@update_Role_index');//更新角色信息路由

Route::post('delete_Role','Admin_RoleController@delete_Role');
Route::get('delete_Role_index','Admin_RoleController@delete_Role_index');//删除角色信息路由

Route::get('edit_Permission_index','PermissionController@edit_Permission_index');
Route::post('edit_Permission','PermissionController@edit_Permission');//编辑权限路由

Route::get('delete_Permission_index','PermissionController@delete_Permission_index');
Route::post('delete_Permission','PermissionController@delete_Permission');//删除权限路由

Route::get('edit_user_role_index','AdminPermissionController@edit_user_role_index');
Route::post('edit_user_role','AdminPermissionController@edit_user_role');//设置用户角色

Route::get('delete_user_role_index','AdminPermissionController@delete_user_role_index');
Route::post('delete_user_role','AdminPermissionController@delete_user_role');//删除用户角色

Route::get('edit_permission_role_index','AdminPermissionController@edit_permission_role_index');
Route::post('edit_permission_role','AdminPermissionController@edit_permission_role');//设置用户权限

Route::get('delete_permission_role_index','AdminPermissionController@delete_permission_role_index');
Route::post('delete_permission_role','AdminPermissionController@delete_permission_role');//删除用户权限

Route::get('spider_index','SpiderController@spider_index');
Route::post('spider','SpiderController@spider');//查询课表路由

Route::get('edit_msg_index','MsgController@edit_msg_index');
Route::post('edit_msg','MsgController@edit_msg');//发布公告路由

Route::get('select_stuinf_index','StuinfController@select_stuinf_index');
Route::post('select_stuinf','StuinfController@select_stuinf');//查询学生信息路由

Route::get('delete_stuinf_index','StuinfController@delete_stuinf_index');
Route::post('delete_stuinf','StuinfController@delete_stuinf');//删除学生信息路由

Route::get('update_stuinf_index','StuinfController@update_stuinf_index');
Route::post('update_stuinf','StuinfController@update_stuinf');//更新学生信息路由

Route::get('select_logs_index','StuinfController@select_logs');//查询数据库操作日志

Route::get('select_msg','MsgController@select_msg');//查看公告栏路由

Route::get('CountOnline','CountOnlineController@CountOnline');//查看在线人数

Route::get('excel/export','ExcelController@export');//导出学生信息路由





