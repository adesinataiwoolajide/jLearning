<?php 
    function userAccessLevel($access){
        if($access == 'Admin'){
           
            $_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Admin Dashboard";
           redirect("portal/./");
        }elseif($access == 'Student'){
            $_SESSION['success'] = $_SESSION['name']. " ". "Welcome to Student Dashboard";
           redirect("portal/./");
        
        }else{
            $_SESSION['error'] = "Your are an Invalid User";
           redirect("./");
        }
        return $access;
    }
    function sanitizeInput($input){
        $input=trim($input);
        $input=strip_tags($input);
        $input=stripslashes($input);
        $input=htmlentities($input);
        return $input;
    }

   function redirect($url){
        header('Location: '.$url);
        exit();
    }

    function checkIfExistemail($email)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM administrator WHERE email=:email");
        $query->bindValue(":email", $email);
        $query->execute();
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    
    function deleteUserAccount($email)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("DELETE FROM administrator WHERE email=:email");
        $query->bindValue(":email", $email);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    function getAllUser()
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM administrator WHERE role='Admin' ORDER BY name ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function addUser($name, $email, $password, $role)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("INSERT INTO administrator(name, email, password, role)
             VALUES (:name, :email, :password, :role)");
        $query->bindValue(":name", $name);
         
        $query->bindValue(":email", $email);
        $query->bindValue(":password", $password);
        $query->bindValue(":role", $role);
        if(!empty($query->execute())){
            return true;
        }else{
            return false;
        }
    }
    function updateUser($role,$name, $email, $password, $user_id)
    {
        $db = Database::getInstance()->getConnection();
        $query= $db->prepare("UPDATE administrator SET name=:name, password=:password, role=:role, email=:email WHERE user_id=:user_id");
        $query->bindValue(":name", $name);
        $query->bindValue(":email", $email);
        $query->bindValue(":password", $password);
        $query->bindValue(":role", $role);
        $query->bindValue(":user_id", $user_id);
        if(!empty($query->execute())){
            return true;
        }else{
            return false;
        }
    }

    function userLogin($email, $password)
    {
        $db= Database::getInstance()->getConnection();
        $query= $db->prepare("SELECT * FROM administrator WHERE email=:email AND password=:password");
        $query->bindValue(":email", $email);
        $query->bindValue(":password", $password);
        $query->execute();
        $details= $query->fetch();
        return $details;
    }

    function getSingleUser($email)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM administrator WHERE email=:email");
        $query->bindValue(":email", $email);
        $query->execute();
        return $query->fetch();
    }

    function getSingleUserId($user_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM administrator WHERE user_id=:user_id");
        $query->bindValue(":user_id", $user_id);
        $query->execute();
        return $query->fetch();
    }
    
    function checkUserLogin($email, $password)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM administrator WHERE email=:email AND password=:password");
        $query->bindValue(":email", $email);
        $query->bindValue(":password", $password);
        $query->execute();
        if($query->rowCount() == 0){
            return true;
        }else{
            return false;
        }
    }

 

    function checkCourseCode($course_code)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM courses WHERE course_code=:course_code");
        $query->bindValue(":course_code", $course_code);
        $query->execute();
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    function addCourse($course_title, $course_code, $course_unit, $course_status, $course_file, $dept_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("INSERT INTO courses(course_title, course_code, course_unit, course_status, course_file, dept_id)VALUES
        (:course_title, :course_code, :course_unit, :course_status, :course_file, :dept_id)");
        $query->bindValue(":course_code", $course_code);
        $query->bindValue(":course_title", $course_title);
        $query->bindValue(":course_unit", $course_unit);
        $query->bindValue(":course_status", $course_status);
        $query->bindValue(":course_file", $course_file);
        $query->bindValue(":dept_id", $dept_id);
        if(!empty($query->execute())){
            return true;
        }else{
            return false;
        }
    }

    function updateCourse($course_title, $course_code, $course_unit, $course_status,  $course_file, $dept_id,  $course_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("UPDATE courses SET course_title=:course_title, course_unit=:course_unit, course_status=:course_status, 
        course_code=:course_code , course_file=:course_file, dept_id=:dept_id WHERE course_id=:course_id");
        $query->bindValue(":course_code", $course_code);
        $query->bindValue(":course_title", $course_title);
        $query->bindValue(":course_unit", $course_unit);
        $query->bindValue(":course_status", $course_status);
        $query->bindValue(":course_file", $course_file);
        $query->bindValue(":dept_id", $dept_id);
        $query->bindValue(":course_id", $course_id);
        if(!empty($query->execute())){
            return true;
        }else{
            return false;
        }
    }

    function deleteCourse($course_code)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("DELETE FROM courses WHERE course_code=:course_code");
        $query->bindValue(":course_code", $course_code);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    function getAllCourses()
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM courses ORDER BY course_title ASC");
        $query->execute();
        $list = $query->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }

    function getSingleCourseList($course_code)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM courses WHERE course_code=:course_code");
        $query->bindValue(":course_code", $course_code);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSingleDeptCourseList($dept_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM courses WHERE dept_id=:dept_id");
        $query->bindValue(":dept_id", $dept_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSingleCourse($course_code)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM courses WHERE course_code=:course_code");
        $query->bindValue(":course_code", $course_code);
        $query->execute();
        return $query->fetch();
    }

    function getSingleCourseId($course_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM courses WHERE course_id=:course_id");
        $query->bindValue(":course_id", $course_id);
        $query->execute();
        return $query->fetch();
    }

    function checkStudentMatricNumber($matric_number)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM students WHERE matric_number=:matric_number");
        $query->bindValue(":matric_number", $matric_number);
        $query->execute();
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function checkStudentstudentEmail($student_email)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM students WHERE student_email=:student_email");
        $query->bindValue(":student_email", $student_email);
        $query->execute();
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function checkStudentPhone($phone_number)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM students WHERE phone_number=:phone_number");
        $query->bindValue(":phone_number", $phone_number);
        $query->execute();
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    function addStudent($student_name, $student_email, $matric_number, $phone_number,  $level, $program, $dept_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("INSERT INTO students(student_name, student_email, matric_number, phone_number, level, program, dept_id)VALUES
        (:student_name, :student_email, :matric_number, :phone_number, :level, :program, :dept_id)");
        $query->bindValue(":matric_number", $matric_number);
        $query->bindValue(":student_email", $student_email);
        $query->bindValue(":student_name", $student_name);
        $query->bindValue(":phone_number", $phone_number);
        $query->bindValue(":level", $level);
        $query->bindValue(":program", $program);
        $query->bindValue(":dept_id", $dept_id);
        if(!empty($query->execute())){
            return true;
        }else{
            return false;
        }
    }

    function updateStudent($matric_number, $phone_number, $student_email, $student_name,$level, $program, $dept_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("UPDATE students SET student_name=:student_name, student_email=:student_email, 
        phone_number=:phone_number, level=:level, program=:program, dept_id=:dept_id WHERE matric_number=:matric_number");
        $query->bindValue(":matric_number", $matric_number);
        $query->bindValue(":student_email", $student_email);
        $query->bindValue(":student_name", $student_name);
        $query->bindValue(":phone_number", $phone_number);
        $query->bindValue(":level", $level);
        $query->bindValue(":program", $program);
        $query->bindValue(":dept_id", $dept_id);
        if(!empty($query->execute())){
            return true;
        }else{
            return false;
        }
    }

    function deleteStudent($matric_number)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("DELETE FROM students WHERE matric_number=:matric_number");
        $query->bindValue(":matric_number", $matric_number);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    function getAllstudents()
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM students ORDER BY matric_number ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSingleStudentList($matric_number)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM students WHERE matric_number=:matric_number");
        $query->bindValue(":matric_number", $matric_number);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSingleStudentEmailList($email)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM students WHERE student_email=:email");
        $query->bindValue(":email", $email);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSingleStudentEmail($email)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM students WHERE student_email=:email");
        $query->bindValue(":email", $email);
        $query->execute();
        return $query->fetch();
    }

    function getSingleStudent($matric_number)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM students WHERE matric_number=:matric_number");
        $query->bindValue(":matric_number", $matric_number);
        $query->execute();
        return $query->fetch();
    }

    function checkDeptName($dept_name)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM department WHERE dept_name=:dept_name");
        $query->bindValue(":dept_name", $dept_name);
        $query->execute();
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function getAllDept()
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM department ORDER BY dept_name ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSingleDeptList($dept_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM department WHERE dept_id=:dept_id");
        $query->bindValue(":dept_id", $dept_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getSingleDept($dept_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM department WHERE dept_id=:dept_id");
        $query->bindValue(":dept_id", $dept_id);
        $query->execute();
        return $query->fetch();
    }

    function getSingleDepo($depo)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("SELECT * FROM department WHERE dept_id=:depo");
        $query->bindValue(":depo", $depo);
        $query->execute();
        return $query->fetch();
    }

    function addDept($dept_name)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("INSERT INTO department(dept_name)VALUES
        (:dept_name)");
        $query->bindValue(":dept_name", $dept_name);
        
        if(!empty($query->execute())){
            return true;
        }else{
            return false;
        }
    }

    function updateDept($dept_name, $dept_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("UPDATE department SET dept_name=:dept_name WHERE dept_id=:dept_id");
        $query->bindValue(":dept_name", $dept_name);
        $query->bindValue(":dept_id", $dept_id);
        if(!empty($query->execute())){
            return true;
        }else{
            return false;
        }
    }

    function deleteDept($dept_id)
    {
        $db = Database::getInstance()->getConnection();
        $query = $db->prepare("DELETE FROM department WHERE dept_id=:dept_id");
        $query->bindValue(":dept_id", $dept_id);
        if($query->execute()){
            return true;
        }else{
            return false;
        }
        
    }

?>