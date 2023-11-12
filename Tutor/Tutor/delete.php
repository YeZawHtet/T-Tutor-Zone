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
if (isset($_GET['subjecttutordelID'])) {
	$subjecttutordelID=$_REQUEST['subjecttutordelID'];
	include('database.php');
	$sql="DELETE FROM SubjectTutor WHERE SubjectTutorID=$subjecttutordelID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('delete SubjectTutor successfully');
	location.assign('ManageSubject.php');
	</script>";
}
?>

<!-- SubjectRequest -->
<?php
if (isset($_GET['reqsubdelID'])) {
	$reqsubdelID=$_REQUEST['reqsubdelID'];
	include('database.php');
	$sql="DELETE FROM SubjectRequest WHERE SubjectRequestID=$reqsubdelID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('delete SubjectRequest successfully');
	location.assign('ManageSubjectRequest.php');
	</script>";
}
?>
<!-- SubjectRequest -->

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

