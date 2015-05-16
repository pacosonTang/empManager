<?php

require_once 'BaseDao.class.php';

//Admin 对应的 业务逻辑类
class AdminService {
    
    private $email;
    
    public function checkAdmin($name,$password){
        
        $sql = "select password,email from admin where name = '$name'";
        $baseDao = new BaseDao();
         
        if($res = $baseDao->conn->query($sql)) {
            if( $row = $res->fetch_assoc() ) {
                if(md5($password) == $row['password'])
                    $this->setEmail($row['email']);
                    return true;
            }
        }
        $baseDao->close_conn();
        return false;
    }
    
 /**
     * @param field_type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
 /**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
}