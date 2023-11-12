<!-- Division Delete -->

<?php
include 'database.php';
if (isset($_GET['delID'])) {
	$DivisionID=$_REQUEST['delID'];
	$sql="DELETE FROM Division WHERE DivisionID=$DivisionID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('Delete Division successfully!!');
	location.assign('ManageDivision.php');
	</script>";
}
?>
<!-- End Division Delete -->
<?php
include 'database.php';
if (isset($_GET['tid'])) {
	$tid=$_REQUEST['tid'];
	$sql="DELETE FROM Tutor WHERE TutorID=$tid";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('Delete Tutor successfully!!');
	location.assign('ManageTutor.php');
	</script>";
}
?>

<?php
include 'database.php';
if (isset($_GET['subjectdelID'])) {
	$subjectdelID=$_REQUEST['subjectdelID'];
	$sql="DELETE FROM Subject WHERE SubjectID=$subjectdelID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('Delete Subject successfully!!');
	location.assign('ManageSubject.php');
	</script>";
}
?>

<?php
include 'database.php';
if (isset($_GET['pid'])) {
	$pid=$_REQUEST['pid'];
	$sql="DELETE FROM Parent WHERE PaID=$pid";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('Delete Parent successfully!!');
	location.assign('ManageParent.php');
	</script>";
}
?>

<?php
include 'database.php';
if (isset($_GET['pid'])) {
	$pid=$_REQUEST['pid'];
	$sql="DELETE FROM Parent WHERE PaID=$pid";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('Delete Parent successfully!!');
	location.assign('ManageParent.php');
	</script>";
}
?>
<!-- Start Category Delete -->
<?php
include 'database.php';
if (isset($_REQUEST['categorydelID'])) {
	$CategoryID=$_REQUEST['categorydelID'];
	$sql="DELETE FROM Category WHERE CategoryID=$CategoryID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('Delete Category successfully!!');
	location.assign('ManageCategory.php');
	</script>";
}
?>
<!-- End Category Delete -->

<!-- Start Charge Delete -->
<?php
include 'database.php';
if (isset($_REQUEST['chargedelID'])) {
	$ChargeID=$_REQUEST['chargedelID'];
	$sql="DELETE FROM Charge WHERE ChargeID=$ChargeID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('Delete Charge successfully!!');
	location.assign('ManageCharge.php');
	</script>";
}
?>
<!-- End Charge Delete -->

<!-- Start Class Delete -->
<?php
include 'database.php';
if (isset($_REQUEST['classdelID'])) {
	$ClassID=$_REQUEST['classdelID'];
	$sql="DELETE FROM Class WHERE ClassID=$ClassID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('Delete Class successfully!!');
	location.assign('ManageClass.php');
	</script>";
}
?>
<!-- End Class Delete -->
<!-- Start City Delete -->

<?php
if (isset($_GET['citydelID'])) {
	$CityID=$_REQUEST['citydelID'];
	include('database.php');
	$sql="DELETE FROM City WHERE CityID=$CityID";
	$return=mysqli_query($con,$sql);
	echo "<script>
	alert('Delete City successfully!!');
	location.assign('ManageCity.php');
	</script>";
}
?>
<!-- End City Delete -->