<?php
	session_start();
	require("Database.php");
    require("Function.php");
	try{
		
		if(isset($_POST['login'])){
			$email = sanitizeInput($_POST['email']);
			$password = sha1($_POST['password']);

			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM administrator  WHERE email =:email AND password =:password");
			$arr=array(':email'=>$email, ':password'=>$password);
			$query->execute($arr);
			$check = $query->rowCount();
			if($check == 0){
				$_SESSION['error'] = "Opps!! Invalid Username or Password";
				redirect("./");
			}else{
				$result = $query->fetch();
				$_SESSION['user_name'] = $result['email'];
				$_SESSION['role'] = $result['role'];
				$_SESSION['name'] = $result['name'];
				$_SESSION['id'] = $result['user_id'];

				$user_email = $_SESSION['user_name'];
				$access = $_SESSION['role'];
				$login =  userAccessLevel($access);
			}
		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Access The Portal";
			redirect("./");
		}
	}catch(PDOException $e){
		$_SESSION['error'] = $e->getMessage();
		redirect("./");
	}