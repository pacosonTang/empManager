<?php

    //演示对xml文件的删除
    
    //1 创建一个domDocument对象 表示文档
    $xmldoc = new DOMDocument("1.0", "UTF-8");
    
    //2 指定加载哪个xml，解析哪个文件
    $xmldoc->load("myclass.xml");
    
    //3 演示如何添加一个学生信息
    //3.1 取出根节点
    $root = $xmldoc->getElementsByTagName("class")->item(0);
    //3.2 找到该学生
    $stus = $xmldoc->getElementsByTagName("stu");
    $stu1 = $stus->item(1);
    //$root->removeChild($stu1);

    //这里有一个更加灵活的方法
    $stu1->parentNode->removeChild($stu1);
    
    //更新xml文件
    $xmldoc->save("myclass.xml");
    echo "delete success";
?>
    
    