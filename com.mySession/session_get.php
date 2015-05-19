<?php
 
    //请加上empty，判断该对象是否为空，然后再决定是否要打印该value
    
    require_once '../com.bean/Dog.php';
    echo "如何 获取 session数据<br/>";
    session_start();
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    
    //通过key类指定获取某个value
    echo "<br/.名字是: " . $_SESSION['name'];
    $arr = $_SESSION['myarr'];
    echo "<br/>数组的数据是: ";
    foreach ($arr as $key=>$val)
        echo "<br/>=== $val ===";
    
    echo "<br/><br/>=== 取出对象 ===<br/>";
     //取出对象
     $dog = $_SESSION['mydog'];
     //注意当这里要取用对象的属性的时候，这里要有该对象所属类的代码声明：
     //    require_once '../com.bean/Dog.php';
     //然后从session文件取数据的时候，它就晓得用哪种数据格式去取出数据。
     echo "小狗的名字".$dog->getName();
     //取得session_id, 对应到session文件名
     echo session_id();
?>

