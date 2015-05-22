<?php
    
    //使用php 画出你的验证码
    $checkcode = "";
    for ($i =0;$i < 4; $i ++)
        $checkcode.=dechex(rand(1,15));//10进制转16进制
    //存入到
    //session_start();
    //$_SESSION['checkcode'] = $checkcode;
    
    //1. 创建画布
    $im = imagecreatetruecolor(110, 30);

    $white = imagecolorallocate($im, 255, 255, 255);
    
    //画出干扰线
    for ($i=0;$i < 20; $i ++){
        imageline($im, rand(0,110), rand(0,30), rand(0,30), rand(0,30), imagecolorallocate($im, 255, rand(0,150), rand(0,255)));
    }
    
    //imagestrring
    imagestring($im, rand(5,8), rand(0,30), rand(0,20), $checkcode, $white);
    header("content-type:image/png");
    imagepng($im);
    
    imagedestroy($im);
    
    
    