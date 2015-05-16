
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>雇员信息列表</title>
</head>
<body>
     <h2><a href="index.php">首页</a></h2>
    <table border="1" style="border-color: green;padding: 0px;">
        <tr style="padding: 2px">
            <th>用户编号</th>
            <th>用户姓名</th>
            <th>邮件</th>
            <th>工资</th>
            <th>性别</th>
            <th>CRUD 操作</th>
        </tr>
    
    <?php 
         echo "=== 想数据库中插入数据项 ===<br/>";
        $db = new mysqli( "localhost", "root", "root", "emp_manager" );
        if( $db -> connect_errno )
            die( $db -> connect_errno );
        echo "=== 连接数据库成功 ===<br/>";
        $db -> query( "set names utf8" );
        
        //显示pageSize=5 pageNow=2
        $pageSize = 8; //每页显示的记录数目
        $rowCount = 0; //多少条记录
        $pageNow = 1; //显示第几页
        $pageCount = 0;//共有多少页
        
        //这里接收用户点击的pageNow
        if(!empty($_GET['pageNow']))
            $pageNow = $_GET['pageNow'];
        
        $sql ="select count(id) from emp";
        //取出行数
        if($res1 = $db->query($sql))
            if($row=$res1->fetch_row())
                $rowCount = $row[0];
        //计算共有多少页
        $pageCount = ceil($rowCount/$pageSize);

        $sql = "select * from emp limit ".($pageNow-1)*$pageSize.",".$pageSize;
        
        if($res = $db->query($sql)) {
            echo "取出密码成功<br/>";
            while( $row = $res->fetch_assoc() ) {
                echo "<tr style='padding: 2px'>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['salary']."</td>";
                echo "<td>".$row['grade']."</td>";
                echo "<td><a href='#'>删除</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'>修改</a></td>";
                echo "</tr>";
            }
            $res->close();
        }
        $db->close();
        /* echo "<tr><td colspan='6'>";
        for ($i=1;$i<=$pageCount;$i++)
            echo "  <a href='./empList.php?pageNow=$i'>".$i."</a>  ";
        echo "</td></tr>"; */
        
        //上一页或下一页
        echo "<tr><td colspan='6'>";
        if($pageNow>1) {
             $prepage = $pageNow - 1;
             echo "  <a href='./empList.php?pageNow=$prepage'>上一页</a>  ";
        }
            
        if($pageNow<$pageCount) {
            $nextpage = $pageNow + 1;
            echo "  <a href='./empList.php?pageNow=$nextpage'>下一页</a>  ";
        }
        
        //显示当前多少页
        echo "<br/>当前第".$pageNow."页/共".$pageCount."页";
        echo "</td></tr>";
    ?>
    </table>
    <!-- 跳转到某一页 -->
    <form action="./empList.php" method="get">
                        跳转到第&nbsp;<input name='pageNow'/>&nbsp;页
        <button type="submit">go</button>
    </form>
</body>
</html>
 
