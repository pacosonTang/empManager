<?php 
    $username=$_POST['username'];
    $userpass=$_POST['userpass'];
    
    $db = new mysqli( "localhost", "root", "root", "emp_manager" );
    if( $db -> connect_errno )
        die( $db -> connect_errno );
    $db -> query( "set names utf8" );
    
    //取出密码，同用户输入的密码进行比较
    $sql = "select password, email from admin where name = '$username'";
    
    if($res = $db->query($sql)) {
        echo "取出密码成功<br/>";
        if($row = $res->fetch_assoc()) {
            if($row['password']==md5($userpass)){
                sleep(3);
                $email = $row['email'];
                header("Location: empManage.php?email=$email");
                exit();
            }
            header("Location: login.php");
            exit();
        }
        $res->close();
    }
    echo "关闭数据库连接<br/>";
    $db -> close();
    
    /* if($username == "1990" && $userpass=="123"){
        //合法，跳转到登录成功页面
        header("Location: loginsuc.php");
        //结束当前页面进程
        exit();
    }
    else { 
        header("Location: login.php");
    } */  
?>