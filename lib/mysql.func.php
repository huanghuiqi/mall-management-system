<?php
header("content-type:text/html;charset=utf-8");   //解决乱码
//连接数据库
require_once '../configs/configs.php';

function connect(){
    $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME,DB_PORT) or die ("数据库连接错误".mysqli_connect_error());
    mysqli_set_charset($link,DB_CHARSET);
    mysqli_select_db($link,DB_DBNAME) or die("指定数据库打开失败");
    return $link;
}


//记录的增删改查
function insert($table,$array){
    $link = connect();
    $keys = join(',',array_keys($array));
    $vals = "'".join("','",array_values($array))."'";
    $sql = "insert into {$table} ($keys) values ({$vals})";
    mysqli_query($link,$sql);  //执行一条 MySQL 查询

//    $keys = join(',',array_keys($array));
//    $val = array_values($array);
//    $name = '"'.$val[0].'"';
//    $key = '"'.$val[1].'"';
//    $email = '"'.$val[2].'"';
//    $sql = "insert into `{$table}`($keys) values($name,$key,$email)";
//    var_dump($sql);
//    mysqli_query($link,$sql);
    return mysqli_insert_id($link);  //返回上一步 INSERT 操作产生的 ID
    //return $sql;
}

//insert($table='imooc_admin',$array=array('name'=>'mimi','password'=>'1234','email'=>'1234'));

//记录更新操作

function update($table,$array,$where = null){
    $link = connect();
    $str="";
    foreach ($array as $key => $val){
        if($str == null){
            $sep = "";
        }else{
            $sep = ",";
        }
        $str.=$sep.$key.'="'.$val.'"';
    }
    $sql = "update {$table} set {$str}".($where==null ? null : " where ".$where);
    //var_dump($sql);
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link); //返回前一次 MySQL 操作（SELECT、INSERT、UPDATE、REPLACE、DELETE）所影响的记录行数。
}
//update('imooc_admin',$array=array('username'=>'ahjuaaa','email'=>'1234'),"id=4");

//删除操作
function delete($table,$where = null){
    $link = connect();
    $where = $where == null ? null : "where ".$where;
    $sql = "delete from {$table} {$where}";
    //var_dump($sql);
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}

//得到指定一条记录的操作
function fetchOne($sql){
    $link = connect();
    $res = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($res);  //从结果集中取得一行作为关联数组 该数据指针是从 mysqli_query() 返回的结果。
    return $row;
}

//得到结果集的所有记录
function fetchAll($sql){
    $link = connect();
    $rows = '';
    $res = mysqli_query($link,$sql);
    while($row = mysqli_fetch_assoc($res)){
        $rows[] = $row;
    }
    return $rows;
}

//得到结果集的所有记录的条数
function getResultNum($sql){
    $link = connect();
    $result = mysqli_query($link,$sql);
    return mysqli_num_rows($result);
}