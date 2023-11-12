<?php 
if(!isset($_SESSION['AdminID'])){
  header ('location: AdminLogin.php');
  exit();
}?>