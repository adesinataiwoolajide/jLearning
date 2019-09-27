<?php
	session_start();
	require("../../Database.php");
    require("../../Function.php");
	try{
        
        if(isset($_GET['matric_number'])){
            
            $matric_number =$_GET['matric_number'];
            $details = getSingleStudent($matric_number);
            $email = $details['student_email'];
            $userDetails =getSingleUser($email);
            $user_id = $userDetails['user_id'];
           
            if(deleteUserAccount($email) AND (deleteStudent($matric_number))){
                
                $_SESSION['success'] = "You Have Deleted $matric_number Details Successfully";
                redirect("students.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                redirect("students.php");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The User Details";
            redirect("students.php");
        }
    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
    	redirect("students.php");
    }