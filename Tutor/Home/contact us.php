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
	<link rel="stylesheet" href="css/style.css" />
	<style>
		.container {
			display: flex;
			justify-content: space-around;
			min-height: 70%;
			min-width: 100%;
			align-items: center;
		}

		form {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}
		.info{
			text-align: center;
			padding: 30px;
		}
		.info h6{
			padding: 20px;
		}
		
		h4{
			margin-bottom: 40px;
		}

		form {
			padding: 10px;
			margin: 10px;
			width: 500px;
			border-radius: 10px;
			outline: none;
		}
		form .m10{
			margin-top: 10px;
		}
	</style>
</head>

<body>
	<?php include('header.php'); ?>
	<div class="container" style="background:url(Image/bodybg.jpg);">
		<div class="info">
			<h4>Contact Information</h4>
			<h6>Mandalay, Myanmar</h6>
			<h6>09-899885101</h6>
			<h6>trojan@gmail.com</h6>
		</div>
			<form action="" method="POST">
			<h4>Contact Us here</h4	>
			<input type="text" name="name" placeholder="Enter Your Name" class="form-control m10" required>
			<input type="email" name="email" placeholder="Enter Your Email" class="form-control m10" required>
			<textarea name="message" placeholder="Enter Your Message"class="form-control m10" required></textarea>
			<input type="submit" style="background-color:green; color:white;" class="form-control m10" name="submitbtn" value="Sent">
			</form>
	</div>
	<?php
	include('database.php');
	if(isset($_REQUEST['submitbtn'])){
		$cname=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$message=$_REQUEST['message'];
		$qry="Insert into contactus (ContactName, Email, MessageText) values ('$cname', '$email', '$message')";
		$res=mysqli_query($con,$qry);
		echo "<script>alert('Successfully!');</script>;";
	}
	?>

	<?php include 'footer.php' ?>
	<!-- Footer Section end -->
	<script src="js/global.js"></script>
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>