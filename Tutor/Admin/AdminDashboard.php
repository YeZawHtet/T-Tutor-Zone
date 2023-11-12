<?php 
session_start();
include 'auth.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin Dashboard</title>
      
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico" />
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
      
      <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css">
      <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css">
      <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css">  </head>
  <body class=" " style="background-color: #8080ff;">
    <!-- loader Start -->
    <!-- <div id="loading">
          <div id="loading-center">
          </div>
    </div> -->
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
      
      <!-- Start Admin Sidebar -->
      <?php include 'adminsidebar.php' ?>
      <!-- End Admin Sidebar -->      
      
      <!-- Start Navbar -->
      <?php include 'navbar.php' ?>
      <!-- End Navbar -->
           
      <div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between">
                            <h5>Total Parents</h5>
                            <?php 
                            $r=mysqli_fetch_assoc(mysqli_query($con,"select Count(PaID) from Parent"));
                            ?>
                            <span class="badge badge-primary">All</span>
                        </div>
                        <h3><span class="counter"><?php echo $r['Count(PaID)'];?></span></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between">
                            <h5>Tutors</h5>
                            <?php 
                            $r1=mysqli_fetch_assoc(mysqli_query($con,"select Count(TutorID) from tutor"));
                            ?>
                            <span class="badge badge-warning">All</span>
                        </div>
                        <h3>    <span class="counter"><?php echo $r1['Count(TutorID)'];?></span></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between">
                            <h5>Income</h5>
                            <?php
                            $income=mysqli_fetch_assoc(mysqli_query($con, "select Sum(Amount) as income from payment"));
                            ?>
                            <span class="badge badge-success">All</span>
                        </div>
                        <h3><span class="counter"><?php echo $income['income'];?> MMK</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="top-block d-flex align-items-center justify-content-between">
                            <h5>Total Subjects</h5>
                            <?php 
                            $sub=mysqli_fetch_assoc(mysqli_query($con, "select Count(SubjectID) as subtotal from subject"))
                            ?>
                            <span class="badge badge-info">All</span>
                        </div>
                        <h3><span class="counter"><?php echo $sub['subtotal'];?></span></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card-transparent card-block card-stretch card-height">
                    <div class="card-body p-0">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Monthly Overview Progress</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-inline p-0 mb-0">
                                    <li class="mb-1">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Employement</p>
                                            </div>
                                            <?php 
                                            $emp=mysqli_fetch_assoc(mysqli_query($con, "select Count(BookingDetailID) as t from bookingdetail where Status='Confirmed'"));
                                            ?>
                                            <div class="col-sm-9">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="iq-progress-bar bg-secondary-light">
                                                        <span class="bg-secondary iq-progress progress-1" data-percent="65"></span>
                                                    </div>
                                                    <span class="ml-3">65%</span>
                                                </div>                                                                
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-1">
                                        <div class="d-flex align-items-center justify-content-between row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Income</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="iq-progress-bar bg-primary-light">
                                                        <span class="bg-primary iq-progress progress-1" data-percent="59"></span>
                                                    </div>
                                                    <span class="ml-3">59%</span>
                                                </div>                                                                
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4" >
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="card border-bottom pb-2 shadow-none">
                            <div class="card-body text-center inln-date flet-datepickr">
                                <input type="text" id="inline-date" class="date-input basicFlatpickr d-none" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
      </div>
    </div>
    <!-- Wrapper End-->

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