<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ URL::asset('assets/css/sidebar-menu.css') }}">
<link href="{{ URL::asset('assets/css/tree.css') }}" rel="stylesheet" type="text/css"/>
<style type="text/css">
.main-sidebar{
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  min-height: 100%;
  width: 230px;
  z-index: 810;
  background-color: #222d32;
 }
</style>

</head>
<body>
<aside class="main-sidebar">
<section  class="sidebar">
  <ul class="sidebar-menu">
    <li class="treeview">
    <a href="#">
       <span>公告</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ URL::to('/edit_msg_index') }}"><i class="fa fa-circle-o"></i>发布公告</a></li>
      <li><a href="{{ URL::to('/select_msg') }}"><i class="fa fa-circle-o"></i>查看公告</a></li>
    </ul>
    </li>
    <li class="treeview">
    <a href="#">
       <span>查询信息</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ URL::to('/spider_index') }}"><i class="fa fa-circle-o"></i>查询课表</a></li>
      <li><a href="{{ URL::to('/select_stuinf_index') }}"><i class="fa fa-circle-o"></i>查询学生信息</a></li>
    </ul>
    </li>
    </li>
    
    <li class="treeview">
    <a href="#">
      <span>管理员选项</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ URL::to('/delete_Permission_index') }}"><i class="fa fa-circle-o"></i>删除权限</a></li>
      <li><a href="{{ URL::to('/edit_Permission_index') }}"><i class="fa fa-circle-o"></i>增加权限</a></li>
      <li><a href="{{ URL::to('/delete_Role_index') }}"><i class="fa fa-circle-o"></i>删除角色</a></li>
      <li><a href="{{ URL::to('/edit_Role_index') }}"><i class="fa fa-circle-o"></i>增加角色</a></li>
      <li><a href="{{ URL::to('/update_Role_index') }}"><i class="fa fa-circle-o"></i>更新角色</a></li>
      <li><a href="{{ URL::to('/delete_permission_role_index')}}"><i class="fa fa-circle-o"></i>删除角色权限</a></li>
      <li><a href="{{ URL::to('/edit_permission_role_index') }}"><i class="fa fa-circle-o"></i>增加角色权限</a></li>
      <li><a href="{{ URL::to('/delete_user_role_index') }}"><i class="fa fa-circle-o"></i>删除用户角色</a></li>
      <li><a href="{{ URL::to('/edit_user_role_index') }}"><i class="fa fa-circle-o"></i>增加用户角色</a></li>
      <li><a href="{{ URL::to('/select_logs_index') }}"><i class="fa fa-circle-o"></i>查看mysql日志</a></li>

    </ul>
    </li>
    <li>
    <a href="{{ URL::to('/CountOnline') }}">
      <span>当前在线人数</span>
    </a>
    </li>
    <li>
    <a href="{{ URL::to('/excel/export') }}">
      <span>导出学生信息</span>
    </a>
    </li>
    <li>
    <a href="{{ URL::to('/2048_index')}}">
      <span>2048小游戏</span>
    </a>
    </li>
  </ul>
  </section>
 </aside>
<canvas id='canvas'>
    nihao
</canvas>


<script src="{{ URL::asset('assets/js/jquery-2.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/sidebar-menu.js') }}"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>

<script src="{{ URL::asset('assets/js/jquery-1.4.2.min.js') }}"type="text/javascript" charset="utf-8" async defer></script>
<script src="{{ URL::asset('assets/js/tree.js') }}"type="text/javascript" charset="utf-8" async defer></script>

</body>
</html>