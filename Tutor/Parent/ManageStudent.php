<?php
session_start();
$parentID = $_SESSION['PaID'];
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Parent Manage Student</title>

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
  <div id="loading">
    <div id="loading-center">
    </div>
  </div>
  <!-- loader END -->
  <?php
  include 'navbar.php';
  include 'parentsidebar.php';
  ?>
  <!-- Wrapper Start -->
  <div class="wrapper">
    <div class="content-page">
      <div class="container-fluid">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                    <h4 class="card-title">New Student Information</h4>
                  </div>
                </div>
                <div class="card-body">
                  <div class="new-user-info">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" required name="name" placeholder="First Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="name">StudentImage:</label>
                        <input type="file" class="form-control" required name="img">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="dob">DOB:</label>
                        <input type="date" class="form-control" required name="dob">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Gender:</label>
                        <select class="form-control" name="gender" required>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary">Add New User</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-lg-8">
              <?php include 'StudentList.php'; ?>
            </div>
          </div>
        </form>
        <?php
        if (isset($_POST['add'])) {
          $parentID = $_SESSION['PaID'];
          $name = $_POST['name'];
          $dob = $_POST['dob'];
          $gender = $_POST['gender'];
          $img = $_FILES['img']['name'];
          $tmp = $_FILES['img']['tmp_name'];
          move_uploaded_file($tmp, '../assets/images/parent/student/'.$img);
          $r = mysqli_query($con, "insert into student (StudentName, PaID, DateofBirth, Gender, StudentImage) values ('$name', $parentID, '$dob', '$gender', '$img')");
          echo "<script> alert('Success'); location.assign('ManageStudent.php'); </script>";
        }
        ?>
      </div>
    </div>
  </div>
  <!-- Wrapper End-->
  <footer class="iq-footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
            <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
          </ul>
        </div>
        <div class="col-lg-6 text-right">
          <span class="mr-1">
            <script>
              document.write(new Date().getFullYear())
            </script>©
          </span> <a href="#" class="">T Tutor Zone</a>.
        </div>
      </div>
    </div>
  </footer>
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