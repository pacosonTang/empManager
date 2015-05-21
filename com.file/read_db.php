<?php

    //将数据读取出来封装到复合数组里面
    $arr = parse_ini_file("db.ini");
    print_r($arr);
    //Array ( [host] => 127.0.0.1 [user] => root [password] => root ) 
?>