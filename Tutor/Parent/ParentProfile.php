<?php
session_start();
$parentID = $_SESSION['PaID'];
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Parent Profile</title>

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
   <!-- Header Start -->
   <?php include 'navbar.php';
   include 'parentsidebar.php';

   ?>
   <!-- Header End -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <div class="content-page">
         <div class="container-fluid">
            <?php
            include 'database.php';
            $q = "select * from parent where PaID=$parentID";
            $res = mysqli_query($con, $q);
            $row = mysqli_fetch_assoc($res);
            $st=mysqli_query($con, "select Count(StudentID) from student where PaID=$parentID");
            $strow = mysqli_fetch_assoc($st);
            ?>
            <div class="row">
               <div class="col-lg-12">
                  <div class="card car-transparent">
                     <div class="card-body p-0">
                        <div class="profile-image position-relative">
                           <img src="../assets/images/parent/<?php echo $row['ParentImage']; ?>" class="img-fluid rounded w-100" alt="profile-image">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row m-sm-0 px-3">
               <div class="col-lg-12 card-profile">
                  <div class="card card-block card-stretch card-height">
                     <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                           <div class="profile-img position-relative">
                              <img src="../assets/images/parent/<?php echo $row['ParentImage']; ?>" class="img-fluid rounded avatar-110" alt="profile-image">
                           </div>
                           <div class="ml-3">
                              <h4 class="mb-1"><?php echo $row['PaName']; ?></h4>
                              <p class="mb-2"><?php echo $row['Email']; ?></p>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <ul class="list-inline p-0 m-0">
                                 <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                       <p class="mb-2"><b>Name:</b> <?php echo $row['PaName']; ?></p>
                                    </div>
                                 </li>
                                 <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                       <p class="mb-2"><b>Email:</b> <?php echo $row['Email']; ?></p>
                                    </div>
                                 </li>
                                 <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                       <p class="mb-2"><b>Phone:</b> <?php echo $row['Phone']; ?></p>
                                    </div>
                                 </li>
                                 <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                       <p class="mb-2"><b>Address:</b> <?php echo $row['PaCityName']; ?></p>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                           <div class="col-lg-6">
                              <ul class="list-inline p-0 m-0">
                                 <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                       <p class="mb-2"><b>NRC:</b> <?php echo $row['NRC']; ?></p>
                                    </div>
                                 </li>
                                 <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                       <p class="mb-2"><b>Number Of Student:</b> <?php echo $strow['Count(StudentID)']; ?></p>
                                    </div>
                                 </li>
                                 <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                       <p class="mb-2"><b>JoinDate:</b> <?php echo $row['JoinDate']; ?></p>
                                    </div>
                                 </li>
                                 <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                       <p class="mb-2"><b>Address:</b> <?php echo $row['PaCityName']; ?></p>
                                    </div>
                                 </li>
                                 <li class="mb-4">
                                    <div class="d-flex align-items-center">
                                       <p class="mb-2"><b>NRC:</b> <?php echo $row['NRC']; ?></p>
                                    </div>
                                 </li>
                              </ul>
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

   <!-- Modal list start -->
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