<?php
session_start(); 
require 'config/API.php';
if(isset($_POST["submit"])) {
	$input = [ "name" => $_POST["name"], "age" => $_POST["age"], "email" => $_POST["email"], "password" => $_POST["password"] ];
	$data = json_encode($input);
	$get_data = callAPI('POST', 'http://restful-api-movie-theatre.herokuapp.com/users/register',$data);
	$response = json_decode($get_data, true);
	if(!$response["error"]) {
		header("Location: login.php");
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
	<title>Register to XXII</title>
		<meta charset="utf-8">
        <link href="css/login.css" rel='stylesheet' type='text/css' />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
<body>
	
	<!-----start-main---->
	<div class="login-form">
		<h2><a href="login.php">Sign In</a></h2>
		<h1>Create Account</h1>
		<form action="" method="post">
			<?php if(isset($error)) : ?>
				<li>
					<p><?= $response["message"]; ?></p>
				</li>
            <?php endif; ?>
            <li>
                <i class="material-icons">how_to_reg</i><input type="text" class="text" name="name" placeholder="Your Full Name">
            </li>
            <li>
                <i class="material-icons">filter_9_plus</i><input type="number" name="age" placeholder="Your Age">
			</li>
			<li>
				<input type="text" class="text" name="email" placeholder="Email"><a href="#" class=" icon user"></a>
			</li>
			<li>
				<input type="password" name="password" placeholder="Password"><a href="#" class=" icon lock"></a>
			</li>
				<div class ="forgot">
				<!-- <h3><a href="#">Forgot Password?</a></h3> -->
				<input type="submit" name="submit" value="Register" > 
			</div>
		</form>
	</div>
</body>
</html>