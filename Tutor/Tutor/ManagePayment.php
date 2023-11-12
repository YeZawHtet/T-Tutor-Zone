<?php
session_start();
$tutorID = $_SESSION['TutorID'];
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Manage Payment</title>

   <!-- Favicon -->
   <link rel="shortcut icon" href="../assets/images/favicon.ico" />
   <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
   <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
   <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
   <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">

   <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css">
   <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css">
   <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      if (isset($_POST['paymentsubmit'])) {
         $PaymentDate = date("Y-m-d");
         $ChargeType = $_POST['chargeType'];
         $Amount = $_POST['amount'];
         $image = $_FILES['img']['name'];
         $tmp = $_FILES['img']['tmp_name'];
         move_uploaded_file($tmp, '../assets/images/payment/' . $image);
         $qry = "select ChargeID from charge where Amount=$Amount";
         $res = mysqli_query($con, $qry);
         $row = mysqli_fetch_assoc($res);
         $chargeID = $row['ChargeID'];
         $r = mysqli_fetch_assoc(mysqli_query($con, "select * from payment where TutorID=$tutorID"));
         $oldAmount = $r['Amount'];
         if ($r) {
            $up = mysqli_query($con, "update Payment Set ChargeID=$chargeID, PaymentDate='$PaymentDate', Amount=$oldAmount+$Amount, Image='$image' where TutorID=$tutorID");
            $roo = mysqli_query($con, "update Tutor Set TutorStatus='Not Verified!' where TutorID=$tutorID");
            echo "<script> alert('Payment Updated Successfully!');</script>";
         } else {
            $add = "INSERT INTO Payment (TutorID, ChargeID, PaymentDate, Amount, Image) Values($tutorID, $chargeID, '$PaymentDate', $Amount, '$image')";
            $flag = mysqli_query($con, $add);
            echo "<script> alert('Payment Successfully'); location.assign('ManageSubject.php');</script>";
         }
      }
  
      ?>
      <div class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-8 col-lg-8">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Manage Payment</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                           <div class=" row align-items-center">
                              <div class="form-group col-sm-6">
                                 <label for="ChargeType">ChargeType:</label>
                                 <select id="myselect" class="form-control" name="chargeType" onchange="updateTextBox()">
                                    <?php
                                    $qry = "select * from Charge";
                                    $res = mysqli_query($con, $qry);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?><option value="<?php echo $row['Amount']; ?>">
                                          <?php echo $row['ChargeType']; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="form-group col-sm-6">
                                 <label for="amount">Amount:</label>
                                 <input type="text" class="form-control" id="mytext" name="amount" value="0" readonly>
                              </div>
                              <div class="form-group col-sm-6">
                                 <label for="Image">Image:</label>
                                 <input type="file" class="form-control" name="img" accept="image/*">
                              </div>
                           </div>
                           <button type="submit" name="paymentsubmit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-sm-4" style="position:relative;">
                  <div class="card card-block card-stretch card-height">
                     <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between">
                           <h5>Member Type</h5>
                           <?php
                           $cc=mysqli_num_rows(mysqli_query($con, "select * from payment where TutorID=$tutorID"));
                           if($cc){
                           $dd = mysqli_fetch_assoc(mysqli_query($con, "select * from payment where TutorID=$tutorID"));
                           $cdate = $dd['ConfirmDate'];
                           $edate = $dd['ExpireDate'];
                           if ($edate < $cdate) {
                              $r = mysqli_query($con, "update Tutor Set TutorStatus='Leave' where TutorID=$tutorID");
                           ?>
                              <span class="badge badge-info">Membership Expired </span>
                           <?php  } else if($edate=='Null') { ?>
                              <span class="badge badge-info">Membership Expired</span>
                              <?php } else {
                              $b = mysqli_fetch_assoc(mysqli_query($con, "select * from tutor t, payment p, charge c where t.TutorID=p.TutorID and p.ChargeID=c.ChargeID and p.ConfirmDate < p.ExpireDate and t.TutorID=$tutorID"));
                           ?>
                              <span class="badge badge-info"><?php echo $b['ChargeType'] ?? "Not a Member"; ?></span>
                        </div>
                        <h3><span class="counter">
                              <?php echo $b['noOfSubjects'] ?? '0'; ?></span></h3>
                        <div class="iq-progress-bar bg-info-light mt-2">
                           <span class="bg-info iq-progress progress-1" data-percent="<?php echo $b['noOfSubjects']; ?>"></span>
                        </div>
                        <div class="mt-4" style="position:absolute; left:20px; bottom:20px;">
                           <form method="post">
                              <input type="submit" name="unsetmember" class="btn btn-danger" value="Unsubscribe">
                           </form>
                        </div> <?php }} ?>
                     </div>
                  </div>
                  <!-- Unsubscribe Membership Start -->
                  <?php
                  if (isset($_POST['unsetmember'])) {
                     $r0 = mysqli_query($con, "update Tutor Set TutorStatus='Leave' where TutorID=$tutorID");
                     $rooo = mysqli_query($con, "update Payment set ExpireDate='Null' where TutorID=$tutorID");
                     echo "<script>Swal.fire({
                     title: 'Error!',
                     text: 'Do you want to Unsubscribe!',
                     icon: 'error',
                     confirmButtonText: 'OK'
                     })</script>";
                  }

              
                  ?>
                  <!-- Unsubscribe Membership End -->
               </div>
            </div>
         </div>
      </div>
      <!-- Form End -->
      <!-- footer start -->
      <?php include 'footer.php'; ?>
      <script>
         function updateTextBox() {
            var selectValue = document.getElementById("myselect").value;
            document.getElementById("mytext").value = selectValue;
         }
      </script>
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