<?php

    //演示对xml文件的增加，删除，修改
    
    //1 创建一个domDocument对象 表示文档
    $xmldoc = new DOMDocument("1.0", "UTF-8");
    
    //2 指定加载哪个xml，解析哪个文件
    $xmldoc->load("myclass.xml");
    
    //3 演示如何添加一个学生信息
    //3.1 取出根节点
    $root = $xmldoc->getElementsByTagName("class")->item(0);
    //3.2 创建学生节点
    $stu_node = $xmldoc->createElement("stu");
    
    //为stu添加属性
    $stu_node->setAttribute("description", "我还是个学生");
    
    //3.2.1 创建名字节点
    $stu_name_node = $xmldoc->createElement("name");
    $stu_name_node->nodeValue = "唐荣你好";
    //3.2.2 创建年龄
    $stu_age_node = $xmldoc->createElement("age");
    $stu_age_node->nodeValue = "8";
    //3.2.3 创建性别
    $stu_sex_node = $xmldoc->createElement("sex");
    $stu_sex_node->nodeValue = "男";
    
    //4 吧名字，年龄，性别挂载到学生节点下
    $stu_node->appendChild($stu_name_node);
    $stu_node->appendChild($stu_sex_node);
    $stu_node->appendChild($stu_age_node);
    
    //5 把学生挂载到跟节点
    $root->appendChild($stu_node);
    
    //6 重新保存到xml
    //如果save到源文件，则相当于更新该文件，若save是新的文件名，则是创建某个新文件，并保存到该新文件
    $xmldoc->save("myclass.xml");
    echo "create success";
?>
    
    