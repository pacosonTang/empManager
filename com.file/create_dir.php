<?php
    
    // 文件及文件夹的创建和删除
    
    /*1. 创建文件夹 d:/tangrong_php
    $dir_path = "d:/tangrong-php";
    if(!is_dir($dir_path)){
        if (mkdir($dir_path))
            echo "创建文件夹成功哦!<br/>";
        else 
            echo "创建文件夹失败<br/>";
    }
    else 
        echo "该文件夹已经存在<br/>";*/
    
    /*2.递归创建多级文件夹 
    $dir_path = "d:/tangrong-php/aaa/bbb/ccc/ddd";
    if(!is_dir($dir_path)){
        if (mkdir($dir_path,0777,true))
            echo "创建文件夹成功哦!<br/>";
        else
            echo "创建文件夹失败<br/>";
    }
    else
        echo "该文件夹已经存在<br/>"; */
    
    
    /*3.删除文件夹
    /**
     * attention:
     * 如果文件夹下面有文件或子文件，均不能删除成功
     
    $dir_path = "d:/tangrong-php/aaa/bbb/";
    if(is_dir($dir_path)){
        if (rmdir($dir_path))
            echo " 删除  文件夹成功哦!<br/>";
        else
            echo " 删除  文件夹失败<br/>";
    }
    else
        echo "该文件夹 不 存在<br/>"; */
    
    //4.文件的创建
    //在d://tangrong_php2 下，创建hello
    /*
    $file_path = "d:/tangrong-php/aa.txt";
    $fp = fopen($file_path, "w+");
    $con = "\r\n你好，唐荣2";
    fwrite($fp, $con);
    echo "<br/>写入成功！";
     
    if(isset($fp))
        fclose($fp);*/
    
    /*删除文件*/
    $file_path = "d:/tangrong-php/aa.txt";
    if(is_file($file_path)){
        if(unlink($file_path))
            echo "<br/>delete suc";
        else{
            echo "<br/>delete failure!";
        }
    }
    else
        echo "the file not existing";
    
?>