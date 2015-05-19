<?php
    
    function getLastVisit(){
        
        //设置时区
        date_default_timezone_set("Asia/Chongqing");
        //首先看看cookie有没有上次登录信息
        if (!empty($_COOKIE['lastVisit']))  
            echo "你上次的登录时间是" . $_COOKIE['lastVisit'];
        else 
            echo "你是第一次登录";
        //保存cookie 一个月
        setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);
    }
?>