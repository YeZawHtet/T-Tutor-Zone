<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Parent List</title>

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

<body style="background-color:  #1b4f72 ;">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <?php
    include 'header.php';

    ?>
    <!-- Wrapper Start -->
    <div id="grid" class="item-content animate__animated animate__fadeIn active" data-toggle-extra="tab-content">
        <div class="row py-3">
            <?php
            include 'database.php';
            if (isset($_GET['cityname'])) {
                $cityname = $_GET['cityname'];
                $qry = "select * from parent where PaCityName = '$cityname'";
                $res = mysqli_query($con, $qry);
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card-transparent card-block card-stretch card-height">
                            <div class="card-body text-center p-0">
                                <div class="item">
                                    <div class="odr-img">
                                        <img src="../assets/images/parent/<?php echo $row['ParentImage']; ?>" class="img-fluid rounded-circle avatar-90 m-auto" style="width:100px; height:100px;" alt="image">
                                    </div>
                                    <div class="odr-content rounded">
                                        <h4 class="mb-2"><?php echo $row['PaName']; ?></h4>
                                        <p class="mb-3"><?php echo $row['Email']; ?> </p>
                                        <ul class="list-unstyled mb-3">
                                            <li class="bg-secondary-light rounded-circle iq-card-icon-small mr-4"><i class="ri-mail-open-line m-0"></i></li>
                                            <li class="bg-primary-light rounded-circle iq-card-icon-small mr-4"><i class="ri-chat-3-line m-0"></i></li>
                                            <li class="bg-success-light rounded-circle iq-card-icon-small"><i class="ri-phone-line m-0"></i></li>
                                        </ul>
                                        <div class="pt-3 border-top">
                                            <a href="parentprofile.php?pID=<?php echo $row['PaID']; ?>" name="pID" class="btn btn-primary">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
            <?php
            if (isset($_GET['subname'])) {
                $subname = $_GET['subname'];
                $qry = "select p.* from parent p, subjectrequest sr where p.PaID=sr.PaID and sr.SubjectName='$subname'";
                $res = mysqli_query($con, $qry);
                while ($row1 = mysqli_fetch_assoc($res)) {
            ?>
                    <div class="col-lg-3 col-md-6 ml-3">
                        <div class="card-transparent card-block card-stretch card-height">
                            <div class="card-body text-center p-0">
                                <div class="item">
                                    <div class="odr-img">
                                        <img src="../assets/images/parent/<?php echo $row1['ParentImage']; ?>" class="img-fluid rounded-circle avatar-90 m-auto" style="width:100px; height:100px;" alt="image">
                                    </div>
                                    <div class="odr-content rounded">
                                        <h4 class="mb-2"><?php echo $row1['PaName']; ?></h4>
                                        <p class="mb-3"><?php echo $row1['Email']; ?> </p>
                                        <ul class="list-unstyled mb-3">
                                            <li class="bg-secondary-light rounded-circle iq-card-icon-small mr-4"><i class="ri-mail-open-line m-0"></i></li>
                                            <li class="bg-primary-light rounded-circle iq-card-icon-small mr-4"><i class="ri-chat-3-line m-0"></i></li>
                                            <li class="bg-success-light rounded-circle iq-card-icon-small"><i class="ri-phone-line m-0"></i></li>
                                        </ul>
                                        <div class="pt-3 border-top">
                                            <a href="parentprofile.php?pID=<?php echo $row['PaID']; ?>" name="pID" class="btn btn-primary">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
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
                    </span> <a href="#" class="">TutorZone</a>.
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