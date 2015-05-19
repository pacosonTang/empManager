<?php
    //初始化我们的session
    session_start() ;
    //删除某个session
    unset($_SESSION['name']);
    
    //删除所有的session,删除该浏览器对应的session文件[一个会话对应一个session文件]；
    session_destroy();
    
    echo "session delete成功";
    
?>

