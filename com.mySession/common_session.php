<?php
    function checkUserValidate(){
        //启用session
        session_start();
       if(empty($_SESSION['loginuser']))
            //跳转页面
           header("Location: login.php?errno=0");
    }