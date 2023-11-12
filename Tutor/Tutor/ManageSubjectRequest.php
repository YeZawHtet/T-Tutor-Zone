<?php 
session_start();
$tutorID=$_SESSION['TutorID'];
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Tutor Manage Requested Subject</title>

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
      <?php
      include('database.php');
      if (isset($_POST['addSubject'])) {
         $subjectName = $_POST['subjectName'];
         $sql = "select * from SubjectRequest where SubjectName='$subjectName' and TutorID=$tutorID";
         $select = mysqli_query($con, $sql);
         $count = mysqli_num_rows($select);
         $count1 =mysqli_num_rows(mysqli_query($con,"select * from subject where SubjectName='$subjectName'"));
         
         if ($count || $count1) {
            echo "<script>alert('This Subject is Already Exists!');</script>";
         } else {
            $add = "INSERT INTO SubjectRequest (SubjectName, TutorID) values ('$subjectName', $tutorID)";
            $flag = mysqli_query($con, $add);
            echo "<script>alert('Successfully Added!'); header(location:ManageSubjectRequest.php);</script>";
         }
        

      }
      ?>
      <div class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-4 col-lg-4">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Request A Subject</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <form method="post">
                           <div class="form-group">
                              <label for="SubjectName">Subject Name:</label>
                              <input type="text" name="subjectName" class="form-control">
                           </div>
                           <button type="submit" class="btn btn-primary" name='addSubject'>Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-sm-8 col-lg-8">
                  <?php include 'SubjectList.php' ?>
               </div>
            </div>
         </div>
      </div>
      <!-- Form End -->
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