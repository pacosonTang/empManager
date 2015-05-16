<?php
class BaseDao {
    
    public $conn;
    public $dbname="emp_manager";
    public $username="root";
    public $password="root";
    public $host="localhost";
    
    public function __construct(){
        
        $this->conn = new mysqli( $this->host, $this->username, $this->password, $this->dbname );
        if( $this->conn -> connect_errno )
            die( $this->conn -> connect_errno );
        echo "=== 连接数据库成功 ===<br/>";
        $this->conn -> query( "set names utf8" );
    }
    
    //执行dql DQL:Data QueryLanguage 数据查询语言标准语法
    public function execute_dql($sql){
        
        $res = $conn->query($sql) or die($conn->connet_errno);
        return $res;
    }
    
    //执行dml-(Data Manipulation Language)数据操纵语言
    public function execute_dml($sql){
        
        $res = $this->conn->query($sql);
        if(!$res)
            return 0;
        else{
            if($this->conn->affected_rows > 0)
                return 1;//执行OK
            else 
                return 0;//没有行收到影响
        }
    }
    
    //关闭连接
    public function close_conn(){
        
        if(!empty($this->conn))
            $this->conn->close();
    }
}