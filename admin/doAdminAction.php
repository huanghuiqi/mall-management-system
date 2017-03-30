<?php
require_once '../include.php';
//后台首页的前进后退注销刷新那些
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];
if($act == 'logout'){
    //登出
    logout();
}elseif ($act == 'addAdmin'){
    //添加管理员
    $mes = addAdmin();
}elseif($act == 'editAdmin'){
    //修改管理员
    $mes = editAdmin($id);
}elseif($act = 'delAdmin'){
    //删除管理员
    $mes = delAdmin($id);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    if($mes){
        echo $mes;
    }
?>
</body>
</html>
