<?php

    //也可以使用isset
    if(!empty($_GET['PHPSESSID'])) 
        session_id($_GET['PHPSESSID']);
    
    //创建session文件 
    session_start();
    
    //如果用户禁用了cookie，我们要自行传递共享的session id
    $sid = session_id();
    
    //要使用SID全局变量，要在php.ini 里面 设置 session.use_trans_sid = 1 
    //系统提供的常量SID=='PHPSESSID=session_id()'
    /*
    echo "SID = ".SID;//PHPSESSID=e8uq5tmivthioionivtf7taab6
    echo "<br/>sid = ".$sid;
            不过貌似
    */
    echo "<h1>欢迎购买</h1>";
    //echo "<a href='BookProcess.php?bookid=bk1&bookname=天龙八部&PHPSESSID=$sid'>天龙八部</a><br/>";
    echo "<a href='BookProcess.php?bookid=bk1&bookname=天龙八部&PHPSESSID=$sid'>天龙八部</a><br/>";
    echo "<a href='BookProcess.php?bookid=bk2&bookname=红楼梦&PHPSESSID=$sid'>红楼梦</a><br/>";
    echo "<a href='BookProcess.php?bookid=bk3&bookname=西游记&PHPSESSID=$sid'>西游记</a><br/>";
    echo "<a href='BookProcess.php?bookid=bk4&bookname=聊斋&PHPSESSID=$sid'>聊斋</a><br/>";
    echo "<hr/>";
    echo "<a href='cart.php?PHPSESSID=$sid'>查看购物车</a>";
 
 ?>