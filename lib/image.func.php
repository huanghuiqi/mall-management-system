<?php
require_once 'string.func.php';
//通过GD库做验证码
    function verifyImage($type, $length,$sess_name = 'verify'){
    //创建画布
        $width = 80;
        $height = 28;
        $image = imagecreatetruecolor($width,$height);
        $white = imagecolorallocate($image,255,255,255);
        $black = imagecolorallocate($image,0,0,0);
    //用填充矩形填充画布
        imagefilledrectangle($image,1,1,$width-2,$height-2,$white);
        $chars = buildRandomString($type,$length);
        //保存在会话中 要进行比对的
        $_SESSION[$sess_name] = $chars;
        $fontfiles = "SIMYOU.TTF";
        for($i = 0 ; $i < $length ; $i++){
            $size = mt_rand(14,18);
            $angle = mt_rand(-15,15);
            $x = 5+$i*$size;
            $y = mt_rand(20,26);
            $fontfile = "../fonts/".$fontfiles;
            $color = imagecolorallocate($image,mt_rand(150,190),mt_rand(80,200),mt_rand(90,180));
            $text = substr($chars,$i,1);
            imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$text);
        }
        ob_clean();
        ob_clean();
        header("content-type:image/gif");
        imagegif($image);
        imagedestroy($image);
    }

//verifyImage(3,4);
?>