<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Parent Register Form</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
      <link rel="stylesheet" href="../../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="../../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="../../assets/vendor/remixicon/fonts/remixicon.css">
      
      <link rel="stylesheet" href="../../assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css">
      <link rel="stylesheet" href="../../assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css">
      <link rel="stylesheet" href="../../assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css">  </head>
  <body class="  ">
    <!-- loader Start -->
    
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper"> 
      <!-- Start Navbar -->
      <?php include 'header.php' ?>
      <!-- End Navbar -->
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="iq-edit-list-data">
                  <div class="tab-content">
                     <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="card">
                           <div class="card-header d-flex justify-content-between">
                              <div class="iq-header-title">
                                 <h4 class="card-title">Parent Personal Information</h4>
                              </div>
                           </div>
                           <div class="card-body">
                           <form method="POST" action="" enctype="multipart/form-data">
                                 <div class=" row align-items-center">
                                    <div class="form-group col-sm-6">
                                       <label for="validationCustom03">Name:</label>
                                       <input type="text" class="form-control" name="name" id="validationCustom03" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="lname">Email:</label>
                                       <input type="Email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="uname">Password:</label>
                                       <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="uname">Comfirm Password:</label>
                                       <input type="password" class="form-control" name="cpassword">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="Image">Profile Image:</label>
                                       <input type="file" class="form-control" name="img" accept="image/*">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="lname">NRC:</label>
                                       <input type="text" class="form-control" name="nrc">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="lname">Phone Number:</label>
                                       <input type="phone" class="form-control" name="phone">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label>City:</label>
                                       <select class="form-control" name="cityName">
                                       <?php
                                                  include ('database.php');
                                                     $sql="SELECT * FROM city";
                                                    $result=mysqli_query($con,$sql);
                                                    while ($row=mysqli_fetch_assoc($result)) {
                                                      ?>
                                                      <option value="<?php echo $row['CityName']?>"><?php echo $row['CityName']?></option>
                                                      <?php
                                                        }
                                            ?>
                                       </select>
                                    </div>
                                 </div> 
                                 <button type="submit" name="register" class="btn btn-primary mr-2">Register</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>

      <?php 
include ('database.php');
if(isset($_REQUEST['register']))
{
    $ParentName=$_REQUEST['name'];
    $Email=$_REQUEST['email'];
    $Password=$_REQUEST['password'];
    $cPassword=$_REQUEST['cpassword'];
    $CityName=$_REQUEST['cityName'];
    $NRC=$_REQUEST['nrc'];
    $Phone=$_REQUEST['phone'];
    $joinDate=date('Y-m-d');
    $img=$_FILES['img']['name'];
    $tmp=$_FILES['img']['tmp_name'];

    $query="SELECT * FROM Parent
    WHERE Email='$Email'";
    $result=mysqli_query($con,$query);
    $row=mysqli_num_rows($result);
    if ($row>0) 
    {
        echo "<script>alert('Already Exists');</script>";
    }
    else
    {
        $query="INSERT INTO Parent(PaName, Email, Password,	Phone, PaCityName, NRC,	ParentImage, JoinDate )
        VALUES('$ParentName','$Email','".$Password."','$Phone', '$CityName', '$NRC',  '$img', '$joinDate')";
        $flag=mysqli_query($con,$query);
        if($flag==true)
        {
            move_uploaded_file($tmp,'../assets/images/parent/'.$img);
            echo "<script>alert('Success'); location.assign('index.php?display=2');</script>";
         ?>
	      <script> 
		function showparentloginform(){
			parentlogincontainer.style.display="block";
			tutorlogincontainer.style.display='none';
		}
      showparentloginform();
	</script>
       <?php } 
        else
        {
        echo mysqli_error($con);    
        }
        
    }
}
?>

    <!-- footer start -->
    <?php include 'footer.php'; ?>

    <!-- footer end -->
    <!-- Backend Bundle JavaScript -->
    <script src="../../assets/js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="../../assets/js/table-treeview.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../../assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="../../assets/js/chart-custom.js"></script>
    <!-- Chart Custom JavaScript -->
    <script async src="../../assets/js/slider.js"></script>
    
    <!-- app JavaScript -->
    <script src="../../assets/js/app.js"></script>
    
    <script src="../../assets/vendor/moment.min.js"></script>
  </body>
</html>