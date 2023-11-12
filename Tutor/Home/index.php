<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>T TutorZone</title>
	<meta charset="UTF-8">
	<meta name="description" content="Real estate HTML Template">
	<meta name="keywords" content="real estate, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/aa.css" />
</head>
<body>
	<!-- Header Section -->
	<?php include 'header.php' ?>
	<?php if(isset($_GET['display'])){
		$d=$_GET['display'];
		if($d==1){
		echo "<script> showtutorloginform();  </script>";
		}else{
			echo "<script> showparentloginform();</script>";
		}
	}?>
	<!-- Header Section end -->

	<!-- Hero Section start -->
	<section class="hero-section set-bg" style="background-color:rgba(0, 0, 0, 0.5);">
		<div class="hero-warp" style="position:absolute; top:40%; background-color:#CCCCFF;">
			<h3 style=" text-align: center; color:green;">Choose Your Desire Tutor And Job
			</h3>
			<form class="main-search-form">
				<div class="spider">
					<button class="btn" style="background-color: #f39c12; font-weight:900; color: #CCCCFF;"><a href="Search.php">Find a tutor</a></button>
				</div>
				<div class="spider">
					<button class="btn" style="background-color: #f39c12; font-weight:900; color: #CCCCFF;"><a href="tutorregisterform.php">Become a tutor</a></button>
				</div>
			</form>
		</div>
	</section>
	<!-- Hero Section end -->

	<!-- Intro Section start -->
	<section class="intro-section spad" style="padding-top: 10px; margin-top: 10px;">
		<div class="container">
			<div class="section-title">
				<h2>Find Faster. Save Thousands.</h2>
			</div>
			<div class="row intro-first">
				<div class="col-lg-6 order-lg-2">
					<img style="width: 100%; height: 100%; border-radius: 10%;" src="image/tutorandstudent.jpg" alt="tutor photo">
				</div>
				<div class="col-lg-6 order-lg-1">
					<div class="about-text">
						<h5 style="line-height: 30px;">You are trying to find right tutor with right price and right skill or you are trying to save your time? Our website can helps you to solve them. Join and find the your desire tutors. If you are also a tutor, our website can helps you to find your jobs easily.</h5>
						<a href="#" class="readmore-btn">Find out more</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<img style="height: 100%; width: 100%; border-radius: 10%;" src="image/handshake.jpg" alt="image">
				</div>
				<div class="col-lg-6 ">
					<div class="about-text">
						<h5>No matter where you live, chances are we can introduce you to an amazing teacher in your neighborhood. You can take lessons in the privacy of your own home or at your teacher's location.</h5>
						<a href="#" class="readmore-btn">Find out more</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro Section end -->

	<!-- Footer Section start -->
	<footer class="footer-section">
		<h3 style="color: yellow; padding-top: 10px; text-align: center;"> Useful Information for Tutors and Parents</h3>
		<div class="container">

			<div class="row text-white">

				<div class="col-lg-4">
					<div class="footer-widger">
						<h2 style="color: yellow;">Starting In T TutorZone</h2>
						<ul>
							<li><a href="#">How to start tutoring at T TutorZone</a></li>
							<li><a href="#">How to find a tutor at T TutorZone</a></li>
							<li><a href="#">The Benefits of a Scientific Education</a></li>
							<li><a href="#">The Importance of Education in Everyday Life</a></li>
							<li><a href="#">Useful Information for Tutor</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="footer-widger">
						<h2 style="color: yellow;">Popular Subjects</h2>
						<ul>
							<li><a href="#">Maths</a></li>
							<li><a href="#">English</a></li>
							<li><a href="#">Biology</a></li>
							<li><a href="">Chemetry</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="footer-widger">
						<h2 style="color: yellow;">Popular Tutor Jobs</h2>
						<ul>
							<li><a href="#">Maths Tutor Jobs</a></li>
							<li><a href="#">English Tutor Jobs</a></li>
							<li><a href="#">Biology Tutor Jobs</a></li>
							<li><a href="">Chemetry Tutor Jobs</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<?php include 'footer.php' ?>

	<!-- Footer Section end -->
	<!-- Jquery JS-->

	<!-- Main JS-->
	<script src="js/global.js"></script>
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>