<?php 
    require_once 'AdminService.class.php';
    
    $username=$_POST['username'];
    $userpass=$_POST['userpass'];
    
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