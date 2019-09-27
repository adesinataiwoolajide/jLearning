<?php
	session_start();
	require("../Database.php");
    require("../Function.php");

	try{
        
        if(isset($_POST['add-student'])){
            $check =0;      
            $filename=$_FILES["file"]["tmp_name"];
           
            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($filename, "r");
                $role = 'Student';
                
                while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){

                    $new = $emapData;
                    $student_name = $emapData[0];
                    $student_email = $emapData[1];
                    $phone_number = $emapData[2];
                    $matric_number = $emapData[3];
                    $level =$emapData[4];
                    $program = $emapData[5];
                    $dept_id = $emapData[6];
                    $email = $student_email;
                    $password= sha1($student_email);
                    $name = $student_name;

                    if((checkIfExistemail($email)) OR (checkStudentstudentEmail($student_email))){
                        $_SESSION['error']="Ooopss $student_email is in use by another user, Please Kindly use another E-Mail And Try Again";
                       redirect("students.php");

                    }elseif(checkStudentPhone($phone_number)){
                        
                        $_SESSION['error']="Ooopss $phone_number is in use by another student, Please Kindly use another Phone Number And Try Again";
                       redirect("students.php");
                    
                    
                    
                    }else{
                        if((addStudent($student_name, $student_email, $matric_number, $phone_number,  $level, $program, $dept_id)) AND 
                            (addUser($name, $email, $password, $role))){
                           
                            $_SESSION['success'] = "You Have Uploaded The Students Details Successfully";
                        }else{
                            $_SESSION['error']="Network Failure, Please Try Again Later";
                           redirect("students.php");
                        }
                    }

                }
                
               redirect("students.php");

            }

        }else{
            $_SESSION['error']="Please Select An Excel File with (.csv) extension To Upload The Students Details";
           redirect("students.php");
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    	//$all_purpose->redirect("students.php");
    }