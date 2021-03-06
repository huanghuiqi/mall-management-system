<?php
require_once '../include.php';
$rows = getAllAdmin();  //获得所有的管理员
//var_dump($rows);
if(!$rows){
    alertMes("没有管理员，清先添加~","addAdmin.php");
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>-.-</title>
    <link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin()">
        </div>

    </div>
    <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th width="15%">编号</th>
            <th width="25%">管理员名称</th>
            <th width="30%">管理员邮箱</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($rows as $row):
        ?>
            <tr>
                <!--这里的id和for里面的c1 需要循环出来-->
                <td><input type="checkbox" id="c1" class="check"><label for="c1" class="label"><?php echo $i; ?></label></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['email']?></td>
                <td align="center"><input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row['id'];?>)"><input type="button" value="删除" class="btn"  onclick="delAdmin(<?php echo $row['id'];?>)"></td>
            </tr>
        <?php $i++; endforeach; ?>
        </tbody>
    </table>
</div>
</body>
<script type="text/javascript">
function editAdmin(id){
    window.location = "editAdmin.php?id=" + id;
}

function delAdmin(id){
    if(window.confirm("您确定要删除吗？删除后不能回复哦~")){
        window.location = "doAdminAction.php?act=delAdmin&id=" + id;
    }
}

function addAdmin(){
    window.location = "addAdmin.php";
}
</script>
</html>