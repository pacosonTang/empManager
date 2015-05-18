<?php
class Emp {
    private $id;
    private $name;
    private $password;
    private $email;
    private $salary;
    private $grade;
    
    public function __construct($id,$grade,$name,$password,$email,$salary){
        $this->grade = $grade;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->salary = $salary;
        $this->id = $id;
    }
    
    
 /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

 /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

 /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

 /**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

 /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

 /**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

 /**
     * @param field_type $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

 /**
     * @param field_type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
 /**
     * @return the $salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

 /**
     * @param field_type $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
 /**
     * @return the $grade
     */
    public function getGrade()
    {
        return $this->grade;
    }

 /**
     * @param field_type $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }


}