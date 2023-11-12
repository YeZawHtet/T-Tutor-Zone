<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Tutor Register Form</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
   <link rel="stylesheet" href="../../assets/css/backend-plugin.min.css">
   <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.0">
   <link rel="stylesheet" href="../../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
   <link rel="stylesheet" href="../../assets/vendor/remixicon/fonts/remixicon.css">

   <link rel="stylesheet" href="../../assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css">
   <link rel="stylesheet" href="../../assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css">
   <link rel="stylesheet" href="../../assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css">
 <!-- Validation start -->
 <script>
      function validateForm() {
         var email = document.forms["registrationForm"]["email"].value;
         // Email format validation
         var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
         if (!emailRegex.test(email)) {
            alert("Invalid email format");
            return false;
         }
      } 
   </script>
 <!-- Validation End -->
</head>
<body>
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
                                 <h4 class="card-title">Tutor Personal Information</h4>
                              </div>
                           </div>
                           <div class="card-body">
                              <form method="POST" action="" enctype="multipart/form-data">
                                 <div class=" row align-items-center">
                                    <div class="form-group col-sm-6">
                                       <label for="name">Name:</label>
                                       <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="email">Email:</label>
                                       <input type="Email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="password">Password:</label>
                                       <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="cpassword">Comfirm Password:</label>
                                       <input type="password" class="form-control" name="cpassword" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="Image">Profile Image:</label>
                                       <input type="file" class="form-control" name="img" accept="image/*" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="dateofbirth">DateofBirth:</label>
                                       <input type="date" class="form-control" name="dateofbirth" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="nrc">NRC:</label>
                                       <input type="text" class="form-control" name="nrc" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="phonenumber">Phone Number:</label>
                                       <input type="phone" class="form-control" name="phone" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label>Gender:</label>
                                       <select class="form-control" name="gender" required>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                       </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label>City:</label>
                                       <select class="form-control" name="cityID" required>
                                          <?php
                                          include('database.php');
                                          $sql = "SELECT * FROM city";
                                          $result = mysqli_query($con, $sql);
                                          while ($row = mysqli_fetch_assoc($result)) {
                                          ?>
                                             <option value="<?php echo $row['CityID'] ?>"><?php echo $row['CityName'] ?></option>
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
   <?php
   include('database.php');
   if (isset($_REQUEST['register'])) {
      $TutorName = $_REQUEST['name'];
      $Email = $_REQUEST['email'];
      $Password = $_REQUEST['password'];
      $cPassword=$_REQUEST['cpassword'];
      $CityID = $_REQUEST['cityID'];
      $gender=$_REQUEST['gender'];
      $TutorStatus = "Not Verify!";
      $NRC = $_REQUEST['nrc'];
      $joinDate=date('Y-m-d');
      $DateofBirth = $_REQUEST['dateofbirth'];
      $Phone = $_REQUEST['phone'];

      $img = $_FILES['img']['name'];
      $tmp = $_FILES['img']['tmp_name'];


      $query = "SELECT * FROM Tutor
    WHERE Email='$Email'";
      $result = mysqli_query($con, $query);
      //echo mysqli_error($con);
      $row = mysqli_num_rows($result);
      if ($row > 0) {
         echo "<script>alert('Already Exists');</script>";
      } else {
         if($Password==$cPassword){
         $query = "INSERT INTO Tutor(CityID,TutorStatus,TutorName,Email,Phone,Password,NRC,DOB,Image, Gender, JoinDate)
        VALUES($CityID, '$TutorStatus', '$TutorName','$Email','$Phone','".$Password."','$NRC','$DateofBirth', '$img', '$gender', '$joinDate')";
         $flag = mysqli_query($con, $query);
         if ($flag == true) {
            move_uploaded_file($tmp, '../assets/images/tutor/' . $img);
            echo "<script>alert('Success'); location.assign('index.php?display=1');</script>";
            ?>
       <?php } 

         } else {
            echo "Password not Match!";
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