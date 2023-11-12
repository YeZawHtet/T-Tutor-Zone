<?php session_start();
include 'database.php';
$tutorID = $_SESSION['TutorID'];
$q = "select * from tutor where TutorID=$tutorID";
$res = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($res);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tutor Edit Profile</title>

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
        <?php
        include 'tutorsidebar.php';
        include 'navbar.php';
        ?>
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="iq-edit-list usr-edit">
                                    <ul class="iq-edit-profile d-flex nav nav-pills">
                                        <li class="col-md-4 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                                Tutor Personal Information
                                            </a>
                                        </li>
                                        <li class="col-md-4 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                                Change Password
                                            </a>
                                        </li>
                                        <li class="col-md-4 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#manage-contact">
                                                Intro and Experience
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-edit-list-data">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title"><?php echo $row['TutorName']; ?>'s Information</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="profile-img-edit">
                                                            <div class="crm-profile-img-edit">
                                                                <img class="crm-profile-pic rounded-circle avatar-100" src="../assets/images/tutor/<?php echo $row['Image']; ?>" alt="profile-pic">
                                                                <div class="crm-p-image bg-primary">
                                                                    <i class="las la-pen upload-button"></i>
                                                                    <input class="file-upload" name="img" type="file" accept="image/*">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" row align-items-center">
                                                    <div class="form-group col-sm-6">
                                                        <label for="name">Name:</label>
                                                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['TutorName']; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="email">Email:</label>
                                                        <input type="text" name="email" class="form-control" id="email" value="<?php echo $row['Email']; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="phone">Phone:</label>
                                                        <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $row['Phone']; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="nrc">NRC:</label>
                                                        <input type="text" name="nrc" class="form-control" id="nrc" value="<?php echo $row['NRC']; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Gender:</label>
                                                        <select class="form-control" name="gender" required>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="dob">Date Of Birth:</label>
                                                        <input type="date" name="dob" class="form-control" id="dob" value="<?php echo $row['DOB']; ?>">
                                                    </div>
                                                </div>
                                                <button type="submit" name="prosubmit" class="btn btn-primary mr-2">Submit</button>
                                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                            </form>
                                            <?php
                                            if (isset($_POST['prosubmit'])) {
                                                $name = $_POST['name'];
                                                $email = $_POST['email'];
                                                $phone = $_POST['phone'];
                                                $nrc = $_POST['nrc'];
                                                $gender = $_POST['gender'];
                                                $dob = $_POST['dob'];
                                                $image = $_FILES['img']['name'];
                                                $tmp = $_FILES['img']['tmp_name'];
                                                if($tmp==null){
                                                    $res = mysqli_query($con, "update tutor set TutorName='$name', Email='$email', Phone='$phone', NRC='$nrc', DOB='$dob', Gender='$gender' where TutorID= $tutorID");
                                                    echo "<script> alert('Updated Information'); location.assign('EditProfile.php');</script>";
                                                }else{
                                                $res = mysqli_query($con, "update tutor set TutorName='$name', Email='$email', Phone='$phone', NRC='$nrc', DOB='$dob', Gender='$gender', Image='$image' where TutorID= $tutorID");
                                                move_uploaded_file($tmp, '../assets/images/tutor/' . $image);
                                                echo "<script> alert('Updated Information'); location.assign('EditProfile.php');</script>";
                                            }}
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Change Password</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="cpass">Current Password:</label>
                                                    <a href="javascripe:void();" class="float-right">Forgot Password</a>
                                                    <input type="Password" class="form-control" id="cpass" name="curpassword" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="npass">New Password:</label>
                                                    <input type="Password" class="form-control" id="npass" name="npassword" value="" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="vpass">Verify Password:</label>
                                                    <input type="Password" class="form-control" id="vpass" value="" name="vpassword" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-2" name="passsubmit">Submit</button>
                                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                            </form>
                                            <?php if (isset($_POST['passsubmit'])) {
                                                $password = $row['Password'];
                                                $currentPassword = $_POST['curpassword'];
                                                $newPassword = $_POST['npassword'];
                                                $verifyPassword = $_POST['vpassword'];
                                                if ($currentPassword == $password) {
                                                    if ($newPassword == $verifyPassword) {
                                                        $res = mysqli_query($con, "Update tutor Set Password='$newPassword' Where TutorID=$tutorID");
                                                        echo "<script> alert('Successfully Changed to New Password'); location.assign('EditProfile.php'); </script>";
                                                    } else {
                                                        echo "<script> alert('Password Not Match! Retyped again!'); </script>";
                                                    }
                                                } else {
                                                    echo "<script> alert('Incorrect Password! Retype Again!'); </script>";
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Introduction And Experience</h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post">
                                                <div class="form-group col-sm-12">
                                                    <label>Introduction:</label>
                                                    <textarea class="form-control" name="introduction" rows="5" style="line-height: 22px;">
                                       <?php echo $row['Intro'] ?? 'My name is ... and Nice to meet you!'; ?>
                                       </textarea>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <?php
                                                    $r = mysqli_fetch_assoc(mysqli_query($con, "select * from experience where TutorID=$tutorID"))
                                                    ?>
                                                    <h4>Experience</h4>
                                                    <div class="form-group">
                                                        <label for="startDate">StartDate:</label>
                                                        <input type="date" class="form-control" name="startDate" value="<?php echo $r['StartDate']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="endDate">EndDate:</label>
                                                        <input type="date" class="form-control" name="endDate" value="<?php echo $r['EndDate']; ?>">
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label>Info:</label>
                                                        <textarea class="form-control" name="info" rows="2" style="line-height: 22px;"><?php echo $r['Info'] ?? 'This tutor not have any experience Now!';?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" name="iebtn" class="btn btn-primary mr-2">Submit</button>
                                                <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                            </form>
                                            <?php
                                            if (isset($_POST['iebtn'])) {
                                                $intro = $_POST['introduction'];
                                                $sdate=$_POST['startDate'];
                                                $edate=$_POST['endDate'];
                                                $info=$_POST['info'];
                                                $res = mysqli_query($con, "update tutor set Intro='" . $intro . "' where TutorID=$tutorID");
                                                $res1=mysqli_query($con, "insert into experience (StartDate, EndDate, Info, TutorID) values ('$sdate', '$edate', '$info', $tutorID)");
                                                echo "<script> alert('Successfully changed!')</script>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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