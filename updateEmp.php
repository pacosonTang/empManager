<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>修改用户</title>
</head>
<body>
    <h1>修改用户 </h1>
    <?php 
        require_once 'EmpService.class.php';
        $id=$_GET['id'];
        
        $empService = new EmpService();
        $emp = $empService->getEmpById($id);
    ?>
    <form action="./com.action/EmpAction.php" method="post">
        <table>
            <tr><td><input type="hidden" name="id" value="<?php echo $emp->getId()?>"/></td></tr>
            <tr><td>名字：<input type="text" name="name" value="<?php echo $emp->getName()?>"/></td></tr>
            <tr><td>性别：<input type="text" name="grade" value="<?php echo $emp->getGrade()?>"/></td></tr>
            <tr><td>电邮：<input type="text" name="email" value="<?php echo $emp->getEmail()?>"/></td></tr>
            <tr><td>工资：<input type="text" name="salary" value="<?php echo $emp->getSalary()?>"/></td></tr>
            <tr><td><input type="hidden" name="flag" value="empUpdate"/></td></tr>
            <tr><td><input type="submit" value="提交"/> <input type="reset" value="重置" /></td></tr>
        </table>
    </form>
</body>
</html>
 
