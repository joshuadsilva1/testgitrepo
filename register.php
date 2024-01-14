<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">



<link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="style.css">

    
	<title>Register Form</title>
</head>
<body>

<div class="contain">

<?php

if (isset($_POST["submit"])){
	#used to call the username on mainpage

	$firstName = $_POST["firstname"];

	$lastName = $_POST["lastname"];

	$email = $_POST["email"];

	$password = $_POST["pass"];

	$passwordRepeat = $_POST["repeat_pass"];

	$phonenumber = $_POST["phonenumber"];

	$passwordhash = password_hash($password, PASSWORD_DEFAULT);

	#validation using php
	$errors = array();
           
           if (empty($firstName) OR empty($lastName) OR empty($email) OR empty($password) OR empty($passwordRepeat) OR empty($phonenumber)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }

		   require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
		   
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }	   
	   
	if (count($errors)>0) {
		foreach ($errors as $error) {
			echo "<div class='alert alert-danger'>$error</div>";
		}
	}else{
		
		#connect to the database.
		
		$sql = "INSERT INTO users (first_name, last_name, email, password, phone_number) VALUES(?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		$prepareStmt = mysqli_stmt_prepare($stmt, $sql);
		if($prepareStmt){

			mysqli_stmt_bind_param($stmt, "sssss", $firstName, $lastName, $email, $passwordhash, $phonenumber);
			mysqli_stmt_execute($stmt);
			echo "<div class='alert alert-success'>User registered successfully</div>";

			$userName = $_POST["first_name"]; 
			$_SESSION["first_name"] = $userName;
			header("Location: login.php");
            die();

		}
		

}

}

?>


<form action="register.php" method="post">


<div class="group">
	<input type="text" class="inputbox" name="firstname" placeholder="First Name:">
</div>
<br> <br>
<div class="group">
	<input type="text" class="inputbox" name="lastname" placeholder="Last Name:">
</div>
<br> <br>
<div class="group">
	<input type="text" class="inputbox" name="email" placeholder="Email:">
</div>
<br> <br>
<div class="group">
	<input type="password" class="inputbox" name="pass" placeholder="Enter password:">
</div>
<br> <br>
<div class="group">
	<input type="password" class="inputbox" name="repeat_pass" placeholder="Confirm password:">
</div>
<br> <br>
<div class="group">
	<input type="number" class="inputbox" name="phonenumber" placeholder="Phone number:">
</div>

<br> <br>

<div class="btn btn-primary navbar-btn text-white w-100 p-2">
<input type="submit" class="btn btn-primary" value="Register" name="submit">
</div>

<div class="text-center">

<a href="login.php"> Already have an account? </a>

</div>

<br> <br>



</form>

</div>

	
</body>
</html>

  













