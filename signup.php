<?php
session_start();
include("dp.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$firstname = $_POST['Fname'];
	$lastname = $_POST['Lname'];
	$gender = $_POST['Gender'];
	$contactnumber = $_POST['Cnumber'];
	$email = $_POST['Email'];
	$password = $_POST['pass'];

	if(!empty($email)&& !empty($password) && ! is_numeric($email))
	{
		$query = "insert into form (Fname,Lname,Gender,Cnumber,	Email,	pass  ) values ('$firstname','$lastname','$gender','$contactnumber','$email','$password')";

		mysqli_query($con, $query);

		echo "<script type='text/javascript'>alter('Sucessfully Register')</script>";
	}
	else{
		echo "<script type='text/javascript'>alter('Please enter the valid information')</script>";
	}
}

?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Login and  Register</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
	<div class="signup">
		<h1>Sign Up</h1>
		<h4>It's free and only take a minute</h4>
		<form method="POST">
			<label>First Name</label>
			<input type="text" name="Fname" require>
			<label>Last Name</label>
			<input type="text" name="Lname" require>
			<label>Gender </label>

			<input type="text" name="Gender" require>
			<label>Contact Number</label>
			<input type="tel" name="Cnumber" require>
			<label>Email</label>
			<input type="email" name="Email" require>
			<label>Password</label>
			<input type="password" name="pass" require>
			<input type="submit" name="" value="submit">
		</form>
  		<p>
  			by clicking the Sign up button,you aree to our<br>
  			<a href="#">Term and Condition</a> and <a href="#">Policy privacy</a>
  		</p>
  		<p>Aready have an accout? <a href="login.php">Login here</a>
            </p>
    </div>
</body>
</html>
