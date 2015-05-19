<?php
    
    require_once '../com.bean/Dog.php';
    echo "如何保存session数据<br/>";
    //1.初始化session
    session_start();
    //2.保存数据
    $_SESSION['name'] = "tangrong_updated";
    
    echo "session 更新成功";
?>

