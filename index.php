<?php
session_start();
if(!isset($_SESSION["login"])) {
	header("Location: login.php");
}
require 'config/API.php';
$get_data = callAPI('GET', 'http://restful-api-movie-theatre.herokuapp.com/movie', false);
$response = json_decode($get_data, true);
$errors = $response['error'];
$movies = $response['data'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Movie Theatre</title>
<link href="css/bootstrap4.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/movie.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Movie Theatre" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- header-section-starts -->
	<div class="full">
		<div class="menu">
			<ul>
				<li><a class="active" href="index.php"><i class="home"></i></a></li>
				<li><a class="active" href="logout.php" onclick="return confirm('Are you sure want to logout ?')"><i class="material-icons" style="width:60px; height:60px; font-size: 48px; color:white">exit_to_app</i></a></li>
			</ul>
		</div>
		<div class="main" style="background: url(images/bg.jpeg) no-repeat 0px 0px">
		<!-- <div class="header" style="background: url(images/bg.jpg) no-repeat 300px 100px"> -->
			<div class="top-header">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" alt="logo XXII" /></a>
					<p>Kota Digivice Movie Theatre</p>
				</div>
				<div class="search">
					<form>
						<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
				<div class="movie-detail">
				</div>
		</div>

		<!-- slider -->
		<div class="review-slider">
			 <ul id="flexiselDemo1">
			<li><img src="images/r1.jpg" alt=""/></li>
			<li><img src="images/r2.jpg" alt=""/></li>
			<li><img src="images/r3.jpg" alt=""/></li>
			<li><img src="images/r4.jpg" alt=""/></li>
			<li><img src="images/r5.jpg" alt=""/></li>
			<li><img src="images/r6.jpg" alt=""/></li>
		</ul>
		</div>

		<div class="container-fluid mt-3 mb-3">
		<div class="row">
			<h1 class="mx-auto mb-5">Movie List</h1>
		</div>
		<div class="row list-film">
			<?php foreach ($movies as $row) : ?>
				<div class="col-md-5">
					<div class="card mb-3">
					<img src="<?= $row["poster"]; ?>" class="card-img-top" alt="..." height="600px">
					<div class="card-body">
						<h5 class="card-title"><?= $row["title"]; ?></h5>
						<p class="card-text">Release : <?= $row["release"]; ?></p>
					</div>
					<div class="card-body">
						<a href="#" class="card-link see-detail" data-id="<?= $row["_id"]; ?>">See Details</a>
					</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		</div>

		<div class="news">
			<div class="col-md-6 news-left-grid">
				<h3>Don’t be late,</h3>
				<h2>Book your ticket now!</h2>
				<h4>Easy, simple & fast.</h4>
				<a href="seat.php"><i class="book"></i>BOOK TICKET</a>
				<p>Get Discount up to <strong>10%</strong> if you are a member!</p>
			</div>
			<div class="col-md-6 news-right-grid">
				<h3>News</h3>
				<div class="news-grid">
					<h5>Lorem Ipsum Dolor Sit Amet</h5>
					<label>Nov 11 2014</label>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
				</div>
				<div class="news-grid">
					<h5>Lorem Ipsum Dolor Sit Amet</h5>
					<label>Nov 11 2014</label>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
				</div>
				<a class="more" href="#">MORE</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="more-reviews">
			 <ul id="flexiselDemo2">
			<li><img src="images/m1.jpg" alt=""/></li>
			<li><img src="images/m2.jpg" alt=""/></li>
			<li><img src="images/m3.jpg" alt=""/></li>
			<li><img src="images/m4.jpg" alt=""/></li>
		</ul>
			<script type="text/javascript">
		$(window).load(function() {
			
		  $("#flexiselDemo2").flexisel({
				visibleItems: 4,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: false,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 2
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 3
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>	
		</div>	
	<div class="footer">
		<a href="https://www.linkedin.com/in/reza-raka-ab8b79187/">rezaraka00@gmail.com</a>
		<div class="copyright">
			<p> Template by  <a href="http://w3layouts.com">  W3layouts</a> | Developed by <a href="https://www.github.com/Ertilu">Reza Raka Nugraha</a></p>
		</div>
	</div>	
	</div>
	</div>
	<div class="clearfix"></div>
	<script type="text/javascript">
		$(window).load(function() {	
			$("#flexiselDemo1").flexisel({
				visibleItems: 6,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: false,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 2
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 3
					},
					tablet: { 
						changePoint:768,
						visibleItems: 4
					}
				}
			});
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>	
	<script src="js/script.js"></script>
</body>
</html>