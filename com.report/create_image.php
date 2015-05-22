<?php

    //php绘图技术
    
    //1.创建画布,默认背景色是黑色
    $im = imagecreatetruecolor(800, 600);
    $red = imagecolorallocate($im, 255, 0, 0);
    
    //2.绘制需要的各种图形
    //2.1 椭圆
    //imageellipse($im, 20, 20, 40, 40, $red);
    //2.2 直线
    //imageline($im, 20, 20, 40, 40, $red);
    //2.3 矩形
    //imagerectangle($im, 20, 20, 40, 40, $red);
    //2.4 弧线
    //imagearc($im, 20, 20, 40, 40, 0,90, $red);
    
    //3 拷贝图片到画布
    //3.1加载原图片
    $image_name = "psu.jpg";
    $srcimage = imagecreatefromjpeg($image_name);
    
    //我们使用getimagesize()来获取图片大小
    $srcimage_info = getimagesize($image_name);
    //3.2 拷贝图片到目标画布
    imagecopy($im, $srcimage, 0, 0, 0, 0, $srcimage_info[0], $srcimage_info[1]);
    
    //4 把汉字写入 imagestring
    $str = "你好阳光";
    //imagestring($im, 5, 0, 0, "你好阳光", $red);
    $font  =  'MSYH.TTF' ;//字体文件在c:/windows/Font
    
    imagettftext($im, 30, 0, 20, 50, $red, $font, $str);
    
    //输出图像到网页，也可以另存为
    header("content-type:image/png");
    imagepng($im);
    
    //4.销毁该图片（释放内存）
    imagedestroy($im);
?>