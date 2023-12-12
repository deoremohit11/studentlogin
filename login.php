<?php
session_start();

include("dp.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$email = $_POST['Email'];
	$password = $_POST['pass'];

	if(!empty($email)&& !empty($password) && ! is_numeric($email))
	{
		$query = "select * from form where Email = '$email' limit 1";
		$result = mysqli_query($con, $query);
		if($result)
		{
			if($result && mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);

				if($user_data ['pass']==$password)
				{
					header("location: index.php");
					die;
				}

			}
		}
		echo "<script type='text/javascript'>alter('Wrong user name or password')</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alter('Wrong user name or password')</script>";
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
    <div class="login">
		<h1>Login</h1>
		
		<form method="POST">
			<label>Email</label>
		    <input type="email" name="Email" require>
			<label>password</label>
			<input type="password" name="pass" require>
			<input type="submit" name="" value="submit">
		</form>
        <p> Not have an accout? <a href="signup.php">signup here</a></p>
</body>