<?php
	session_start();;
    require("../Database.php");
    require("../Function.php");
    
	try{
        
        if(isset($_POST['add_user'])){
            
            $name = sanitizeInput($_POST['name']);
            $email = sanitizeInput($_POST['email']);
            $password = sanitizeInput(sha1($_POST['password']));
            $repeat = sanitizeInput(sha1($_POST['repeat']));
            if($password != $repeat){
                $_SESSION['error']="Password Does Not Match";
	    		redirect("users.php");
            }
            $role = 'Admin';

            if(checkIfExistemail($email)){
                $_SESSION['error']="Ooopss $email is in use by another user, Please Kindly use another E-Mail And Try Again";
	    		redirect("users.php");
            }else{

                if(addUser($name, $email, $password, $role)){
                    
                    $_SESSION['success'] = "You Have Added $email Details to the User List Successfully";
                    redirect("users.php");
                }else{
                    $_SESSION['error']="Network Failure, Please Try Again Later";
                    redirect("users.php");
                }
            }
        }else{
            $_SESSION['error']="Please FIll The Below Form To Add The User Details";
            redirect("users.php");
        }
    }catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    	redirect("users.php");
    }