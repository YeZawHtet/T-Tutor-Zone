<?php
session_start();
$AdminID = $_SESSION['AdminID'];
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Manage Tutor</title>
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
      <?php include 'adminsidebar.php' ?>
      <!-- End Admin Sidebar -->

      <!-- Start Navbar -->
      <?php include 'navbar.php' ?>
      <!-- End Navbar -->

      <!-- Start Manage Subjects -->
      <div class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Parent List</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-12">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <form class="mr-3 position-relative">
                                       <div class="form-group mb-0">
                                          <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <table id="user-list-table" class="table table-striped dataTable mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                              <tr class="ligth">
                                 <th>Profile</th>
                                 <th>Name</th>
                                 <th>Contact</th>
                                 <th>Email</th>
                                 <th>City Name</th>
                                 <th>Status</th>
                                 <th>DOB</th>
                                 <th>Join Date</th>
                                 <th style="min-width: 100px">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              include 'database.php';
                              $qurey = "select * from Parent";
                              $res = mysqli_query($con, $qurey);
                              while ($row = mysqli_fetch_assoc($res)) {
                              ?>
                                 <tr>
                                    <td class="text-center"><img class="rounded img-fluid avatar-40" src="../assets/images/parent/<?php echo $row['ParentImage']; ?>" alt="profile"></td>
                                    <td><?php echo $row['PaName'] ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['Phone']; ?></td>
                                    <td><?php echo $row['PaCityName']; ?></td>
                                    <td><?php echo $row['NRC']; ?></td>
                                    <td><?php echo $row['JoinDate']; ?></td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                          <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="delete.php?pid=<?php echo $row['PaID'];?>"><i class="ri-delete-bin-line mr-0"></i></a>
                                       </div>
                                    </td>
                                 </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                     <div class="row justify-content-between mt-3">
                        <div id="user-list-page-info" class="col-md-6">
                           <span>Showing 1 to 5 of 5 entries</span>
                        </div>
                        <div class="col-md-6">
                           <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-end mb-0">
                                 <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                 </li>
                                 <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                 <li class="page-item"><a class="page-link" href="#">2</a></li>
                                 <li class="page-item"><a class="page-link" href="#">3</a></li>
                                 <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                 </li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End manage Subjects -->

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