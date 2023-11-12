<?php session_start();
$tutorID = $_SESSION['TutorID'];
?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Subject Update Form</title>

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
                  <?php
                  include 'database.php';
                  if (isset($_POST['updateSubjectTutor'])) {
                     $subjecttutorupID=$_GET['subjecttutorupID'];
                     $subjectID = $_REQUEST['subjectName'];
                     $categoryID = $_REQUEST['categoryName'];
                     $classID = $_REQUEST['className'];
                     $plan=$_REQUEST['plan'];
                     $price=$_REQUEST['price'];
                     $qry = "UPDATE subjecttutor SET SubjectID=$subjectID, CategoryID=$categoryID, ClassID=$classID, Plan='".$plan."', Price='".$price."' WHERE SubjectTutorID=$subjecttutorupID";
                     mysqli_query($con, $qry) or die(mysqli_error($con));
                     echo "<script>alert('Updated Successful'); location.assign('ManageSubject.php');</script>";
                  } else {
                     include("database.php");
                     $subupID = $_GET['subjecttutorupID'];
                     $query = "SELECT * FROM subjecttutor WHERE SubjectTutorID='$subupID'";
                     $result = mysqli_query($con, $query) or die(mysqli_error($con));
                     $subjecttutor = mysqli_fetch_assoc($result);
                     $subjectID = $subjecttutor['SubjectID'];
                     $categoryID = $subjecttutor['CategoryID'];
                     $classID = $subjecttutor['ClassID'];
                  ?>
                     <div class="card" class="updatesubjecttutor">
                        <div class="card-header d-flex justify-content-between">
                           <div class="header-title">
                              <h4 class="card-title">Update SubjectTutor</h4>
                           </div>
                        </div>
                        <div class="card-body">
                           <form method="POST">
                              <div class="form-group">
                                 <label for="CategoryName">Subject Name:</label>
                                 <?php
                                 $r2 = mysqli_query($con, "select CategoryName from category where CategoryID=$categoryID");
                                 $rcategoryname = mysqli_fetch_assoc($r2);
                                 ?>
                                 <select name="subjectName" style="width:250px; height:50px; border-radius:20px; text-align:center;">
                                    <?php
                                    include('database.php');
                                    $sql = "SELECT * FROM subject where SubjectID=$subjectID";
                                    $result = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                    <option value="<?php echo $row['SubjectID'] ?>"><?php echo $row['SubjectName'] ?></option>
                                    <?php
                                    $sql = "SELECT * FROM subject where SubjectID <> $subjectID";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                       <option value="<?php echo $row['SubjectID'] ?>"><?php echo $row['SubjectName'] ?></option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="CategoryName">Category Name:</label>
                                 <?php
                                 $r2 = mysqli_query($con, "select CategoryName from category where CategoryID=$categoryID");
                                 $rcategoryname = mysqli_fetch_assoc($r2);
                                 ?>
                                 <select name="categoryName" style="width:250px; height:50px; border-radius:20px; text-align:center;">
                                    <?php
                                    include('database.php');
                                    $sql = "SELECT * FROM category where CategoryID=$categoryID ";
                                    $result = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                    <option value="<?php echo $row['CategoryID'] ?>"><?php echo $rcategoryname['CategoryName'] ?></option>
                                    <?php
                                    $sql = "SELECT * FROM category where CategoryID <> $categoryID";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                       <option value="<?php echo $row['CategoryID'] ?>"><?php echo $row['CategoryName'] ?></option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="ClassName">Class Name:</label>
                                 <select name="className" style="width:250px; height:50px; border-radius:20px; text-align:center;">
                                    <?php
                                    include('database.php');
                                    $sql = "SELECT * FROM class where ClassID='" . $classID . "' ";
                                    $result = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    ?>
                                    <option value="<?php echo $row['ClassID'] ?>"><?php echo $row['ClassName'] ?></option>
                                    <?php
                                    $sql = "SELECT * FROM class where ClassID <> '" . $row['ClassID'] . "'";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                       <option value="<?php echo $row['ClassID'] ?>"><?php echo $row['ClassName'] ?></option>
                                    <?php
                                    }
                                    ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="Plan">Plan:</label>
                                 <input type="text" class="form-control" name="plan" value="<?php echo $subjecttutor['Plan']; ?>" />
                              </div>
                              <div class="form-group">
                                 <label for="Plan">Price:</label>
                                 <input type="text" class="form-control" name="price" value="<?php echo $subjecttutor['Price']; ?>" />
                              </div>
                              <button type="submit" class="btn btn-primary" name="updateSubjectTutor">Update</button>
                           </form>
                        </div>
                     </div>
               </div>
            <?php
                  } ?>
            <div class="col-sm-8 col-lg-8">
               <?php include 'SubjectTutorList.php' ?>
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