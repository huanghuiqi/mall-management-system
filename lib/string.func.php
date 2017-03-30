<?php
function buildRandomString($type=1,$length=4){
    //生成随机字符串验证码
//    $type = 1;
//    $length = 4;
    if($type == 1){
        $chars = join("",range(0,9));   //数字字符串
    }elseif($type == 2){
        $chars = join("",array_merge(range('a','z'),range('A','Z')));
    }elseif($type == 3){
        $chars = join("",array_merge(range(0,9),range('a','z'),range('A','Z')));
    }
    if($length > strlen( $chars )){
        exit("字符串长度不够");
    }
    $chars = str_shuffle($chars);  //随机打乱
    return substr($chars,0,$length);
}


