<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
</head>
<body style="background-color: blue">
    <form action="{{ url('show') }}" method="POST">
        {{ csrf_field() }}
        <input type="text" id="name" name="name" style="width: 200px; height: 60px; ">
        <input type="submit" value="提交" style="background-color: white; width: 200px; height: 60px;">
    </form>
</body>
</html>