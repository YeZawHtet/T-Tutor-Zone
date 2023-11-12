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
   <?php include 'header.php' ?>
   <!-- Header End -->
   <!-- Wrapper Start -->
   <div class="wrapper" style="margin-top: 150px;">
      <div class="container-fluid">
         <?php
         include 'database.php';
         if (isset($_GET['pID'])) {
            $pID = $_GET['pID'];
            $q = "select * from parent where PaID=$pID";
            $res = mysqli_query($con, $q);
            $row = mysqli_fetch_assoc($res);
         ?>
            <div class="row px-3">
               <div class="col-lg-4 card-profile ">
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
                        <ul class="list-inline p-0 m-0">
                           <li class="mb-2">
                              <div class="d-flex align-items-center">
                                 <svg class="svg-icon mr-3" height="16" width="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                 </svg>
                                 <p class="mb-0"><?php echo $row['PaCityName']; ?></p>
                              </div>
                           </li>
                           <li class="mb-2">
                              <div class="d-flex align-items-center">
                                 <svg height="16" width="16" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                       <style type="text/css">
                                          .st0 {
                                             fill: #000000;
                                          }
                                       </style>
                                       <g>
                                          <path class="st0" d="M78.641,118.933c22.88,0,41.416-18.551,41.416-41.414c0-22.887-18.536-41.423-41.416-41.423 c-22.887,0-41.422,18.536-41.422,41.423C37.218,100.382,55.754,118.933,78.641,118.933z"></path>
                                          <path class="st0" d="M255.706,228.73v0.062c0.101,0,0.194-0.031,0.294-0.031c0.101,0,0.194,0.031,0.294,0.031v-0.062 c15.562-0.317,28.082-12.976,28.082-28.601c0-15.648-12.52-28.299-28.082-28.616v-0.063c-0.101,0-0.194,0.031-0.294,0.031 c-0.1,0-0.193-0.031-0.294-0.031v0.063c-15.563,0.317-28.082,12.968-28.082,28.616C227.623,215.754,240.143,228.413,255.706,228.73 z"></path>
                                          <path class="st0" d="M433.359,118.933c22.887,0,41.423-18.551,41.423-41.414c0-22.887-18.536-41.423-41.423-41.423 c-22.88,0-41.416,18.536-41.416,41.423C391.944,100.382,410.48,118.933,433.359,118.933z"></path>
                                          <path class="st0" d="M470.097,138.553h-36.312h-18.404c-21.106,0-40.432,11.831-50.033,30.622l-33.494,97.967 c-1.154,2.246-3.298,3.84-5.792,4.282c-2.493,0.442-5.048-0.309-6.914-2.036l-20.836-18.04c-6.233-5.769-14.408-8.973-22.902-8.973 H256h-19.41c-8.494,0-16.669,3.204-22.902,8.973l-20.835,18.04c-1.866,1.727-4.421,2.478-6.914,2.036 c-2.492-0.442-4.637-2.036-5.791-4.282l-33.495-97.967c-9.6-18.791-28.926-30.622-50.032-30.622H78.215H41.902 C21.834,138.553,0,160.387,0,180.464v139.211c0,10.034,8.13,18.171,18.164,18.171c4.939,0,0,0,12.682,0l6.906,118.725 c0,10.676,8.664,19.332,19.34,19.332c4.506,0,12.814,0,21.122,0c8.308,0,16.616,0,21.122,0c10.676,0,19.34-8.656,19.34-19.332 l6.906-118.725l-0.085-84.766c0-1.339,0.914-2.493,2.222-2.818c1.309-0.31,2.648,0.309,3.26,1.502l26.572,65.401 c3.206,6.256,9.152,10.654,16.074,11.885c6.922,1.231,14.022-0.844,19.186-5.613l25.426-18.729 c0.852-0.782,2.083-0.984,3.136-0.542c1.061,0.473,1.743,1.518,1.743,2.663l0.093,73.508l4.777,82.187 c0,7.387,6.001,13.379,13.395,13.379c3.113,0,8.865,0,14.618,0c5.753,0,11.506,0,14.618,0c7.394,0,13.394-5.992,13.394-13.379 l4.778-82.187l0.093-73.508c0-1.146,0.681-2.19,1.742-2.663c1.053-0.442,2.284-0.24,3.136,0.542l25.427,18.729 c5.164,4.769,12.264,6.844,19.186,5.613c6.922-1.231,12.868-5.629,16.073-11.885l26.573-65.401 c0.611-1.192,1.951-1.812,3.259-1.502c1.309,0.325,2.222,1.478,2.222,2.818l-0.085,84.766l6.906,118.725 c0,10.676,8.664,19.332,19.341,19.332c4.507,0,12.814,0,21.122,0c8.308,0,16.616,0,21.121,0c10.677,0,19.342-8.656,19.342-19.332 l6.906-118.725c12.682,0,7.742,0,12.682,0c10.034,0,18.164-8.137,18.164-18.171V180.464 C512,160.387,490.166,138.553,470.097,138.553z"></path>
                                       </g>
                                    </g>
                                 </svg>
                                 <?php
                                 $r = mysqli_fetch_assoc(mysqli_query($con, "select Count(StudentID) from student where PaID = $pID"));
                                 ?>
                                 <p class="mb-0 ml-3"><?php echo $r['Count(StudentID)']; ?></p>
                              </div>
                           </li>
                           <li class="mb-2">
                              <div class="d-flex align-items-center">
                                 <svg fill="#000000" width="16" height="16" viewBox="0 0 24 24" id="date-check" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                       <path id="primary" d="M21,7H3A1,1,0,0,0,2,8V20a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V8A1,1,0,0,0,21,7Z" style="fill: #000000;"></path>
                                       <path id="secondary" d="M22,6V9H2V6A2,2,0,0,1,4,4H20A2,2,0,0,1,22,6ZM11.71,17.71l4-4a1,1,0,0,0-1.42-1.42L11,15.59l-1.29-1.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,1.42,0Z" style="fill: #2ca9bc;"></path>
                                       <path id="primary-2" data-name="primary" d="M16,7a1,1,0,0,1-1-1V3a1,1,0,0,1,2,0V6A1,1,0,0,1,16,7ZM9,6V3A1,1,0,0,0,7,3V6A1,1,0,0,0,9,6Z" style="fill: #000000;"></path>
                                    </g>
                                 </svg>
                                 <p class="mb-0 ml-3"><?php echo $row['JoinDate']; ?></p>
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
               <div class="col-lg-8 card-profile">
                  <div class="card card-block card-stretch card-height">
                     <div class="card-body">
                        <div class="profile-content tab-content">
                           <div id="profile3" class="tab-pane fade active show">
                              <div class="container-fluid">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="card">
                                          <div class="card-header d-flex justify-content-between">
                                             <div class="header-title">
                                                <h4 class="card-title">Requested Subject List</h4>
                                             </div>
                                          </div>
                                          <div class="card-body">
                                             <div class="table-responsive">
                                                <table id="datatable" class="table data-table table-striped">
                                                   <thead>
                                                      <tr class="ligth">
                                                         <th>No.</th>
                                                         <th>Subject Name</th>
                                                      </tr>
                                                   </thead>

                                                   <tbody>
                                                      <?php
                                                      include 'database.php';
                                                      $pID = $_GET['pID'];
                                                      $qry = "select * from subjectrequest where PaID=$pID";
                                                      $num = 1;
                                                      $result = mysqli_query($con, $qry);
                                                      while ($row = mysqli_fetch_assoc($result)) {
                                                      ?>
                                                         <tr>
                                                            <td><?php echo $num;
                                                                  $num++; ?></td>
                                                            <td><?php echo $row['SubjectName']; ?></td>
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
                     </div>
                  </div>
               </div>
            </div>
      </div>
   <?php } ?>
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