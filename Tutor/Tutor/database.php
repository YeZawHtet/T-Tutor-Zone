<?php 
$host="localhost";
$user="root";
$password="";
$db="tutordb";
$con=mysqli_connect($host,$user,$password,$db);
if (mysqli_connect_error()!=null)
{
	echo "Error Found!";
}
 ?>