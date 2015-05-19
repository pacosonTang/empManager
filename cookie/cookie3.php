<?php

    setcookie("name","zhoujielun", time()+3600);
    echo "更新完毕";

    //删除某个键值对
    setcookie("name","",time()-200);
    if(empty($_COOKIE['name'])) 
        echo "删除成功";
     else
         echo "删除失败";
     
     //删除所有的key value 对
     foreach( $_COOKIE as $key=>$val){
         setcookie($key,"",time()-200);
         echo "<br/>".$key." cookie 值 ".$val." 被删除了!";
     }
?>