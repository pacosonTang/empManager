<?php

    //思路outline（先画出扇形）
    
    //1.创建画布,默认背景色是黑色
    $im = imagecreatetruecolor(800, 600);
    //1.1 修改画布颜色
    $white = imagecolorallocate($im, 255, 255, 255);//白色
    imagefill($im, 0, 0, $white);
    
    //2.画出扇形
    //2.1 创建三个颜色 
    $red = imagecolorallocate($im, 255, 0, 0);//红色
    $darkred = imagecolorallocate($im, 144, 0, 0);//暗红色
    $blue = imagecolorallocate($im, 0, 0, 128);//蓝色
    $darkblue = imagecolorallocate($im, 0, 0, 80);//暗蓝色
    $gray = imagecolorallocate($im, 192, 192, 192);//灰色
    $darkgray = imagecolorallocate($im, 144, 144, 144);//暗灰色
    
    //2.2 画出实心扇形
    for ($i = 60; $i >= 50 ; $i--) {
        imagefilledarc($im, 100, $i, 100, 50, 0, 35, $darkgray, IMG_ARC_PIE);
        imagefilledarc($im, 100, $i, 100, 50, 35, 80, $darkblue, IMG_ARC_PIE);
        imagefilledarc($im, 100, $i, 100, 50, 80, 360, $darkred, IMG_ARC_PIE);
    }
    //在上面加个盖子
    imagefilledarc($im, 100, 50, 100, 50, 0, 35, $gray, IMG_ARC_PIE);
    imagefilledarc($im, 100, 50, 100, 50, 35, 80, $blue, IMG_ARC_PIE);
    imagefilledarc($im, 100, 50, 100, 50, 80, 360, $red, IMG_ARC_PIE);
    
    //3 输出图像到网页，也可以另存为
    header("content-type:image/png");
    imagepng($im);
    
    //4.销毁该图片（释放内存）
    imagedestroy($im);
?>