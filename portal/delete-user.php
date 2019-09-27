<?php
	session_start();
	require("../../Database.php");
    require("../../Function.php");
    
	try{
       
        if(isset($_GET['email'])){
            
            $email = $_GET['email'];
            $details = getSingleUser($email);
            $name = $details['name'];
            
            if(deleteUserAccount($email)){
                
                $_SESSION['success'] = "You Have Deleted $email From the User List Successfully";
                redirect("users.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                redirect("users.php");
            }
            
        }else{
            $_SESSION['error']="Please Click The Trash Icon To Delete The User Details";
            redirect("users.php");
        }
    }catch(PDOException $e){
    	$_SESSION['error']= $e->getMessage();
    	redirect("users.php");
    }