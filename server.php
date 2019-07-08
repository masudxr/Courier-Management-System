<?php
	session_start();
	
	$username ="";
	$email ="";
	$errors=array();
	//connection to the database
	$db=mysqli_connect('localhost', 'root', '', 'cdb_lr');
     //if the registration button is clicked
	if (isset($_POST['register'])){
		$username=mysqli_real_escape_string($_POST['username']);
		$email=mysqli_real_escape_string($_POST['email']);
		$password_1=mysqli_real_escape_string($_POST['password_1']);
		$password_2=mysqli_real_escape_string($_POST['password_2']);
		//ensure that form fields are filled properly
		if (empty($username)){
			array_push($errors,"Úsername is required");
		}
		if (empty($email)){
			array_push($errors,"Email is required");
		}
		if (empty($password_1)){
			array_push($errors,"Password is required");
		}
		if ($password_1 != $password_2){
			array_push($errors, "The two passwords do not match");
		}
		//if there are no errors save user to database
		if (count($errors) == 0){
			$password = md5($password_1);
			$sql = "INSERT INTO users (username,email,password)
			        VALUES ('$username','$email','$password')";
			mysqli_query($db,$sql);
			$_SESSION['username'] = $username;
			$_SESSION['SUCCESS'] ="You are now logged in";
			header('location: home.php');//redirect in home page
		  }
	}
	//log user in from login page
	if (isset($_POST['login'])) {
		$username=mysqli_real_escape_string($_POST['username']);
		$password=mysqli_real_escape_string($_POST['password']);

		//ensure that form fields are filled properly
		if (empty($username)){
			array_push($errors,"Úsername is required");
		}
		if (empty($password)){
			array_push($errors,"Password is required");
		}
		if (count($errors)==0){
			$password = md5($password);//encrypt password before comparing with that from database
		$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($db,$query);
		if (mysqli_num_rows($result)==1){
			//log user in
			$_SESSION['username'] = $username;
			$_SESSION['success'] ="You are now logged in";
			header('location: home.php');//redirect in home page
		}else{
			array_push($errors, "Wrong username/password combination");
		}
	}
	}

	if (isset($_GET['Logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: home.php');
	}



?>