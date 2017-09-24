
<script src="{{ URL::asset('https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js') }}"type="text/javascript" charset="utf-8" async defer></script>
@include('editor::head')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1 style="color:white;background-color:#525D76;font-size:44px;text-align: center;margin:auto">发布公告</h1>
    
    <form action="edit_msg" method="post" class="editor">
        {!!csrf_field()!!}
        <p>
            标题:<input type="text" name="title">
        </p>
        <p>
            内容:<textarea name="content" id="myEditor"></textarea>
        </p>
        <input type="submit" value="发布">
    </form>
</body>
</html>


