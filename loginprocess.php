<?php 
    require_once 'AdminService.class.php';
    
    $username=$_POST['username'];
    $userpass=$_POST['userpass'];
    //获取用户是否选中了保存name
    if(!empty($_POST['keepName'])) 
        //保存输入的username 到 cookie
        setcookie("username",$username,time()+7*2*24*3600);
    else 
        setcookie("username","",time() - 200);
    //实例化一个adminService 
    $adminService = new AdminService();
    if($adminService->checkAdmin($username, $userpass)){
        //合法，跳转到登录成功页面
         header("Location: empManage.php?email={$adminService->getEmail()}");
        //结束当前页面进程
        exit();
    }
    else { 
        header("Location: login.php");
    }  
?>