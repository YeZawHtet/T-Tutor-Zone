<?php
session_start();
include 'auth.php';
$parentID = $_SESSION['PaID'];
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
        <?php include 'parentsidebar.php' ?>
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
                                $a = mysqli_fetch_assoc(mysqli_query($con, "Select Count(StudentID) from Student where PaID=$parentID"));
                                ?>
                                <h3 style="text-align:center;"><span class="counter"><?php echo $a['Count(StudentID)']; ?></span></h3>
                                <div class="iq-progress-bar bg-warning-light mt-2">
                                    <span class="bg-warning iq-progress progress-1" data-percent="<?php echo $a['Count(StudentID)']; ?>"></span>
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
                                $aa = mysqli_fetch_assoc(mysqli_query($con, "select Count(bd.BookingDetailID) from BookingDetail bd, Student s, Parent p where bd.StudentID=s.StudentID and s.PaID=p.PaID and p.PaID=$parentID and bd.Status='Pending!'"));
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
                                $aaa = mysqli_fetch_assoc(mysqli_query($con, "select Count(bd.BookingDetailID) from BookingDetail bd, Student s, Parent p where bd.StudentID=s.StudentID and s.PaID=p.PaID and p.PaID=$parentID and bd.Status='Confirmed!'"));
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
                                    <h5>Booking</h5>
                                    <?php
                                    $b = mysqli_fetch_assoc(mysqli_query($con, "select Count(bd.BookingDetailID) from BookingDetail bd, Student s, Parent p where bd.StudentID=s.StudentID and s.PaID=p.PaID and p.PaID=$parentID and bd.Status='Rejected!'"));
                                    ?>
                                    <span class="badge badge-danger">Rejected</span>
                                </div>
                                <h3><span class="counter">
                                        <?php echo $b['noOfSubjects'] ?? '0'; ?></span></h3>
                                <div class="iq-progress-bar bg-info-light mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="<?php echo $b['noOfSubjects']; ?>"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-8">
                        <h3><b>Newest Tutor</b></h3>
                        <?php
                        $r = mysqli_fetch_assoc(mysqli_query($con, "select * from tutor where TutorID=(select MAX(TutorID) from Tutor where TutorStatus='Verified')"));
                        ?>
                        <div class="card-transparent card-block card-stretch card-height">
                            <div class="card-body text-center p-0">
                                <div class="item">
                                    <div class="odr-img">
                                        <img src="../assets/images/tutor/<?php echo $r['Image']; ?>" class="img-fluid rounded-circle avatar-90 m-auto" alt="image">
                                    </div>
                                    <div class="odr-content rounded">
                                        <h4 class="mb-2"><?php echo $r['TutorName']; ?></h4>
                                        <p class="mb-3"><?php echo $r['Email']; ?> </p>
                                        <ul class="list-unstyled mb-3">
                                            <li class="bg-secondary-light rounded-circle iq-card-icon-small mr-4"><i class="ri-mail-open-line m-0"></i></li>
                                            <li class="bg-primary-light rounded-circle iq-card-icon-small mr-4"><i class="ri-chat-3-line m-0"></i></li>

                                            <li class="bg-success-light rounded-circle iq-card-icon-small"><i class="ri-award-fill"></i></li>
                                        </ul>
                                        <div class="pt-3 border-top">
                                            <a href="../Home/tutorprofile.php?tID=<?php echo $r['TutorID']; ?>" name="tutorID" class="btn btn-primary">View Profile</a>
                                        </div>
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