<?php
	session_start();
    

	try{
        require("../Database.php");
        require("../Function.php");
        $dir = "../course_file/";
        
        $file_name = $_FILES['file']['name'];
        $file_size =$_FILES['file']['size'];
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];
        $file_ext = pathinfo($file_name);
        $ext = $file_ext['extension'];
        $extensions= array("pdf","PDF","ppt", "PPT", "docx", "DOCX");
        
        if(!(in_array($ext,$extensions))){
            $_SESSION['error']="File Extension not allowed, Please choose a PDF or Docs file.";
            redirect('courses.php');
        }
        if($file_size > 1097152){
            $_SESSION['error'] = 'File size must be not greater than 1 MB';
            redirect('courses.php');
        }else{
       
            if(isset($_POST['add-course'])){
            
                $course_title = sanitizeInput($_POST['course_title']);
                $course_code = strtoupper(sanitizeInput($_POST['course_code']));
                $course_unit = sanitizeInput($_POST['course_unit']);
                $course_status = sanitizeInput($_POST['status']);
                $dept_id = sanitizeInput($_POST['dept_id']);
                
                if(checkCourseCode($course_code)){
                    $_SESSION['error']="You HAve Added $course_code To The Course List Before";
                    redirect("courses.php");
                }else{
                    $move= move_uploaded_file($file_tmp, $dir.$file_name);
                    $course_file = $file_name;
                    if(($move) AND (addCourse($course_title, $course_code, $course_unit, $course_status, $course_file, $dept_id))){
                        
                        $_SESSION['success'] = "You Have Added $course_code to the Course List Successfully";
                        redirect("courses.php");
                    }else{
                        $_SESSION['error'] = "Network Failure, Please Try Again Later";
                       redirect("courses.php");
                    }
                }
               
            }else{
                $_SESSION['error']="Please FIll The Below Form To Add The Course Details";
                redirect("courses.php");
            }
        }
    }catch(PDOException $e){
    	$_SESSION['error'] =  $e->getMessage();
    	redirect("courses.php");
    }