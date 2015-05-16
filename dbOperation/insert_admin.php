<?php
    echo "=== 想数据库中插入数据项 ===<br/>";
    $db = new mysqli( "localhost", "root", "root", "emp_manager" );
    if( $db -> connect_errno )
        die( $db -> connect_errno );
    echo "=== 连接数据库成功 ===<br/>";
    $db -> query( "set names utf8" );
     
    $sql = "insert into admin(name,password,email) values(?,?,?)";
    $stmt = $db->prepare($sql);
    if (! $stmt -> bind_param ( "sss", $name, $userpass, $email)){
        echo  "Binding parameters failed: ("  .  $stmt -> errno  .  ") "  .  $stmt -> error ;
        die();
    }
    for ($i = 1990; $i < 1995; $i++) {
        $name = "emp".$i;
        $userpass = md5($i);
        $email = "pacoson".$i."@163.com";
        $stmt->execute();
    }
    $stmt->close();
    echo " === 插入数据dd完成 ===<br/>";
//     echo "Row inserted".$stmt->affected_rows; 
    $db -> close();
?>