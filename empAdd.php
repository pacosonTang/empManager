<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>添加用户</title>
</head>
<body>
    <h1>添加用户 </h1>
    <form action="./com.action/EmpAction.php" method="post">
        <table>
            <tr><td>名字：<input type="text" name="name"/></td></tr>
            <tr><td>性别：<input type="text" name="grade"/></td></tr>
            <tr><td>电邮：<input type="text" name="email"/></td></tr>
            <tr><td>工资：<input type="text" name="salary"/></td></tr>
            <tr><td><input type="hidden" name="flag" value="empAdd"/></td></tr>
            <tr><td><input type="submit" value="提交"/> <input type="reset" value="重置" /></td></tr>
        </table>
    </form>
</body>
</html>
 
