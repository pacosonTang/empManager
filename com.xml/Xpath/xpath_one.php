<?php 
    
    //1 创建DOMDocument对象
    $xmldoc = new DOMDocument("1.0", "UTF-8");
    //2 加载xml
    $xmldoc->load("xpath.xml");
    //3 转成xpath对象
    $domXPath = new DOMXPath($xmldoc);
    //4 使用xpath技术来查找你希望查找的节点
    //$node_list = $domXPath->query("/AAA/BBB");
    $node_list = $domXPath->query("//*");
    
    //echo $node_list->length;
    for ($i = 0;$i < $node_list->length;$i++){
        $node = $node_list->item($i);
        echo $node->tagName."<br/>";
    }
        
?>