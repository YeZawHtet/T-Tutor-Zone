<?php 
if(!isset($_SESSION['TutorID'])){
  echo "<script> alert('Login Firt'); </script>";
  header ('location: ../Home/index.php');
  exit();
}?>