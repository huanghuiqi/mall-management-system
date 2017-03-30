<!--公共函数库-->
<?php
//消息提示
function alertMes($mes,$url){
    echo "<script type='text/javascript'>alert('{$mes}');window.location='{$url}'</script>";
}