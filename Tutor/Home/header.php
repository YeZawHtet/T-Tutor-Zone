<?php
include 'loginfortutor.php';
include 'loginforparent.php';
?>
<head>
	<title>T TutorZone</title>
	<meta charset="UTF-8">
	<meta name="description" content="Real estate HTML Template">
	<meta name="keywords" content="real estate, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<!-- stylesheets for loginform -->
	<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<!-- Font special for pages-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Main CSS-->
	<link href="css/main.css" rel="stylesheet" media="all">
	<!--remo ve after-->
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900%7cRoboto:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/slicknav.min.css" />


	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/aa.css" />
</head>

<body>
	<header class="header-section">
		<a href="#" class="site-logo">
			<img style="position:relative; left:-50px; width: 150px; height: 100px; opacity:.5; border-radius: 10px;" src="Image/book.png" alt="Logo Photo">
		</a>
		<nav class="header-nav">
			<ul class="main-menu">
				<li><a href="index.php" class="active">Home</a></li>
				<li><a href="Search.php">Search</a></li>
				<li><a href="#">For students</a>
					<ul class="sub-menu">
						<li>
							<h6>Our Services</h6>
						</li>
						<li><a href="#">Browse by Learning Field</a>
							<ul class="sub-menu a">
								<?php
								include 'database.php';
								$q = "select * from Category";
								$res = mysqli_query($con, $q);
								while ($row = mysqli_fetch_assoc($res)) {
								?>
									<li><a href="tutorlist.php?caid=<?php echo $row['CategoryID']; ?>"><?php echo $row['CategoryName']; ?></a></li>
								<?php } ?>
							</ul>
						</li>
						<li><a href="#">Browse by Subject</a>
							<ul class="sub-menu a">
								<?php
								$q1 = "select * from Subject Group By SubjectName";
								$res = mysqli_query($con, $q1);
								while ($row1 = mysqli_fetch_assoc($res)) {
								?>
									<li><a href="tutorlist.php?subid=<?php echo $row1['SubjectID']; ?>"><?php echo $row1['SubjectName']; ?></a></li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</li>

				<li><a href="#">For tutors</a>
					<ul class="sub-menu">
						<li>
							<h6>Our Services</h6>
						</li>
						<li><a href="#">Tuition Job by city</a>
							<ul class="sub-menu">
								<?php
								include 'database.php';
								$q = "select * from city group by CityName";
								$res = mysqli_query($con, $q);
								while ($row = mysqli_fetch_assoc($res)) {
								?>
									<li><a href="parentlist.php?cityname=<?php echo $row['CityName']; ?>"><?php echo $row['CityName']; ?></a></li>
								<?php } ?>
							</ul>
						</li>
						<li><a href="#">Tuition Job by Subject</a>
							<ul class="sub-menu">
								<?php
								include 'database.php';
								$q = "select * from subject group by SubjectName";
								$res = mysqli_query($con, $q);
								while ($row = mysqli_fetch_assoc($res)) {
								?>
									<li><a href="parentlist.php?subname=<?php echo $row['SubjectName']; ?>"><?php echo $row['SubjectName']; ?></a></li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</li>
				<li><a href="aboutUsPage.php">AboutUs</a></li>
				<li><a href="contact us.php" class="contact us">Contact us</a></li>
				<li><a href="#" class="login" style="border: double; border-radius: 12px; border-color: black; background-color: black; padding:5px 10px;">Login</a>
					<ul class="sub-menu">
						<li style="padding-left:20px; padding-bottom:10px;">
							<button style="background-color: blue; padding:5px; margin-bottom:5px; border-radius:20px;" id="loginfortutor" onclick="showtutorloginform()">Login for Tutor</button>
						</li>
						<li style="padding-left:20px; padding-bottom:10px;">
							<button style="background-color: blue; padding:5px; margin-bottom:5px; border-radius:20px;" id="loginforparent" onclick="showparentloginform()">Login for Parent</button>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>

	<script>
		function showtutorloginform() {
			tutorlogincontainer.style.display = 'block';
			parentlogincontainer.style.display = 'none';
		}

		function showparentloginform() {
			parentlogincontainer.style.display = "block";
			tutorlogincontainer.style.display = 'none';
		}
	</script>
</body>

