<?php
    
    echo "<h1>购物车商品有</h1>";
    
    //这里不能让服务器创建一个新的 session
    if(!empty($_GET['PHPSESSID']))
        session_id($_GET['PHPSESSID']);
    
    session_start();
    
    foreach ($_SESSION as $key=>$val)
        echo "<br/>书号: $key 书名: $val";
?>