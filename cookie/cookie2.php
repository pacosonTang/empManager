<?php
    //获得cookie信息
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";
    //获取指定的键对应的值
    if(!empty($_COOKIE['name']))
        echo "name = ".$_COOKIE['name'];
    else 
        echo "cookie 已经 关闭了";   
     
?>