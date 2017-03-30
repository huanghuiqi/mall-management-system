<?php
require_once '../include.php';
$sql = "select * from imooc_admin";
$totalRows = getResultNum($sql);
//echo $totalRows;
$pageSize = 2;   //定义每页只有三条数据
$totalPage = ceil($totalRows/$pageSize);   //总页码数
$page = $_REQUEST['page'] ? (int)$_REQUEST['page'] : 1;
//is_numeric 检测是否是数字或字符
if($page < 1 || $page == null || !is_numeric($page)){
    $page = 1;
}elseif($page > $totalPage){
    //如果大于最大页码
    $page = $totalPage;
}
$offset = ($page-1)*$pageSize;   //第一页就从0开始 第二页就从2开始
$sql = "select * from imooc_admin limit {$offset},{$pageSize}";
$rows = fetchAll($sql);
//var_dump($rows);

?>