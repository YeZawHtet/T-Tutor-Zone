<?php
session_start();
$AdminID=$_SESSION['AdminID'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Manage City</title>
      
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
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
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
    <?php
include ('database.php');
if(isset($_POST['addCity']) ){ 
   $city=$_REQUEST['CityName'];
   $division=$_POST['division'];

$sql="SELECT * FROM City WHERE CityName='$city' AND DivisionID=$division";
    $select=mysqli_query($con,$sql);
    $count=mysqli_num_rows($select);
    if($count>0)
    {
        
        echo "<script>alert('This City is Already Exists!');</script>";
    }
    else
    {
       $add="INSERT INTO City
      (DivisionID,CityName) VALUES ($division,'$city')";
      $flag=mysqli_query($con,$add);
      echo "<script>alert('Successfully Added!');</script>";
    }
}
?>
    <div class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-4 col-lg-4">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Manage City</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <form method="post">
                        <div class="form-group">
                           <label for="division">Division:</label>
                           <select name="division" style="width:280px; height:50px; border-radius:20px; text-align:center;">
                           <?php
                  include ('database.php');
                     $sql="SELECT * FROM Division";
                    $result=mysqli_query($con,$sql);
                    while ($row=mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $row['DivisionID']?>"><?php echo $row['DivisionName']?></option>
                      <?php
                        }
                      ?>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" name="CityName">
                        </div>
                        <button type="submit" class="btn btn-primary" name='addCity'>Submit</button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-sm-8 col-lg-8">
                <?php include 'CityList.php' ?>
            </div>
         </div>
      </div>
      </div>
    <!-- Form End -->
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