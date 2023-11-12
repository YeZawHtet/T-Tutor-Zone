<?php
error_reporting(0);
session_start();
$AdminID=$_SESSION['AdminID'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Manage Request Subject</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico" />
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
      
      <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css">
      <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css">
      <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css">  </head>
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
      <div class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Subject Requested List</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-striped">
                              <thead>
                                 <tr class="ligth">
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Subject Name</th>
                                    <th style="text-align: center;">Requested Time</th>
                                 </tr>
                              </thead>

                              <tbody>
                                 <?php
                                 $num = 1;
                                 include 'database.php';
                                 $qry = "select * from subjectrequest group by SubjectName";
                                 $result = mysqli_query($con, $qry);
                                 while ($row = mysqli_fetch_assoc($result)) {
                                    $tid=$row['TutorID'];
                                    if($tid){$aa=mysqli_fetch_assoc(mysqli_query($con, "select Count(TutorID) as t from subjectrequest group by SubjectName"));}
                                    $pid=$row['PaID'];
                                    if($pid){$bb=mysqli_fetch_assoc(mysqli_query($con, "select Count(PaID) as p from subjectrequest group by SubjectName"));}
                                    if(isset($bb) && isset($aa)){
                                       $z=$aa['t']+$bb['p'];
                                    }elseif(!isset($aa)){
                                       $z=$bb['p'];
                                    }else{
                                       $z=$aa['t'];
                                    }
                                 ?>
                                    <tr>
                                       <td style="text-align:center;"><?php echo $num;
                                             $num++; ?></td>
                                       <td style="text-align:center;"><?php echo $row['SubjectName']; ?></td>
                                       <td style="text-align:center;"><?php echo ' <b style="color:green">'. $z ?? '-';?></td>
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