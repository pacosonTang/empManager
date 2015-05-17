<?php
class BaseDao {
    
    public $conn;
    public $dbname="emp_manager";
    public $username="root";
    public $password="root";
    public $host="localhost";
    public $res;
    
    public function __construct(){
        
        $this->conn = new mysqli( $this->host, $this->username, $this->password, $this->dbname );
        if( $this->conn -> connect_errno )
            die( $this->conn -> connect_errno );
        $this->conn -> query( "set names utf8" );
    }
    
    //将res 导入 到 数组中，利于关闭结果集
    public function execute_dql($sql){
    
        $arr = array();
        $this->res = $this->conn->query($sql) or die($this->conn->connect_errno);
        
        $i = 0;
        while($row = $this->res->fetch_array ( MYSQLI_NUM ))
            $arr[$i++] = $row;
        //这里可以马上把$res释放
        $this->res->free();
        return $arr;
    }
    
    //执行dml-(Data Manipulation Language)数据操纵语言
    public function execute_dml($sql){
    
        $this->res = $this->conn->query($sql) or die($this->conn->connect_errno);
        if(!$this->res)
            return 0;
        else{
            if($this->conn->affected_rows > 0)
                return 1;//执行OK
            else
                return 0;//没有行收到影响
        }
        $this->res->free();
    }
    
    //考虑分页的查询 (&$pading 是 引用传递)
    //sql1 分页查询具体数据 limit
    //sql2 查询rowCount，总共的数据量
    public function execute_paging($sql1, $sql2, $paging){
        
        //查询分页显示的数据(具体列表数据)
        $this->res = $this->conn->query($sql1) or die($this->conn->connect_errno);
        $arr = array();
        while($row = $this->res->fetch_array ( MYSQLI_NUM ))
            $arr[] = $row;
        
        //存放结果集到paging实例
        $paging->setRes_array($arr);
        
        //存储pageCount 和  rowCount
        $this->res = $this->conn->query($sql2) or die($this->conn->connect_errno);
        
        if( $row=$this->res->fetch_row() ){
            $paging->setPageCount( ceil( $row[0]/$paging->getPageSize() ) );
            $paging->setRowCount($row[0]);
        }
        //释放结果集
        $this->res->free();
        //关闭连接
        $this->close_conn();
    }
    
    //关闭连接
    public function close_conn(){
        
        if(!empty($this->conn))
            $this->conn->close();
    }
}