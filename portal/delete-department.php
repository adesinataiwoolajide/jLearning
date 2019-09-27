<?php 
    session_start();
    require("../../Database.php");
    require("../../Function.php");

    try{
        if(isset($_GET['dept_id'])){
        
            $dept_id = $_GET['dept_id'];
            $data = getSingleDept($dept_id);
            $dept_name = $data['dept_name'];

            if(deleteDept($dept_id)){
                $_SESSION['success'] = "You have Deleted $dept_name Department Successfully";
                redirect('departments.php');
            }else{
                $_SESSION['error'] = "Network Failure, Please Try Again Later";
                redirect("departments.php");
            }
               
        }else{
            $_SESSION['error'] = "Please Click Delete To Delete The Department";
            redirect("departments.php");
        }

    }catch(PDOException $e){
        $_SESSION['error'] =  $e->getMessage();
        redirect("departments.php");
    }

    
?>