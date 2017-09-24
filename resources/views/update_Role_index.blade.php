@extends('layouts.app')
@section('content')
<link href="{{ URL::asset('assets/css/form.css') }}" rel="stylesheet" type="text/css"/>

    <div class="content">
    <img src="{{ URL::asset('assets/imgs/index_top.jpg') }}" >
    <form action="update_Role" method="post">
        {!!csrf_field()!!}
        <input placeholder="输入需要修改的角色名" NAME="role_Name" TYPE="text"onmouseover="this.style.borderColor='black';this.style.backgroundColor='plum'" style="width: 106; height:50" onmouseout="this.style.borderColor='black';this.style.backgroundColor='#ffffff'" style="border-width:1px;border-color=black" CLASS="text">
        <input placeholder="输入该角色显示名称" NAME="display_Name" TYPE="text"onmouseover="this.style.borderColor='black';this.style.backgroundColor='plum'" style="width: 106; height:50" onmouseout="this.style.borderColor='black';this.style.backgroundColor='#ffffff'" style="border-width:1px;border-color=black" CLASS="text">
        <input placeholder="输入对该角色的描述" NAME="discription" TYPE="text"onmouseover="this.style.borderColor='black';this.style.backgroundColor='plum'" style="width: 106; height:50" onmouseout="this.style.borderColor='black';this.style.backgroundColor='#ffffff'" style="border-width:1px;border-color=black" CLASS="text">
        <input type="submit" value="修改" class="button">
    </form>
    </div>
@endsection


