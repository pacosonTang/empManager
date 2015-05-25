<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>查询单词</title>
</head>
<body>
    <h1>查询单词</h1>
    <form action="wordProcess.php" method="post">
                        请输入英文单词：<input type="text" name="enword"/>
        <input type="hidden" name="type" value="query"/>
        <input type="submit" value="查询"/> 
    </form>
    
    <hr>
    
    <h1>添加单词</h1>
    <form action="wordProcess.php" method="post">
                        请输入英文：<input type="text" name="enword"/><br/>
                        请输入中文：<input type="text" name="chword"/><br/>
        <input type="hidden" name="type" value="add"/>
        <input type="submit" value="添加词库"/> 
    </form>
    
</body>
</html>

