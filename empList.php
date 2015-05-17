
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
        require_once 'EmpService.class.php';
        
        //显示pageSize=5 pageNow=2
        $pageSize = 10; //每页显示的记录数目
        $rowCount = 0; //多少条记录
        $pageNow = 1; //显示第几页
        $pageCount = 0;//共有多少页
        
        //这里接收用户点击的pageNow
        if(!empty($_GET['pageNow']))
            $pageNow = $_GET['pageNow'];
        
        $empService = new EmpService();
        //共有多少条记录
        $rowCount = $empService->getRowCount();
        
        //计算共有多少页
        $pageCount = $empService->getPageCount($pageSize);

        //分页取出数据,$res是个复合数组
        $res = $empService->getPerPage($pageNow, $pageSize);
        for ($i=0;$i<count($res);$i++){
            $row = $res[$i];
            echo "<tr style='padding: 2px'>";
            for ($j = 0; $j < count($row); $j++) {
                echo "<td>".$row[$j]."</td>";
            }
            echo "<td><a href='#'>删除</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'>修改</a></td>";
            echo "</tr>";
        }
        $empService->baseDao->close_conn();
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
        
        //整体向前翻10页；
        if ($pageNow > 10) {
            $wholePrePage = floor(($pageNow + $pageSize - 1)/$pageSize - 2) * $pageSize + 1;
            echo "  <a href='./empList.php?pageNow=$wholePrePage'><<前翻10页</a>  ";
        }
        
        //可以使用for打印链接
        $index = floor( ($pageNow-1) / $pageSize )*$pageSize+1;
        //$start 1---10 ,11---20, 每10页作为一个显示集合
        for ($i=0; $i < $pageSize; $i++) {
            
            $start = $index + $i;
            echo "  <a href='./empList.php?pageNow=$start'>[$start]</a>  "; 
        }
        
        //整体向后翻10页；
        if ($pageNow < $pageCount)
            $wholeAfterPage = floor(($pageNow + $pageSize - 1)/$pageSize) * $pageSize + 1;
            echo "  <a href='./empList.php?pageNow=$wholeAfterPage'>后翻10页>></a>  "; 
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
 
