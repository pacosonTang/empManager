<?php 
    
     //装在一个xml文件 
     $lib = simplexml_load_file("words.xml");
//      var_dump($lib);
    //取出第一本书
    $words = $lib->word;
    //$word = $words[0];
    //取出书名
    //echo $word->en;
    
    for ($i = 0;$i < count($words);$i ++){
        //取出子元素的值
        $word = $words[$i];
        echo $word->en.$word->ch."<br/>";
        //取出属性值
        echo $word['house']."<br/>";
    }
    
    //simpleXML与xpath结合使用
    $word_ens = $lib->xpath("//en");
    echo "<br/>***simpleXML与xpath结合使用***<br/>";
    foreach ($word_ens as $val) 
        echo "<br/>".$val;
?>