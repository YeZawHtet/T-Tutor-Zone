<?php
session_start();
$parentID = $_SESSION['PaID'];
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Student</title>

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
    <?php include 'parentsidebar.php' ?>
    <!-- End Admin Sidebar -->

    <!-- Start Navbar -->
    <?php include 'navbar.php' ?>
    <!-- End Navbar -->


    <!-- Form Start -->

    <div class="content-page">
      <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
            <?php 
               include 'database.php';
               if(isset($_REQUEST['Update'])){
                  $upID=$_GET['studentupID'];
                  $StudentName=$_REQUEST['name'];
                  $image=$_FILES['img']['name'];
                  $tmp=$_FILES['img']['tmp_name'];
                  $dob=$_REQUEST['dob'];
                  $gender=$_REQUEST['gender'];
                  $qry="UPDATE student SET StudentName='".$StudentName."', StudentImage='".$image."', DateofBirth='".$dob."', Gender='".$gender."' WHERE StudentID='".$upID."'";
                  move_uploaded_file($tmp,'../assets/images/parent/student/'.$image);
                  mysqli_query($con, $qry) or die (mysqli_error($con));
                  echo "<script>alert('Updated Successful'); location.assign('ManageStudent.php');</script>";
               }
               else{
                  include("database.php");
                  $upID=$_GET['studentupID'];
                  $query = "SELECT * FROM student WHERE StudentID='".$upID."'"; 
                  $result = mysqli_query($con, $query) or die ( mysqli_error($con));
                  $row = mysqli_fetch_assoc($result);
                  ?>
              <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                    <h4 class="card-title">New Student Information</h4>
                  </div>
                </div>
                <div class="card-body">
                  <div class="new-user-info">
                  <form method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $row['StudentName']; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="name">StudentImage:</label>
                        <input type="file" class="form-control" name="img" value="<?php echo $row['StudentImage']; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="dob">DOB:</label>
                        <input type="date" class="form-control" name="dob" value="<?php echo $row['DateofBirth']; ?>">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Gender:</label>
                        <select class="form-control" name="gender" required>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <button type="submit" name="Update" class="btn btn-primary">Update</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
               <?php } ?>
            </div>
          
        </div>
        <div class="row">
          <div class="col-xl-12 col-lg-8">
            <?php include 'StudentList.php'; ?>
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