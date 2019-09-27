<?php
	session_start();
	require("../../Database.php");
    require("../../Function.php");
    
    
	try{
       
        if(isset($_GET['staff_number'])){
            
            $staff_number =$_GET['staff_number'];
            $details = $staff->getSingleStaff($staff_number);
            $email = $details['staff_email'];
            $userDetails = $user->getSingleUser($email);
            $user_id = $userDetails['user_id'];
           
            if($user->deleteUserAccount($email) AND ($staff->deleteStaff($staff_number))){
                $action ="Deleted $staff_number Details";
                $his = $all_purpose->getUserDetailsandAddActivity($eemail, $action);
                $_SESSION['success'] = "You Have Deleted $staff_number Details Successfully";
                $all_purpose->redirect("lecturers.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("lecturers.php");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The User Details";
            $all_purpose->redirect("lecturers.php");
        }
    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
    	$all_purpose->redirect("lecturers.php");
    }