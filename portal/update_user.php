<?php
    session_start();;
    require("../Database.php");
    require("../Function.php");
    
	try{
    
        if(isset($_POST['update_user'])){
           
            $name =sanitizeInput($_POST['name']);
            $email = sanitizeInput($_POST['email']);
            $pass =sanitizeInput(sha1($_POST['password']));
            $user_id = $_POST['user_id'];
            
            if(empty($pass)){
                $details = getSingleUserId($user_id);
                $password = $details['password'];
            }else{
                $password = $pass;
            }
            
            $role = 'Admin';

            if(updateUser($role, $name, $email, $password, $user_id)){
                
                $_SESSION['success'] = "You Have Updated $email Details Successfully";
               redirect("users.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
               redirect("edit-user.php?user_id=$user_id");
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Update The User Details";
            redirect("edit-user.php?user_id=$user_id");
        }
    }catch(PDOException $e){
        $_SESSION['error']= $e->getMessage();
    	redirect("edit-user.php?user_id=$user_id");
    }