<?php
    
    //打开文件
    $file_path = "text.txt";
    if($fp=fopen($file_path, "r")){
        //fstat文件状态信息
        $file_info = fstat($fp);
        echo "<pre>";
        print_r($file_info);
        echo "</pre>";
        echo "<br/>文件大小 {$file_info['size']}";
        //通过date来格式化时间
        echo "<br/>上次访问时间 ".date("Y-m-d H:i:s",$file_info['atime']);
        echo "<br/>上次修改时间 ".date("Y-m-d H:i:s",$file_info['mtime']);
        echo "<br/>上次创建时间 ".date("Y-m-d H:i:s",$file_info['ctime']);
        
    }
    else 
        echo  "文件打开失败";
    //关闭文件
    fclose($fp);
    
    //第二种方式获取文件信息
    echo "<br/>".filesize($file_path);
    echo "<br/>".fileatime($file_path);
    echo "<br/>".filectime($file_path);
    echo "<br/>".filemtime($file_path);
    
?>