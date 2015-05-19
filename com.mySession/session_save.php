<?php
    
    require_once '../com.bean/Dog.php';
    echo "如何保存session数据<br/>";
    //1.初始化session
    session_start();
    //2.保存数据
    $_SESSION['name'] = "tangrong";
    $_SESSION['age'] = 100;
    $_SESSION['is_boy'] = true;
    $arr = array("背景", "dazhou");
    $_SESSION['myarr'] = $arr;
    
    //保存一个对象到Session文件
    
    $_SESSION['mydog'] = new Dog(" 唐多多 ", 100);
    echo "session 保存完毕";
?>

