<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Degree Update Form</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico" />
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
      
      <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css">
      <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css">
      <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css">  </head>
  <body class="  ">
    <!-- loader Start -->
    
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
      
      <!-- Start Admin Sidebar -->
      <?php include 'tutorsidebar.php' ?>
      <!-- End Admin Sidebar -->      
      
      <!-- Start Navbar -->
      <?php include 'navbar.php' ?>
      <!-- End Navbar -->
     
     
    <!-- Form Start -->
   
    <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-4 col-lg-4">
               <?php 
               include 'database.php';
               if(isset($_REQUEST['updateDegree'])){
                  $upID=$_GET['degreeupID'];
                  $DegreeName=$_REQUEST['degreeName'];
                  $DegreeImage=$_FILES['image']['name'];
                  $tmp=$_FILES['image']['tmp_name'];
                  $AchievedDate=$_REQUEST['achievedDate'];
                  $qry="UPDATE degree SET DegreeName='".$DegreeName."', DegreeImage='".$DegreeImage."', AchievedDate='".$AchievedDate."' WHERE DegreeID='".$upID."'";
                  move_uploaded_file($tmp,'../assets/images/degree/'.$DegreeImage);
                  mysqli_query($con, $qry) or die (mysqli_error($con));
                  echo "<script>alert('Degree Name updated Successful'); location.assign('ManageDegree.php');</script>";
               }
               else{
                  include("database.php");
                  $upID=$_GET['degreeupID'];
                  $query = "SELECT * FROM degree WHERE DegreeID='".$upID."'"; 
                  $result = mysqli_query($con, $query) or die ( mysqli_error($con));
                  $row = mysqli_fetch_assoc($result);
                  ?>
               <div class="card" class="updatedegree">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Update Degree</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="Degree Name">Degree Name:</label>
                           <input type="text" class="form-control" name="degreeName"  value="<?php echo $row['DegreeName'];?>" />
                        </div>
                        <div class="form-group">
                           <label for="Achieved Date">Achieved Date:</label>
                           <input type="date" class="form-control" name="achievedDate"  value="<?php echo $row['AchievedDate'];?>" />
                        </div>
                        <div class="form-group">
                           <label for="Degree Image">Degree Image:</label>
                           <input type="file" class="form-control" accept="image/*" name="image"  value="<?php echo $row['DegreeImage'];?>" />
                        </div>
                        <button type="submit" class="btn btn-primary" name="updateDegree">Update</button>
                     </form>
                  </div>
               </div>
            </div>
            <?php
    } ?>
            <div class="col-sm-8 col-lg-8">
                <?php include 'DegreeList.php' ?>
            </div>
         </div>
      </div>
      
    <!-- Form End -->

     <!-- Start Insert -->
    
      <!-- End Insert -->

    <!-- footer start -->
    <?php include 'footer.php'; ?>

    <!-- footer end -->
    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="../assets/js/table-treeview.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="../assets/js/chart-custom.js"></script>
    <!-- Chart Custom JavaScript -->
    <script async src="../assets/js/slider.js"></script>
    
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
    
    <script src="../assets/vendor/moment.min.js"></script>
  </body>
</html>