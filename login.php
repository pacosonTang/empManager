<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>用户登录</title>
</head>
<body>
	<h1>管理员登录</h1>
	<h2>
		<a href="index.php">首页</a>
	</h2>
	<form action="loginprocess.php" method="post">
		用户账号： <input name="username" type="text"
			value="<?php echo getCookieName('username')?>" /><br />
		<br /> 用户密码： <input name="userpass" type="password" /><br />
		<br /> 验证码： <input name="checkcode" type="text" />
		<img src="image/code_chart.php" onclick="this.src='image/code_chart.php?aa='+Math.random()"/><br />
		<br /> 是否保存用户名<input type="checkbox" name="keepName" value="yes" />
		<button type="submit">提交</button>
		<button type="reset">重置</button>
	</form>
    <?php
    if (! empty($_GET['errno'])) {  
        $errno = $_GET['errno'];
        if ($errno == 1)
            echo "<br/><font color='red'>你的 用户名和密码输入错误</font>";
        else if ($errno == -1)
            echo "<br/><font color='red'>您输入的验证码错误!</font>";
    }

    function getCookieName($key)
    {
        if (! empty($_COOKIE[$key]))
            return $_COOKIE[$key];
        else
            return "";
    }
    ?>
</body>
</html>

