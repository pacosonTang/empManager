<?php
    require_once '../EmpService.class.php';
        
    //1.创建EmpService对象实例
    $empService = new EmpService();
    
    //先看看用户要分页还是删除
    if(!empty($_REQUEST['flag'])){
        $flag = $_REQUEST['flag'];
        if($flag=="del"){
            //echo "删除id = ".$id;
            $id = $_GET['id'];
            if($empService->delEmpById($id) == 1){
                //suc
                header("Location:../results/ok.php");
                exit();
            } 
            else { 
                header("Location:../results/error.php");
                exit();
                //failure
            }
        }
        else if ($flag == "empAdd"){
            //1.添加用户
            //1.1 接收数据
            $name = $_POST['name'];
            $grade = $_POST['grade'];
            $email = $_POST['email'];
            $salary = $_POST['salary'];
            //1.2 将数据插入到db
            if($res = $empService->empAdd($name, $grade, $email, $salary)){
                header("Location:../results/ok.php");
                exit();
            }
            else {
                header("Location:../results/error.php");
                exit();
            }
        }
         else if ($flag == "empUpdate"){
             echo $flag;
                //1.修改用户
                //1.1 接收数据
                $id = $_POST['id'];
                $name = $_POST['name'];
                $grade = $_POST['grade'];
                $email = $_POST['email'];
                $salary = $_POST['salary'];
                
                echo $id.$name.$grade.$email.$salary;
                //1.2 将数据更新到db
                if($res = $empService->updateEmp($id, $name, $grade, $email, $salary)){
                    echo "res".$res;
                    header("Location:../results/ok.php");
                    exit();
                }
                else {
                    header("Location:../results/error.php");
                    exit();
                }
            }
    }
   
?>