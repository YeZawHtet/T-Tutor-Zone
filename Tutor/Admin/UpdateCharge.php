

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Update City Form</title>
      
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
    loader Start -->
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
     
     
    <!-- Form Start -->
   
    <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-4 col-lg-4">
               <?php 
               include 'database.php';
               if(isset($_REQUEST['updateCharge']))
               {
                  $upID=$_REQUEST['chargeupID'];
                  $ChargeType=$_REQUEST['ChargeType'];
                  $noOfSubjects=$_REQUEST['noOfSubjects'];
                  $Amount=$_REQUEST['Amount'];
                  $qry="SELECT * FROM Charge where ChargeType='".$ChargeType."' and Amount=$Amount and noOfSubjects=$noOfSubjects";
                  $result=mysqli_query($con,$qry);
                  echo mysqli_error($con);
                  $row=mysqli_num_rows($result);
                  if($row>0)  
                     {
                        echo "<script>alert('Already Exists'); location.assign('ManageCharge.php');</script>";
                     }
                     else
                     {

                        $chupdate="UPDATE Charge SET ChargeType='".$ChargeType."' , noOfSubjects= $noOfSubjects, Amount=$Amount where ChargeID= '".$upID."'";

                        mysqli_query($con,$chupdate) or die(mysqli_error($con));

                        echo "<script>alert('Charge updated Successfully!');location.assign('ManageCharge.php');</script>";
                     }
                     
               }
               else
               {
               ?>

               <div class="card" class="updatecharge">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Update Charge</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <form method="POST">
                        <?php
                        include ('database.php');
                        $ChargeID=$_REQUEST['chargeupID'];
                        $query="select * from Charge where ChargeID=$ChargeID";
                        $res=mysqli_query($con, $query);
                        while($row=mysqli_fetch_assoc($res)){ ?>
                        <div class="form-group">
                           <label for="ctype">Charge Type:</label>
                           <input type="text" class="form-control" name="ChargeType" value="<?php echo $row['ChargeType'] ?>"/>
                        </div>
                        <div class="form-group">
                           <label for="noOfSubjects">noOfSubjects:</label>
                           <input type="text" class="form-control" name="noOfSubjects" value="<?php echo $row['noOfSubjects'] ?>"/>
                        </div>
                        <div class="form-group">
                           <label for="amount">Amount:</label>
                           <input type="text" class="form-control" name="Amount" value="<?php echo $row['Amount'] ?>"/>
                        </div>
                      <?php  } ?>
                        <button type="submit" class="btn btn-primary" name="updateCharge">Update</button>
                     </form>
                  </div>
               </div>
               <?php } ?>
            </div>
            <div class="col-sm-8 col-lg-8">
                <?php include 'ChargeList.php' ?>
            </div>
         </div>
      </div>
      
    <!-- Form End -->

     <!-- Start Insert -->
    
      <!-- End Insert -->

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