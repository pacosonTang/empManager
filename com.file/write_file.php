<?php
    
    //如何写文件
    
    /*1.传统的方法
    $file_path = "text.txt";
    if(file_exists($file_path)){
        //如果追加内容，用a+ append
        //如果全新写入, 用 w+ write
        $fp = fopen($file_path, "a+");
        //html 换行标识<br/>,而文本文件换行标识\r\n
        $con = "\r\n你好，唐荣2";
        fwrite($fp, $con);
        echo "<br/>写入成功！";
    }
    else {
        echo "文件打开失败";
    }
    if(isset($fp))
        fclose($fp);*/
    
    /*2.第二种方式写入文件*/
    $con = "\r\n你好，成都!";
    $file_path = "text.txt";
    if(file_exists($file_path)){
        //file_put_contents添加的内容最好是拼接好的内容，一次性写入（如for循环先拼接好了，再写入）。
        file_put_contents($file_path, $con, FILE_APPEND);
        echo "写入成功!";
    }
    //也无需关闭文件了，因为底层已经封装了，自动关闭文件指针。
    
    
    
?>