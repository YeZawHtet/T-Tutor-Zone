<?php 
session_start(); 
$tutorID=$_SESSION['TutorID'];
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Manage Degree</title>

   <!-- Favicon -->
   <link rel="shortcut icon" href="../assets/images/favicon.ico" />
   <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
   <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
   <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
   <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">

   <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css">
   <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css">
   <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css">
</head>

<body class="  ">
   <!-- loader Start -->
   <!-- <div id="loading">
          <div id="loading-center">
          </div>
    </div> -->
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
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Add New Degree</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <form action="ManageDegree.php" method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <label for="class">DegreeName:</label>
                              <input type="text" class="form-control" name="degreeName">
                           </div>
                           <div class="form-group">
                              <label for="class">Achieved Date:</label>
                              <input type="date" class="form-control" name="achievedDate">
                           </div>
                           <div class="form-group">
                              <label for="class">Degree Image:</label>
                              <input type="file" id="degreeImage" accept="image/*" class="form-control" name="image">
                           </div>
                           <button type="submit" class="btn btn-primary" name="addDegree">Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-sm-8 col-lg-8">
                  <?php include 'DegreeList.php' ?>
               </div>
            </div>
         </div>

         <!-- Form End -->

         <!-- Start Insert -->
         <?php
         include('database.php');
         if (isset($_POST['addDegree'])) {
            $tutorID=$_SESSION['TutorID'];
            $degreeName = $_REQUEST['degreeName'];
            $achievedDate = $_REQUEST['achievedDate'];
            $degreeImage = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];

            $sql = "SELECT * FROM Degree WHERE DegreeName='$degreeName' and TutorID=$tutorID";
            $select = mysqli_query($con, $sql);
            $count = mysqli_num_rows($select);
            if ($count > 0) {
               echo "<script>alert('" . $degreeName . " is Already Exists!');</script>";
            } else {
               $add = "INSERT INTO Degree
      (DegreeName,DegreeImage, AchievedDate, TutorID) VALUES ('$degreeName', '$degreeImage', '$achievedDate', $tutorID)";
               $flag = mysqli_query($con, $add);
               if ($flag) {
                  move_uploaded_file($tmp, '../assets/images/degree/' . $degreeImage);
                  echo "<script>alert('" . $degreeName . " Successfully added!'); location.assign('ManageDegree.php');</script>";
               }
            }
         }
         ?>
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