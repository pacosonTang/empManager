<?php 


    //接收用户购买请求，并吧书保存到session
    $bookid = $_GET['bookid'];
    $bookname = $_GET['bookname'];
    
    //这里不能让服务器创建一个新的 session
    if(!empty($_GET['PHPSESSID']))
        session_id($_GET['PHPSESSID']);
    $sid = session_id();
    //启用session    
    session_start();
    $_SESSION[$bookid] = $bookname;
    
    echo "<br/>购买商品成功";
    echo "<br/><a href='bookstore.php?PHPSESSID=$sid'>返回书店首页继续购买</a>";
?>