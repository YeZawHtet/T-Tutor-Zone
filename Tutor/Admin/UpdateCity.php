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
     
     
    <!-- Form Start -->
   
    <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-4 col-lg-4">
               <?php 
               include 'database.php';
               if(isset($_REQUEST['updateCity']))
               {
                  $upID=$_REQUEST['upID'];
                  $CityName=$_REQUEST['CityName'];
                  $DivisionID=$_REQUEST['DivisionID'];
                  $qry="SELECT d.*,c.* FROM Division d, City c
                  WHERE d.DivisionID=c.DivisionID AND c.CityName='$CityName' AND d.DivisionID='$DivisionID'";
                  $result=mysqli_query($con,$qry);
                  echo mysqli_error($con);
                  $row=mysqli_num_rows($result);
                  if($row>0)  
                     {
                        echo "<script>alert('Already Exists'); location.assign('ManageCity.php');</script>";
                     }
                     else
                     {

                        $scupdate="UPDATE City SET CityName='".$CityName."' , DivisionID= $DivisionID where CityID= '".$upID."'";

                        mysqli_query($con,$scupdate) or die(mysqli_error($con));

                        echo "<script>alert('City updated Successfully!');location.assign('ManageCity.php');</script>";
                     }
                     
               }
               else
               {
               ?>

               <div class="card" class="updatedivision">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Update City</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <form method="POST">
                     <div class="form-group">
                           <label for="division">Division:</label>
                           <select name="DivisionID" style="width:280px; height:50px; border-radius:20px; text-align:center;">
                           <?php
                  include ('database.php');
                  $qry="select * from division";
                    $result=mysqli_query($con,$qry);
                    while ($row=mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $row['DivisionID']?>"><?php echo $row['DivisionName']?></option>
                      <?php
                        }
                      ?>
                           </select>
                        </div>
                        <?php
                        $upID=$_REQUEST['upID'];
                        $qry="select * from city where DivisionID='".$upID."' ";
                        $result=mysqli_query($con,$qry);
                        while ($row=mysqli_fetch_assoc($result)) {
                      ?>
                        <div class="form-group">
                           <label for="city">City:</label>
                           <input type="text" class="form-control" name="CityName" value="<?php echo $row['CityName'] ?>"/>
                        </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary" name="updateCity">Update</button>
                     </form>
                  </div>
               </div>
            </div>
            <?php } ?>
            <div class="col-sm-8 col-lg-8">
                <?php include 'CityList.php' ?>
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