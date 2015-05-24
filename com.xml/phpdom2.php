<?php

    //解析一个文件的步骤
    
    //1.创建一个domDocument对象 表示文档
    $xmdoc = new DOMDocument("1.0", "UTF-8");
    
    //2.指定加载哪个xml，解析哪个文件
    $xmdoc->load("myclass.xml");
    
    //3.获取你关心的节点
    //把所有的节点取出来
    $stus = $xmldoc->getElementsByTagName("stu");
    
    //4.遍历节点
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
    
    