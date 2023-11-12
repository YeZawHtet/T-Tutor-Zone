<?php
session_start();
$tutorID = $_SESSION['TutorID'];
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Manage Booking</title>

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

               <div class="col-sm-12 col-lg-12">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Booking List</h4>
                        </div>
                        <div class="header-title">
                           <button class="btn btn-primary"><a style="color:black;" href="../Home/index.php">Search Tutoring Jobs</a></button>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="datatable" class="table data-table table-striped">
                              <thead>
                                 <tr class="ligth">
                                    <th>No.</th>
                                    <th>Student Name</th>
                                    <th>Subject Name</th>
                                    <th>Class</th>
                                    <th>Category</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>JoinDate</th>
                                    <th>JoinTime</th>
                                    <th style="min-width: 100px">Action</th>
                                 </tr>
                              </thead>

                              <tbody>
                                 <?php
                                 include('database.php');
                                 $r = mysqli_query($con, "select * from bookingdetail b, subjecttutor s, tutor t Where b.SubjectTutorID=s.SubjectTutorID and s.TutorID=t.TutorID and t.TutorID=$tutorID");
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
                                    <tr>
                                       <td><?php echo $num;
                                             $num++; ?></td>
                                       <td><?php echo $a['StudentName']; ?></td>
                                       <td><?php echo $b['SubjectName']; ?></td>
                                       <td><?php echo $c['ClassName']; ?></td>
                                       <td><?php echo $d['CategoryName']; ?></td>
                                       <td><?php echo $row['Message']; ?></td>
                                       <td><span class="badge badge-warning"><?php echo $row['Status']; ?></span></td>
                                       <td><?php echo $row['JoinDate']; ?></td>
                                       <td><?php echo $row['JoinTime']; ?></td>
                                       <td>
                                          <div class="flex align-items-center list-user-action">
                                             <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Confirm" href="ViewBooking.php?cID=<?php echo $row['BookingDetailID']; ?>" name="bookingdetail"><i class="ri-pencil-line mr-0"></i></a>
                                             <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reject" href="ViewBooking.php?rID=<?php echo $row['BookingDetailID']; ?>" name="deleteBookingDetail"><i class="ri-delete-bin-line mr-0"></i></a>
                                          </div>
                                       </td>
                                    </tr>
                                 <?php
                                 }
                                 ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php
   if(isset($_GET['cID'])){
      $cID=$_GET['cID'];
      $h=mysqli_query($con, "Update BookingDetail Set Status='Confirmed!' where BookingDetailID=$cID");
      echo "<script> alert('Confirmed this booking!'); location.assign('ViewBooking.php');</script>";
   }
   if(isset($_GET['rID'])){
      $rID=$_GET['rID'];
      $h=mysqli_query($con, "Update BookingDetail Set Status='Rejected!' where BookingDetailID=$rID");
      echo "<script> alert('Rejected this booking!'); location.assign('ViewBooking.php');</script>";
   }
   ?>
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