<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>文件上传</title>
    </head>
<body>
	<h1>文件上传</h1>
	<!-- 文件上传要注意: （1）enctype （2）method post -->
	
	<form enctype="multipart/form-data" action="uploadProcess.php" method="post">
		用户账号： <input name="username" type="text" /><br />
		文件介绍： <br/><textarea name="fileinfo" rows="10" cols="80"></textarea>
		<br/>选择上传的文件:<input type="file" name="myfile"/><br/>
		<button type="submit">提交</button><br/>
	</form>
</body>
</html>

