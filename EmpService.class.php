<?php
    require_once 'BaseDao.class.php';
    require_once 'Paging.class.php';
    require_once 'com.bean/Emp.class.php';
    
class EmpService {
    
    public $baseDao;
    
    public function __construct(){
        $this->baseDao = new BaseDao(); 
    }
    
    function updateEmp($id,$name,$grade,$email,$salary){
        
        $this->baseDao = new BaseDao();
        $sql = "update emp set name='$name',grade='$grade',email='$email',salary='$salary' where id = '$id'";
        //$res 是一个数组
        $res = $this->baseDao->execute_dml($sql);
        $this->baseDao->close_conn();
        return $res;
    } 
    //查询用户
    function getEmpById($id){
         
        $sql = "select * from emp where id = $id";

        //$res 是一个数组 
        $res = $this->baseDao->execute_dql($sql);
        $this->baseDao->close_conn();
        
        //对数据进行二次封装
        $emp = new Emp($res[0][0],$res[0][2],$res[0][1],$res[0][2],$res[0][3],$res[0][4]);
        return $emp;
    }
    
    // 添加用户
    function empAdd($name, $grade, $email, $salary){
        $sql = "insert into emp(name,grade,email,salary) values('$name','$grade','$email','$salary')";
        $res = $this->baseDao->execute_dml($sql);
        $this->baseDao->close_conn();
        return $res;
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
    
    //通过empid删除Emp用户
    function delEmpById($id){
        
        $sql = "delete from emp where id=$id";
        return $this->baseDao->execute_dml($sql);
    }
    
}