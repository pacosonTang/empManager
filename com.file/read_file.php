<?php
    
   //读文件
   //打开文件
   $file_path = "text.txt";
   
   /* 第一种读取方式
   if(file_exists($file_path)) {
       $fp = fopen($file_path, "a+");

       //第一种读取方式
       $con = fread($fp, filesize($file_path));
       echo "文件的内容为：<br/>";
       //默认情况下，我们得到的内容不会换行，它不认识\r\n是换行符，\r\n-><br/>
      $con = str_replace("\r\n", "<br/>", $con); 
       
       echo $con;
   }
   else {
       echo " 文件不存在 ";
   }
   if(isset($fp))
        fclose($fp);*/
   
   /************** 第二种读取方式*************
   $con2  = file_get_contents($file_path);
   $con2 = str_replace("\r\n", "<br/>", $con2);
   echo $con2;*/
   
   
   /************** 第三种读取方式*************/
    $fp = fopen($file_path,"r");
    //我们设置一次读取1024个字节就可以了
    $buffer = 1024;
    //一边读，一边判断是否到达文件末尾    
    $str = "";
    while (!feof($fp)) 
        //读一行数据出来
        $str .= fread($fp, $buffer);
    $str = str_replace("\r\n", "<br/>", $str);
    echo $str;
    if(isset($fp))
        fclose($fp);
?>