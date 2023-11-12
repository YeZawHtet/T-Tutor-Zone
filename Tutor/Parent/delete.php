<?php
if (isset($_GET['degreedelID'])) {
	$degreeID=$_REQUEST['degreedelID'];
	include('database.php');
	$sql="DELETE FROM degree WHERE degreeID=$degreeID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('delete Degree successfully');
	location.assign('ManageDegree.php');
	</script>";
}
?>

<?php
if (isset($_GET['degreedelID'])) {
	$degreeID=$_REQUEST['degreedelID'];
	include('database.php');
	$sql="DELETE FROM degree WHERE degreeID=$degreeID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('delete Degree successfully');
	location.assign('ManageDegree.php');
	</script>";
}
?>

<?php
if (isset($_GET['bookdelID'])) {
	$bookdelID=$_REQUEST['bookdelID'];
	include('database.php');
	$sql="DELETE FROM BookingDetail WHERE BookingDetailID=$bookdelID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('delete BookingDetail successfully');
	location.assign('ManageBooking.php');
	</script>";
}
?>

<?php
if (isset($_GET['subjectdelID'])) {
	$subjectID=$_REQUEST['subjectdelID'];
	include('database.php');

	$sql="DELETE FROM subject WHERE subjectID=$subjectID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('delete subject successfully');
	location.assign('ManageSubject.php');
	</script>";
}
?>

<?php
if (isset($_GET['studentdelID'])) {
	$StudentdelID=$_REQUEST['studentdelID'];
	include('database.php');
	$sql="DELETE FROM student WHERE StudentID=$StudentdelID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('delete Student successfully');
	location.assign('ManageStudent.php');
	</script>";
}
?>

<?php
if (isset($_GET['reqsubdelID'])) {
	$reqsubdelID=$_REQUEST['reqsubdelID'];
	include('database.php');
	$sql="DELETE FROM SubjectRequest WHERE SubjectRequestID=$reqsubdelID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('delete SubjectRequest successfully');
	location.assign('ManageSubject.php');
	</script>";
}
?>

