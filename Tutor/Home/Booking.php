<?php
session_start();
if(!isset($_SESSION['PaID'])){
  $_SESSION['ok']=1;
  echo "<script> location.assign('loginforparent.php?booknologin=1'); </script>";
}else{
  $parentID = $_SESSION['PaID'];
}
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
  <!-- <div id="loading">
    <div id="loading-center">
    </div>
  </div> -->
  <!-- loader END -->
  <?php
  include 'header.php';
  ?>
  <div class="container-fluid">
    <form method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-xl-12 col-lg-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <div class="header-title">
                <h4 class="card-title">Booking Information</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="new-user-info">
                <div class="row">
                  <form method="post">
                    <div class="form-group col-md-6">
                      <label for="division">StudentName:</label>
                      <select class="form-control" name="studentName" style="width:320px; height:50px; border-radius:20px; text-align:center;">
                        <?php
                        include('database.php');
                        $sql = "SELECT * FROM Student where PaID=$parentID";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <option value="<?php echo $row['StudentID'] ?>"><?php echo $row['StudentName'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">CourseInfo:</label>
                      <?php
                      $subjecttutorID = $_GET['bookID'];
                      $r = mysqli_fetch_assoc(mysqli_query($con, "select * from subjecttutor where subjecttutorID=$subjecttutorID"));
                      $sid = $r['SubjectID'];
                      $cid = $r['CategoryID'];
                      $clid = $r['ClassID'];
                      $a = mysqli_fetch_assoc(mysqli_query($con, "select * from Subject where SubjectID=$sid"));
                      $b = mysqli_fetch_assoc(mysqli_query($con, "select * from category where CategoryID=$cid"));
                      $c = mysqli_fetch_assoc(mysqli_query($con, "select * from class where ClassID=$clid"));
                      ?>
                      <input type="text" class="form-control" readonly name="name" value="<?php echo $a['SubjectName'], ' --- ', $b['CategoryName'], ' -- ', $c['ClassName']; ?>">
                    </div>
                    <div class="form-group col-md-12">
                      <label>Message:</label>
                      <textarea class="form-control" name="message" rows="3" style="line-height: 22px;"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                    <button type="submit" name="add" class="btn btn-primary form-control">Book</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <?php
    if (isset($_POST['add'])) {
      $subjecttutorID=$_GET['bookID'];
      $studentID = $_POST['studentName'];
      $message = $_POST['message'];
      $JoinDate=date('Y-m-d');
      $JoinTime=date('H:m:s');
      $status='Pending!';
      $r = mysqli_query($con, "insert into BookingDetail (Message, Status, JoinDate,JoinTime, StudentID, SubjectTutorID) values ('$message', '$status', '$JoinDate', '$JoinTime',  $studentID, $subjecttutorID)");
      echo "<script> alert('Success'); location.assign('index.php'); </script>";
    }
    ?>
  </div>

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