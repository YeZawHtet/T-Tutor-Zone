<?php
session_start();
include 'auth.php';
$tutorID = $_SESSION['TutorID'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tutor Dashboard</title>

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

        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-around">
                                    <h5>Total Students</h5>
                                    <span class="badge badge-primary">All</span>
                                </div>
                                <?php
                                include 'database.php';
                                $a = mysqli_fetch_assoc(mysqli_query($con, "select Count(bd.BookingDetailID) from bookingdetail bd, tutor t, subjecttutor st where bd.SubjectTutorID=st.SubjectTutorID and st.TutorID=t.TutorID and t.TutorID=$tutorID and bd.Status='Confirmed!'"));
                                ?>
                                <h3 style="text-align:center;"><span class="counter"><?php echo $a['Count(bd.BookingDetailID)']; ?></span></h3>
                                <div class="iq-progress-bar bg-warning-light mt-2">
                                    <span class="bg-warning iq-progress progress-1" data-percent="<?php echo $a['Count(bd.BookingDetailID)']; ?>"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Booking</h5>
                                    <span class="badge badge-warning">Pending</span>
                                </div>
                                <?php
                                $aa = mysqli_fetch_assoc(mysqli_query($con, "select Count(bd.BookingDetailID) from bookingdetail bd, tutor t, subjecttutor st where bd.SubjectTutorID=st.SubjectTutorID and st.TutorID=t.TutorID and t.TutorID=$tutorID and bd.Status='Pending!'"));
                                ?>
                                <h3 style="text-align:center;"><span class="counter"><?php echo $aa['Count(bd.BookingDetailID)']; ?></span></h3>
                                <div class="iq-progress-bar bg-warning-light mt-2">
                                    <span class="bg-warning iq-progress progress-1" data-percent="<?php echo $aa['Count(bd.BookingDetailID)']; ?>"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Booking</h5>
                                    <span class="badge badge-success">Confirmed</span>
                                </div>
                                <?php
                                $aaa = mysqli_fetch_assoc(mysqli_query($con, "select Count(bd.BookingDetailID) from bookingdetail bd, tutor t, subjecttutor st where bd.SubjectTutorID=st.SubjectTutorID and st.TutorID=t.TutorID and t.TutorID=$tutorID and bd.Status='Confirmed!'"));
                                ?>
                                <h3><span class="counter"><?php echo $aaa['Count(bd.BookingDetailID)']; ?></span></h3>
                                <div class="iq-progress-bar bg-success-light mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="<?php echo $aaa['Count(bd.BookingDetailID)']; ?>"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Member Type</h5>
                                    <?php
                                    $b = mysqli_fetch_assoc(mysqli_query($con, "select * from tutor t, payment p, charge c where t.TutorID=p.TutorID and p.ChargeID=c.ChargeID and t.TutorID=$tutorID and t.TutorStatus='Verified'"));
                                    ?>
                                    <span class="badge badge-info"><?php echo $b['ChargeType'] ?? "Not a Member"; ?></span>
                                </div>
                                <h3><span class="counter">
                                    <?php echo $b['noOfSubjects'] ?? '0'; ?></span></h3>
                                <div class="iq-progress-bar bg-info-light mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="<?php echo $b['noOfSubjects']; ?>"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card-transparent card-block card-stretch card-height">
                            <div class="card-body p-0">
                                <div class="card">
                                    <div class="card-header d-flex justify-conent-between">
                                        <div class="header-title">
                                            <h4 class="card-title">Course Lists</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <ul class="list-inline p-0 mb-0">
                                            <li class="mb-1">
                                            <div class="row" style="background-color: black; color:white; border-radius:5px; display:flex; align-items:center; justify-content:center;">
                                                        <div class="col-sm-1">
                                                            <p class="mb-0">No.</p>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p class="mb-0">Subject</p>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <p class="mb-0">Class</p>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p class="mb-0">Category</p>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p class="mb-0">Plan</p>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p class="mb-0">Price</p>
                                                        </div>
                                                    </div>
                                                <?php
                                                include 'database.php';
                                                $qry = "select * from subjecttutor where TutorID=$tutorID";
                                                $num = 1;
                                                $result = mysqli_query($con, $qry);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $classID = $row['ClassID'];
                                                    $categoryID = $row['CategoryID'];
                                                    $subjectID = $row['SubjectID'];
                                                    $subqry = "select * from subject where SubjectID=$subjectID";
                                                    $subres = mysqli_query($con, $subqry);
                                                    $subrow = mysqli_fetch_assoc($subres);
                                                    $cqry = "select * from Class where ClassID = $classID";
                                                    $cr = mysqli_query($con, $cqry);
                                                    $crow = mysqli_fetch_assoc($cr);
                                                    $caqry = "select * from Category where CategoryID = $categoryID";
                                                    $car = mysqli_query($con, $caqry);
                                                    $carow = mysqli_fetch_assoc($car);
                                                ?>
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <p><?php echo $num;
                                                                $num++; ?></p>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p class="mb-0"><?php echo $subrow['SubjectName']; ?></p>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <p><?php echo $crow['ClassName']; ?></p>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p><?php echo $carow['CategoryName']; ?></p>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p class="mb-0"><?php echo $row['Plan']; ?></p>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p><?php echo $row['Price']; ?></p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                            </li>
                                        <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
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