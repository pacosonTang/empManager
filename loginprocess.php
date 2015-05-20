<?php 
    require_once 'AdminService.class.php';
    if(empty($_POST['checkcode'])) {
        header("Location: login.php?errno= -1");
        exit();
    }
    session_start();//启动会话
    $code=$_POST["checkcode"];
    //判断验证码是否正确
    if( !($code == $_SESSION["checkcode"]) ) {
        header("Location: login.php?errno=-1");
        exit();
    }
     
  
    
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
        session_start();
        $_SESSION['loginuser'] = $username;
        header("Location: empManage.php?email={$adminService->getEmail()}");
        //结束当前页面进程
        exit();
    }
    else { 
        header("Location: login.php?errno=1");
        exit();
    }  
?>