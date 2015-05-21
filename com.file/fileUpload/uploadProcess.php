<?php

    //1.接收提交文件的用户
    $usernname = $_POST['username']; 
    $fileinfo = $_POST['fileinfo'];
    echo "username = ".$usernname.", fileinfo = ".$fileinfo."<br/>";
    //2.使用$_FILES
    
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>"; 
    //baidu 搜索 php上传文件类型与后缀名
    
    //获取文件的大小
    $file_size = $_FILES['myfile']['size'];//单位是字节
    if($file_size > 1024 * 1024 * 2){ // 不能上传大于 2M 的文件
        echo "不能上传大于 2M 的文件<br/>";
        exit();
    }
    
    //获取文件的类型
    /*
    $file_type = $_FILES['myfile']['type'];
    echo "file_type = ".$file_type;
    if($file_type != 'image/jpg' && $file_type != 'image/jpeg') {
        echo "文件类型不合适，只能是jpg 和 jpeg<br/>";
        exit();
    }*/
    
    //判断是否上传ok/**/
    if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {
        
        $uploaded_file = $_FILES['myfile']['tmp_name'];
        
        //给每个用户都动态的创建文件夹
        $user_path = $_SERVER['DOCUMENT_ROOT']."/com.file/fileUpload/".$usernname;
        
        //判断该用户是否有文件夹
        if(!file_exists($user_path))
            mkdir($user_path);
        
        
        //$move_to_file = $user_path."/".$_FILES['myfile']['name'];
        $file_name = $_FILES['myfile']['name'];
        $move_to_file = $user_path."/".time().rand(1, 1000).substr($file_name, 
            strrpos($file_name, "."));
        
        //echo "uploaded_file = ".$uploaded_file." , move_to_file = ".$move_to_file;
        if(move_uploaded_file($uploaded_file, iconv("utf-8", "gb2312", $move_to_file)))
            echo "文件".$_FILES['myfile']['name']."上传ok";
        else 
            echo "上传失败";
    }
    else 
        echo "上传失败";
?>