
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>雇员信息列表</title>
<script type="text/javascript">

    //确认是否删除用户
    function confirmDel(val){
        return window.confirm("是否删除id为" + val + "的用户");
    }

</script>
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
        require_once 'Paging.class.php';
        
        //1.创建EmpService对象实例
        $empService = new EmpService();
        
        
        //先看看用户要分页还是删除
        if(!empty($_GET['flag'])){
            $id=$_GET['id'];
            echo "删除id = ".$id;
            $empService->delEmpById($id);
        }
        
        //2.创建分页对象
        $paging = new Paging();
        
        //2.1这里接收用户点击的pageNow
        if(!empty($_GET['pageNow']))
            $paging->setPageNow($_GET['pageNow']);
       
        //2.2调用分页功能
        $empService->getPaging($paging);
        
        //3.初始化page相关属性
        //3.1共有多少页
        $pageCount = $paging->getPageCount();
        //3.2当前页
        $pageNow = $paging->getPageNow();
        //3.3共有多少条记录
        $rowCount = $paging->getRowCount();
        //3.4 页面显示行数大小
        $pageSize = $paging->getPageSize();
        
        //分页取出数据,$res是个复合数组
        $res = $paging->getRes_array();
        for ($i=0;$i<count($res);$i++){
            $row = $res[$i];
            echo "<tr style='padding: 2px'>";
            for ($j = 0; $j < count($row); $j++) {
                echo "<td>".$row[$j]."</td>";
            }
            echo "<td><a onclick='return confirmDel($row[0])' href='./empList.php?flag=del&id=$row[0]'>删除</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='#'>修改</a></td>";
            echo "</tr>";
        }
        
        //关闭数据库连接
        //$empService->baseDao->close_conn();
        
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
        
        //可以使用for打印页面导航链接 1~10,11~20,...
        $index = floor( ($pageNow-1) / $pageSize )*$pageSize+1;
        //$start 1---10 ,11---20, 每10页作为一个显示集合
        for ($i=0; $i < $pageSize; $i++) {
            
            $start = $index + $i;
            echo "  <a href='./empList.php?pageNow=$start'>[$start]</a>  "; 
        }
        
        //整体向后翻10页；
        if ($pageNow < $pageCount) {
            $wholeAfterPage = floor(($pageNow + $pageSize - 1)/$pageSize) * $pageSize + 1;
            echo "  <a href='./empList.php?pageNow=$wholeAfterPage'>后翻10页>></a>  ";
        } 
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
 
