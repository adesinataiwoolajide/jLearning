<?php 
    session_start();
    require("../../Database.php");
    require("../../Function.php");

    try{
        if(isset($_POST['add_dept'])){
            
            $dept_name = strtoupper(sanitizeInput($_POST['dept_name']));

            if(checkDeptName($dept_name)){
                $_SESSION['error'] = "You Have Added $dept_name to the Department list Before";
                redirect('departments.php');
            }else{
                if(addDept($dept_name)){
                    $_SESSION['success'] = "You have added $dept_name Successfully";
                    redirect('departments.php');
                }else{
                    $_SESSION['error'] = "Network Failure, Please Try Again Later";
                    redirect('departments.php');
                }
               
            }
        }else{
            $_SESSION['error'] = "Please Fill The Form Below To Add The Department";
            redirect('departments.php');
        }

    }catch(PDOException $e){
        $_SESSION['error'] =  $e->getMessage();
        redirect('departments.php');
    }

    
?>