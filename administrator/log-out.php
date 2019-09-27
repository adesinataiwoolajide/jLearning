<?php
	//starting session
	session_start();
	require("../Database.php");
    require("../Function.php");
	try{
		$db = Database::getInstance()->getConnection();
		
		$email = $_SESSION['user_name'];
		
		$_SESSION['success'] = $email. " ". "You have logged out successfully";
		
		unset($email);
		//destroying the session
		session_destroy();
		//redirecting to the index page
		redirect("./");	
	}catch(PDOException $e){
		$_SESSION['error'] = "Network Failure". $e->getMessage();
		redirect("./");	
	}	
?>