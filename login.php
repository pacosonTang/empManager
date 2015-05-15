<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>用户登录</title>
</head>
<body>
    <h1>管理员登录 </h1>
    <form action="loginprocess.php" method="post">
                用户账号： <input name="username" type="text"/><br/><br/>
                用户密码： <input name="userpass" type="password"/><br/><br/>
      <button type="submit">提交</button>
      <button type="reset">重置</button>            
    </form>
    <?php 
        if(!empty($_GET['errno'])){
            $errno = $_GET['errno'];
            if($errno==1) 
                echo "<br/><font color='red'>你的 用户名和密码输入错误</font>";
        }
    ?>
</body>
</html>
 
