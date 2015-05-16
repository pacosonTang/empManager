<?php
    echo "<h2><a href='../index.php'>首页</a></h2>";
    echo "=== 想数据库中插入数据项 ===<br/>";
    $db = new mysqli( "localhost", "root", "root", "emp_manager" );
    if( $db -> connect_errno )
        die( $db -> connect_errno );
    echo "=== 连接数据库成功 ===<br/>";
    $db -> query( "set names utf8" );
     
    $sql = "insert into emp(name,password,email,salary,grade) values(?,?,?,?,?)";
    $stmt = $db->prepare($sql);
    if (! $stmt -> bind_param ( "sssdi", $name, $userpass, $email, $salary, $grade)){
        echo  "Binding parameters failed: ("  .  $stmt -> errno  .  ") "  .  $stmt -> error ;
        die();
    }
    $salary = 0.7;
    for ($i = 1990; $i < 2010; $i++) {
        $name = "emp".$i;
        $userpass = md5($i);
        $email = "pacoson".$i."@163.com";
        $salary += $i;
        $grade = $i%2;
        echo $name.$userpass.$email.$salary.$grade."<br/>";
        $stmt->execute();
    }
    $stmt->close();
    echo " === 插入数据dd完成 ===<br/>";
//     echo "Row inserted".$stmt->affected_rows; 
    $db -> close();
?>