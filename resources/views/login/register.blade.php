<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title>注册</title>
</head>
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

<body>
<form role="form" method="post" action="" >
    <div class="form-group">
        <label for="name">名称</label>
        <input type="text" class="form-control" style="width:700px;" id="name" name="username" placeholder="请输入用户名">
    </div>
    <div class="form-group">
        <label for="name">密码</label>
        <input type="password" class="form-control" style="width:700px" id="name" name="password" placeholder="请输入密码">
    </div>
    <div class="form-group">
        <label for="name">确认密码</label>
        <input type="password" class="form-control" style="width:700px" id="name" name="repassword" placeholder="请确认密码">
    </div>

    <button type="submit" class="btn btn-default">注册</button>
</form>

</body>
</html>

