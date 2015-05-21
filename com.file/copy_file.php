<?php

    //拷贝图片
    $file  =  '../image/psb.jpg' ;
    $newfile  =  '../image/psb_bak.jpg' ;
    
    if (! copy ( $file ,  $newfile )) {
        echo  "failed to copy  $file ...\n" ;
    }
    else{
        echo "<br/>拷贝成功";
    }
?> 
