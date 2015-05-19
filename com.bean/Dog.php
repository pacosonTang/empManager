<?php
class Dog{
    private $name;
    private $age;

    function __construct($name,$age){
        $this->age = $age;
        $this->name = $name;
    }

    function  Dog(){

    }
    /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return the $age
     */
    public function getAge()
    {
        return $this->age;
    }

}