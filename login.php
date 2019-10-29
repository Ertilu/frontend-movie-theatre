<?php
session_start(); 
require 'config/API.php';
if(isset($_POST["submit"])) {
	$input = [ "email" => $_POST["email"], "password" => $_POST["password"] ];
	$data = json_encode($input);
	$get_data = callAPI('POST', 'http://restful-api-movie-theatre.herokuapp.com/users/login',$data);
	$response = json_decode($get_data, true);
	if(!$response["error"]) {
		$user = $response["user"];
		$token = $response["token"];
		$_SESSION["login"] = true;
		$_SESSION["user"] = $user;
		$_SESSION["token"] = $token;
		header("Location: index.php");
		die;
	} else {
		$error = true;
		var_dump($error);
	}
}
?>

<!DOCTYPE html>
<html>
	
<head>
	<title>Login to XXII</title>
		<meta charset="utf-8">
		<link href="css/bootstrap4.min.css" rel='stylesheet' type='text/css' />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="css/login.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
<body>
	
	<!-----start-main---->
	<div class="login-form">
		<h1>Sign In</h1>
		<h2><a href="register.php">Create Account</a></h2>
		<form action="" method="post">
			<?php if(isset($error)) : ?>
				<li>
					<p><?= $response["message"]; ?></p>
				</li>
			<?php endif; ?>
			<li>
				<input type="text" class="text" name="email" placeholder="Email"><a href="#" class=" icon user"></a>
			</li>
			<li>
				<input type="password" name="password" placeholder="Password"><a href="#" class=" icon lock"></a>
			</li>
				<div class ="forgot">
				<!-- <h3><a href="#">Forgot Password?</a></h3> -->
				<input type="submit" name="submit" value="Sign In" > 
			</div>
		</form>
	</div>
</body>
</html>