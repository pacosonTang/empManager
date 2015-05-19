<?php
    
    require_once 'EmpService.class.php';
    
    $empService = new EmpService();
    
    $res = $empService->updateEmp(44, "emp2008", 0, "pacoson2008@163.com", "37981.7");
    echo $res;
?>