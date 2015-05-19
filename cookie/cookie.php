<?php
    
    //演示如何创建cookie信息
    //吧用户名和密码保存到client的cookie
    //cookie name = name,cookie content = tangrong ,how long=3600
    setcookie("name", "tangrong",time()+3600);
    setcookie("password", "123456",time()+3600);
    setcookie("address", "dazhou",time()+360);
    echo "保存成功";
?>