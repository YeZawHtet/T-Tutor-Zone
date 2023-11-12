<?php
if(session_status() != PHP_SESSION_ACTIVE){
	session_start();
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>T TutorZone</title>
	<meta charset="UTF-8">
	<meta name="description" content="Real estate HTML Template">
	<meta name="keywords" content="real estate, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	
    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/aa.css"/>
</head>
<body>
<div id="tutorlogincontainer" class="wrapper wrapper--w790" style="position:absolute; display:none; left:30%; z-index:1000;">
	<div class="card card-5">
		<div class="card-heading">
			<h2 class="title" style="position:relative;"> Login Form for tutor</h2>
			<button id="exit" onclick="eebutton();" style="position:absolute; top:10px; right:10px;"><svg fill="#ffffff" width="40px" height="40px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5 c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4 C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"></path> </g></svg></button>
		</div>
		<div class="card-body">
			<form method="POST">
				<div class="form-row">
					<div class="name">Email</div>
					<div class="value">
						<div class="input-group">
							<input class="input--style-5" type="email" name="email">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="name">Password</div>
					<div class="value">
						<div class="input-group">
							<input class="input--style-5" type="password" name="password">
						</div>
					</div>
				</div>

				<div>
					<button class="btn btn--radius-2 btn--red" name="tutorlogin" style="background-color: yellow" type="submit">Login</button>
				</div>
				<br>
				<a href="tutorregisterform.php"><b>Not Register?</b></a>
			</form>
		</div>
	</div>
</div>
<?php
include 'database.php';
if (isset($_REQUEST['tutorlogin'])) {
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$qry = "select * from tutor where Email='" . $email . "' And Password='".$password."'";
	$res = mysqli_query($con, $qry);
	$row = mysqli_num_rows($res);
	$retri = mysqli_fetch_assoc($res);
	if ($row) {
		$_SESSION['TutorID'] = $retri['TutorID'];
		echo "<script> alert('Success'); location.assign('../Tutor/TutorDashboard.php'); </script>";
	} else {
		echo "<script> alert('Login Fail'); </script>";
	}
}
?>
<script>
function eebutton(){
	document.getElementById('tutorlogincontainer').style.display='none';
}
</script>
	
	<!-- Footer Section end -->
	<!-- Jquery JS-->
	
    <!-- Main JS-->
    <script src="js/global.js"></script>
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>