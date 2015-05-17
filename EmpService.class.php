<?php
    require_once 'BaseDao.class.php';
class EmpService {
    
    public $baseDao;
    
    public function __construct(){
        $this->baseDao = new BaseDao(); 
    }
    //共有多少页
    function getPageCount($pageSize){
        
        if ($rowCount = $this->getRowCount())
            $pageCount = ceil($rowCount/$pageSize);
         return $pageCount;
    }
    
    //共有多少行数
    function getRowCount(){
        
        $sql = "select count(id) from emp";
        if($res = $this->baseDao->execute_dql($sql))
            return $res[0][0];
        else 
            return 0;
    }
    
    function getPerPage($pageNow, $pageSize){
        
        $sql = "select id,name,email,salary,grade from emp limit ".($pageNow-1)*$pageSize.",".$pageSize;
        return $res = $this->baseDao->execute_dql($sql);
    }
}