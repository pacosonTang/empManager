<?php

    //演示对xml文件的修改update
    
    //1 创建一个domDocument对象 表示文档
    $xmldoc = new DOMDocument("1.0", "UTF-8");
    
    //2 指定加载哪个xml，解析哪个文件
    $xmldoc->load("myclass.xml");
    
    //3 演示如何修改一个学生的年龄
    //3.1 取出根节点
    $root = $xmldoc->getElementsByTagName("class")->item(0);
    //3.2 找到该学生
    $stu = $xmldoc->getElementsByTagName("stu")->item(0);
    $age_node = $stu->getElementsByTagName("age")->item(0);
    $age_node->nodeValue += 11;
    
    //更新xml文件
    $xmldoc->save("myclass.xml");
    echo "update success"; 
?>
    
    