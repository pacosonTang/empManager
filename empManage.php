<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>雇员管理主页面</title>
</head>
<body>
    <?php 
        require_once 'cookie/cookie_alert.php';
        require_once 'com.mySession/common_session.php';
        //得到上一次登录的时间
        getLastVisit();
        
        //检测用户是否登录
        checkUserValidate();
        echo "<br/>";
    ?>
    <h1><?php echo $_GET['email']?>登录成功</h1><br/>
    <a href='login.php'>重新返回登录页面</a><br/>
    <h1>主界面</h1>
    <a href="./empAdd.php">添加用户</a><br/>
    <a href='empList.php'>查看用户</a><br/>
</body>
</html>
