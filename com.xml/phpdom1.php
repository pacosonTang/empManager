<?php
    //创建dom document 对象，代码就是xml
    $xmldoc = new DOMDocument("1.0", "UTF-8");
    
    //加载xml（指定要对哪个xml文件进行解析）
    $xmldoc->load("classes.xml");//dom树形成了
    
    //如果你想要知道$xmldoc有哪些方法可以使用，可以通过var_dump
    //var_dump($xmldoc);
    
    //希望获得第一个学生的名字
    $stus = $xmldoc->getElementsByTagName("stu");
    //var_dump($stus);
    echo "<br/>共有".$stus->length."学生<br/>";
    
    //选中第一个学生
    /* for ($i=0;$i<$stus->length;$i++) {
        $stu1 = $stus->item($i);
        $stuname = $stu1->getElementsByTagName("name");
        //var_dump($stuname->item(0)->nodeValue);
       echo "<br/>学生的名字为：".$stuname->item(0)->nodeValue;
    } */
    for ($i=0;$i<$stus->length;$i++) {
        echo "<br/>名字是：".getNodeVal($stus->item($i), "name");
        echo "<br/>性别是：".getNodeVal($stus->item($i), "sex");
        echo "<br/>年龄是：".getNodeVal($stus->item($i), "age");
    }
    
    //下面写一个函数来简化我们取dom节点值的操作
    function getNodeVal($mydom,$domname){
        
        return $mydom->getElementsByTagName($domname)->item(0)->nodeValue;
    }
?>
    
    