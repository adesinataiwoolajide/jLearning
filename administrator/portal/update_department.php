<?php 
    session_start();
    require("../../Database.php");
    require("../../Function.php");

    try{
        if(isset($_POST['update_dept'])){
            
            $dept_name = strtoupper(sanitizeInput($_POST['dept_name']));
            $dept_id = $_POST['dept_id'];

            if(updateDept($dept_name, $dept_id)){
                $_SESSION['success'] = "You have added $dept_name Successfully";
                redirect('departments.php');
            }else{
                $_SESSION['error'] = "Network Failure, Please Try Again Later";
                redirect("edit-department.php?dept_id=$dept_id");
            }
               

        }else{
            $_SESSION['error'] = "Please Fill The Form Below To Update The Department";
            redirect("edit-department.php?dept_id=$dept_id");
        }

    }catch(PDOException $e){
        $_SESSION['error'] =  $e->getMessage();
        redirect("edit-department.php?dept_id=$dept_id");
    }

    
?>