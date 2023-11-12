<?php 
session_start();
session_unset();
echo "<script>location.assign('../Home/index.php'); </script>";
 ?>