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
        $words = $xmldoc->getElementsByTagName("word");
        $isenter = false;
        //遍历
        for ($i = 0; $i < $words->length; $i++) {
            
            $word = $words->item($i);
            $word_en = getNodeVal($word, "en");
            if($enword == $word_en) {
                $isenter = true;
                echo "该单词所对应的中文为: ".getNodeVal($word, "ch")."<br/>";
                break;
            }
        }    
        if(!$isenter)
            echo "<br/>查无此词条";
    }
    else if($type=="add"){ 
        echo "添加";
        $en_word = $_REQUEST['enword'];
        $ch_word = $_REQUEST['chword'];
        //添加到xml文件（词库）
        //得到根元素
        $root = $xmldoc->getElementsByTagName("words")->item(0);
        //创建word节点
        $new_word = $xmldoc->createElement("word");
        //创建new_word_en 和 new_word_ch 节点
        $new_word_en = $xmldoc->createElement("en");
        $new_word_ch = $xmldoc->createElement("ch");
        //为上述节点赋值
        $new_word_en->nodeValue = $en_word;
        $new_word_ch->nodeValue = $ch_word;
        //将父，子节点进行关联
        $new_word->appendChild($new_word_en);
        $new_word->appendChild($new_word_ch);
        $root->appendChild($new_word);
        
        //保存会xml
        if( $xmldoc->save("words.xml") )
            echo "add success";
        else 
            echo "add failure";
        echo "<br/><a href='wordView.php'>返回主界面</a>";
         
    }
    
    //下面写一个函数来简化我们取dom节点值的操作
    function getNodeVal($mydom,$domname){
    
        return $mydom->getElementsByTagName($domname)->item(0)->nodeValue;
    }
        
?>