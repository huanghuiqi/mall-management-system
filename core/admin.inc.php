<!--一些登录验证的操作-->
<?php
//验证是否有这个管理员
function checkAdmin($sql){
    return fetchOne($sql);
}

//检测是否有登录  如果直接打开index.php检测到没登录就跳到Login.php
function checkLogined(){
    if($_SESSION['adminId'] == "" && $_COOKIE['adminId'] == ""){
        alertMes("请先登录","login.php");
    }
}

//注销管理员操作
function logout(){
    $_SESSION = array();  //让session成为一个空数组

    //清除session的内容
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-1);
    }

    //清除cookie的内容
    if(isset($_COOKIE['adminName'])){
        setcookie('adminName','',time()-1);
    }

    if(isset($_COOKIE['adminId'])){
        setcookie('adminId','',time()-1);
    }
    session_destroy();
    header("location:login.php");
}

//添加管理员
function addAdmin(){
    $arr = $_POST;
    //$arr['password'] = md5($_POST['password']);  //加密密码

    if(insert('imooc_admin',$arr)){
        $mes = "添加成功<br/><a href='addAdmin.php'>继续添加</a> | <a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes = "添加失败<br/><a href='addAdmin.php'>重新添加</a> ";
    }
//    insert('imooc_admin',$arr);
//    $mes = "添加成功<br/><a href='addAdmin.php'>继续添加</a> | <a href='listAdmin.php'>查看管理员列表</a>";
    return $mes;
}

//得到所有的管理员
function getAllAdmin(){
    $sql = "select id,username,email from imooc_admin";
    $rows = fetchAll($sql);
    return $rows;
}

//编辑管理员
function editAdmin($id){
    $rows = $_POST;
    if(update('imooc_admin',$rows,"id={$id}")){
        $mes = "修改成功<br/><a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes = "修改失败，请重新修改<br/><a href='listAdmin.php'>重新修改</a> ";
    }
    return $mes;
}

//删除管理员
function delAdmin($id){
    if(delete('imooc_admin',"id={$id}")){
        $mes = "删除成功<br/><a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes = "删除失败<br/><a href='listAdmin.php'>重新删除</a>";
    }
    return $mes;
}