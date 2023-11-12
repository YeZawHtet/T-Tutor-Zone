<?php
session_start();
$tutorID = $_SESSION['TutorID'];
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
   <!-- Header Start -->
   <?php include 'navbar.php';
   include 'tutorsidebar.php';

   ?>
   <!-- Header End -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <div class="content-page">
         <div class="container-fluid">
            <?php
            include 'database.php';
            $q = "select * from tutor where TutorID=$tutorID";
            $res = mysqli_query($con, $q);
            $row = mysqli_fetch_assoc($res);
            $cityq = "select c.CityName from city c, tutor t where c.CityID=t.CityID and t.TutorID=$tutorID";
            $res1 = mysqli_query($con, $cityq);
            $row1 = mysqli_fetch_assoc($res1);
            ?>
            <div class="row">
               <div class="col-lg-12">
                  <div class="card car-transparent">
                     <div class="card-body p-0">
                        <div class="profile-image position-relative">
                           <img src="../assets/images/tutor/<?php echo $row['Image']; ?>" class="img-fluid rounded w-100 h-50" alt="profile-image">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row m-sm-0 px-3">
               <div class="col-lg-6 card-profile">
                  <div class="card card-block card-stretch card-height">
                     <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                           <div class="profile-img position-relative">
                              <img src="../assets/images/tutor/<?php echo $row['Image']; ?>" class="img-fluid rounded avatar-110" alt="profile-image">
                           </div>
                           <div class="ml-3">
                              <h4 class="mb-1"><?php echo $row['TutorName']; ?></h4>
                              <p class="mb-2"><?php echo $row['Email']; ?></p>
                              <a href="EditProfile.php" class="btn btn-primary font-size-14">Edit</a>
                           </div>
                        </div>
                        <p>
                           <?php echo $row['Intro']; ?>
                        </p>
                        <ul class="list-inline p-0 m-0">
                           <li class="mb-2">
                              <div class="d-flex align-items-center">
                                 <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                 </svg>
                                 <p class="mb-0"><?php echo $row1['CityName']; ?></p>
                              </div>
                           </li>
                           <li class="mb-2">
                              <div class="d-flex align-items-center">
                                 <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                 </svg>
                                 <?php
                                 $res = mysqli_query($con, "select * from degree where TutorID=$tutorID");
                                 $r = mysqli_fetch_assoc($res);
                                 ?>
                                 <p class="mb-0"><?php if ($r) {
                                                      echo $r['DegreeName'];
                                                   } else { ?>Add degree<?php }  ?></p>
                              </div>
                           </li>
                           <li class="mb-2">
                              <div class="d-flex align-items-center">
                                 <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                                 </svg>
                                 <p class="mb-0"><?php echo $row['DOB']; ?></p>
                              </div>
                           </li>
                           <li class="mb-2">
                              <div class="d-flex align-items-center">
                                 <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                 </svg>
                                 <p class="mb-0"><?php echo $row['Phone']; ?></p>
                              </div>
                           </li>
                           <li>
                              <div class="d-flex align-items-center">
                                 <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                 </svg>
                                 <p class="mb-0"><?php echo $row['Email']; ?></p>
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