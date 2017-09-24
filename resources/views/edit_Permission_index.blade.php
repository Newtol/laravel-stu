@extends('layouts.app')
@section('content')
<link href="{{ URL::asset('assets/css/form.css') }}" rel="stylesheet" type="text/css"/>

    <div class="content">
    <img src="{{ URL::asset('assets/imgs/index_top.jpg') }}" >
    <form action="edit_Permission" method="post">
        {!!csrf_field()!!}
        <input placeholder="输入需要增加的权限名" NAME="permission_Name" TYPE="text"onmouseover="this.style.borderColor='black';this.style.backgroundColor='plum'" style="width: 106; height:50" onmouseout="this.style.borderColor='black';this.style.backgroundColor='#ffffff'" style="border-width:1px;border-color=black" CLASS="text">
        <input placeholder="输入权限显示名称" NAME="display_name" TYPE="text"onmouseover="this.style.borderColor='black';this.style.backgroundColor='plum'" style="width: 106; height:50" onmouseout="this.style.borderColor='black';this.style.backgroundColor='#ffffff'" style="border-width:1px;border-color=black" CLASS="text">
        <input placeholder="输入对权限的描述" NAME="discription" TYPE="text"onmouseover="this.style.borderColor='black';this.style.backgroundColor='plum'" style="width: 106; height:50" onmouseout="this.style.borderColor='black';this.style.backgroundColor='#ffffff'" style="border-width:1px;border-color=black" CLASS="text">
        <input type="submit" value="增加" class="button">
    </form>
    </div>
@endsection


 