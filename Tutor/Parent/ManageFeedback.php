<?php
session_start();
$parentID = $_SESSION['PaID'];
?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <title>Giving Feedback</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+h4" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include 'database.php';
  if (isset($_GET['bookingdetailID'])) {
    $bookingdetailID = $_GET['bookingdetailID'];
    $r = mysqli_fetch_assoc(mysqli_query($con, "select * from bookingdetail bd, student s, parent p where bd.StudentID=s.StudentID and s.PaID=p.PaID and p.PaID=$parentID and bd.BookingDetailID=$bookingdetailID"));
    $pemail = $r['Email'];
  ?>
    <div class="container">
      <div class="card mt-5">
        <div class="card-header row">
          <h3 class="col-sm-6">Booking Information</h3>
          <h3 class="col-sm-6">Give Rating And Feedback</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6 text-center">
              <?php
              include('database.php');
              if (isset($_GET['bookingdetailID'])) {
                $bookingdetailID = $_GET['bookingdetailID'];
                $r = mysqli_query($con, "select * from bookingdetail b, subjecttutor s, student st Where b.SubjectTutorID=s.SubjectTutorID and b.StudentID=st.StudentID and st.PaID=$parentID and b.BookingDetailID=$bookingdetailID");
                while ($row = mysqli_fetch_assoc($r)) {
                  $studentID = $row['StudentID'];
                  $SubjectID = $row['SubjectID'];
                  $ClassID = $row['ClassID'];
                  $CategoryID = $row['CategoryID'];
                  $a = mysqli_fetch_assoc(mysqli_query($con, "select * from student where StudentID=$studentID"));
                  $b = mysqli_fetch_assoc(mysqli_query($con, "select * from subject where SubjectID=$SubjectID"));
                  $c = mysqli_fetch_assoc(mysqli_query($con, "select * from class where ClassID=$ClassID"));
                  $d = mysqli_fetch_assoc(mysqli_query($con, "select * from category where CategoryID=$CategoryID"));

                  $num = 1;
              ?>
                  <div style="padding:10px; background-color:black; color:white;">
                    <div class="row">
                      <p class="col-sm-4">NO. </p>
                      <p class="col-sm-4">-----</p>
                      <p class="col-sm-4"><?php echo $num;
                                          $num++; ?></p>
                    </div>
                    <div class="row">
                      <p class="col-sm-4">Name </p>
                      <p class="col-sm-4">-----</p>
                      <p class="col-sm-4"><?php echo $a['StudentName']; ?></p>
                    </div>
                    <div class="row">
                      <p class="col-sm-4">Subject </p>
                      <p class="col-sm-4">-----</p>
                      <p class="col-sm-4"><?php echo $b['SubjectName']; ?></p>
                    </div>
                    <div class="row">
                      <p class="col-sm-4">Class </p>
                      <p class="col-sm-4">-----</p>
                      <p class="col-sm-4"><?php echo $c['ClassName']; ?></p>
                    </div>
                    <div class="row">
                      <p class="col-sm-4">Category </p>
                      <p class="col-sm-4">-----</p>
                      <p class="col-sm-4"><?php echo $d['CategoryName']; ?></p>
                    </div>
                    <div class="row">
                      <p class="col-sm-4">Message </p>
                      <p class="col-sm-4">-----</p>
                      <p class="col-sm-4"><?php echo $row['Message']; ?></p>
                    </div>
                    <div class="row">
                      <p class="col-sm-4">Status</p>
                      <p class="col-sm-4">-----</p>
                      <p class="col-sm-4"><span class="badge badge-warning"><?php echo $row['Status']; ?></span></p>
                    </div>
                    <div class="row">
                      <p class="col-sm-4">JoinDate </p>
                      <p class="col-sm-4">-----</p>
                      <p class="col-sm-4"><?php echo $row['JoinDate']; ?></p>
                    </div>
                    <div class="row">
                      <p class="col-sm-4">JoinTime </p>
                      <p class="col-sm-4">-----</p>
                      <p class="col-sm-4"><?php echo $row['JoinTime']; ?></p>
                    </div>
                  </div>
              <?php
                }
              }
              ?>
            </div>
            <div class="col-sm-6">
              <form method="post">
                <div class="form-group">
                  <input type="number" name="rate" max="5" min="0" placeholder="Please Choose 1 From 5 Number Only" class="form-control" />
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" value="<?php echo $pemail; ?>" readonly />
                </div>
                <div class="form-group">
                  <textarea name="feedback" class="form-control" placeholder="Type Feedback Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                  <button type="submit" class="btn btn-primary" name="giverate">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php
  if (isset($_POST['giverate'])) {

    $bookingdetailID = $_GET['bookingdetailID'];
    $rate = $_REQUEST['rate'];
    $email = $_REQUEST['email'];
    $feedback = $_REQUEST['feedback'];
    $qq="select * from rating where Email='$email' and BookingDetailID=$bookingdetailID";
    $a = mysqli_num_rows(mysqli_query($con, $qq));
    if ($a) {
      echo "<script> alert('You have been Already Rate and Feedback');";
    } else {
      $q = "insert into rating (BookingDetailID, Email, Rate, feedback) values ($bookingdetailID, '$email', $rate, '$feedback')";
      $a = mysqli_query($con, $q);
      echo "<script> alert('Success'); location.assign('ViewFeedback.php'); </script>;";
    }
  }
  ?>
</body>
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
</html>