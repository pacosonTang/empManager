<?php
    require_once 'BaseDao.class.php';
    require_once 'Paging.class.php';
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
    
    //封装的方式实现分页
    function getPaging($paging){
        
        $sql1 = "select id,name,email,salary,grade from emp limit "
            .($paging->getPageNow()-1) * $paging->getPageSize().",".$paging->getPageSize();
        $sql2 = "select count(id) from emp";
        $this->baseDao->execute_paging($sql1, $sql2, $paging);
    }
    
    
}