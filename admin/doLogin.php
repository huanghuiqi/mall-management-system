<?php
require_once '../include.php';
//session_start();
$username = $_POST['username'];
$password = $_POST['password'];
//$password = md5($_POST['password']);
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];
$autoFlag = $_POST['autoFlag'];  //自动登录

if($verify == $verify1){
    $sql = "select * from imooc_admin where username = '{$username}' and password = '{$password}'";
    $row = checkAdmin($sql);  //返回的是一个数组里面有id用户名密码邮箱
//    print_r($res);
//    var_dump($res);
    if($row){
        //如果选择了自动登录，就把它放到cookie中
        if($autoFlag){
            setcookie('adminId',$row['id'],time()+7*24*3600);
            setcookie('adminName',$row['username'],time()+7*24*3600);
        }
        //将用户名保存到session中，等跳转到首页的时候显示用户名
        $_SESSION['adminName'] = $row['username'];
        $_SESSION['adminId'] = $row['id'];
        header("location:index.php");
    }else{
        alertMes("登录失败，请重新登录！","login.php");
    }
}else{
    alertMes("验证码错误，请重新登录！","login.php");
}

