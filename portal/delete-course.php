<?php
	session_start();
	require("../../Database.php");
    require("../../Function.php");
    
	try{
       
        if(isset($_GET['course_code'])){
            
            $course_code = $_GET['course_code'];
            $details = getSingleCourse($course_code);
            $course_title = $details['course_title'];
            
            if(deleteCourse($course_code)){
                
                $_SESSION['success']="You Have Deleted $course_title From The Course List";
	    		redirect("courses.php");
            }else{

                $_SESSION['error']="Network Failure, Please Try Again Later";
                redirect("courses.php");
                
            }
        }else{
            $_SESSION['error']="Please Select The Course Details";
            redirect("courses.php");
        }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	redirect("courses.php");
    }