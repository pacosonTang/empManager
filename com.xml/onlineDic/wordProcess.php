<?php 
    
    //接收用户提交的单词
    $type = $_REQUEST['type'];
    
    $xmldoc = new DOMDocument("1.0", "UTF-8");
    $xmldoc->load("words.xml");
    
    //判断用户想干什么
    if($type == "query"){
        //接收新的单词
        $enword = $_POST['enword'];
        //查询xml
        $words = $xmldoc->getElementsByTagName("words");
        $isenter = false;
        //遍历
        for ($i = 0; $i < $words->length; $i++) {
            
            $word = $words->item($i);
            $word_en = getNodeVal($word, "en");
            if($enword == $word_en) {
                $isenter = true;
                echo "该单词所对应的中文为: ".getNodeVal($word, "ch")."<br/>";
            }
        }    
        if(!$isenter)
            echo "<br/>查无此词条";
    }
    
    //下面写一个函数来简化我们取dom节点值的操作
    function getNodeVal($mydom,$domname){
    
        return $mydom->getElementsByTagName($domname)->item(0)->nodeValue;
    }
        
?>