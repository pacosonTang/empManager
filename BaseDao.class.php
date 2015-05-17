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
    
    //执行dql DQL:Data QueryLanguage 数据查询语言标准语法
    /* public function execute_dql($sql){
        
        $this->res = $this->conn->query($sql) or die($this->conn->connect_errno);
        return $this->res;
    } */
    
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
    
        $this->res = $this->conn->query($sql);
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
    
    //关闭连接
    public function close_conn(){
        
        if(!empty($this->conn))
            $this->conn->close();
    }
}