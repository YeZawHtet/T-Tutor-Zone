<?php 
session_start(); 
$tutorID=$_SESSION['TutorID'];
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Manage Subject</title>

   <!-- Favicon -->
   <link rel="shortcut icon" href="../assets/images/favicon.ico" />
   <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
   <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
   <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
   <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">

   <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css">
   <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css">
   <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      <?php include 'tutorsidebar.php' ?>
      <!-- End Admin Sidebar -->

      <!-- Start Navbar -->
      <?php include 'navbar.php' ?>
      <!-- End Navbar -->

      <!-- Form Start -->
      <?php
      include('database.php');
      $r=mysqli_query($con, "select TutorStatus from tutor Where TutorID=$tutorID");
      $row=mysqli_fetch_assoc($r);
      $tutorStatus=$row['TutorStatus'];
      if($tutorStatus=="Verified"){
      if (isset($_POST['addSubject'])) {
         $subjectID = $_POST['subjectName'];
         $classID = $_POST['className'];
         $categoryID=$_POST['categoryName'];
         $plan=$_POST['plan'];
         $price=$_POST['price'];
         $tutorID=$_SESSION['TutorID'];
         $sql = "select * from subjecttutor where SubjectID='$subjectID' and ClassID=$classID and CategoryID=$categoryID and TutorID=$tutorID";
         $select = mysqli_query($con, $sql);
         $count = mysqli_num_rows($select);
         $select1=mysqli_query($con, "select SubjectTutorID from subjecttutor where TutorID=$tutorID");
         $c1=mysqli_num_rows($select1);
         $select2=mysqli_query($con, "select c.noOfSubjects from Charge c, Payment p where c.ChargeID=p.ChargeID and p.TutorID=$tutorID");
         $c2=mysqli_fetch_assoc($select2);
         $noOfSubject=$c2['noOfSubjects'];
         if ($count) {
            echo "<script>alert('This Subject is Already Exists!');</script>";
         } else if($noOfSubject<=$c1){
            echo "<script> alert('You must Update Your ChargeType to add More Subject!')</script>";
         }
         else
         {
            $add = "INSERT INTO SubjectTutor (TutorID,SubjectID, CategoryID, ClassID, Plan, Price) values ($tutorID, '$subjectID',  $categoryID, $classID, '$plan', '$price')";
            $flag = mysqli_query($con, $add);
            echo "<script>Swal.fire({
               position: 'top-end',
               icon: 'success',
               title: 'Your course has been added',
               showConfirmButton: false,
               timer: 1500
             }) header(location:ManageSubject.php);</script>";
         }
      }
   }else{
      if (isset($_POST['addSubject'])) {
         echo "<script> alert('Please Choose Charge Type and Pay First Or Wait for Admin Approved!'); location.assign('ManagePayment.php');</script>";
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
                           <h4 class="card-title">Manage Subject</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <form method="post">
                           <div class="form-group">
                              <label for="SubjectName">Subject Name:</label>
                              <select name="subjectName" style="width:250px; height:50px; border-radius:20px; text-align:center;">
                                 <?php
                                 include('database.php');
                                 $sql = "SELECT * FROM subject";
                                 $result = mysqli_query($con, $sql);
                                 while ($row = mysqli_fetch_assoc($result)) {
                                 ?>
                                    <option value="<?php echo $row['SubjectID'] ?>"><?php echo $row['SubjectName'] ?></option>
                                 <?php
                                 }
                                 ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="CategoryName">Category Name:</label>
                              <select name="categoryName" style="width:250px; height:50px; border-radius:20px; text-align:center;">
                                 <?php
                                 include('database.php');
                                 $sql = "SELECT * FROM category";
                                 $result = mysqli_query($con, $sql);
                                 while ($row = mysqli_fetch_assoc($result)) {
                                 ?>
                                    <option value="<?php echo $row['CategoryID'] ?>"><?php echo $row['CategoryName'] ?></option>
                                 <?php
                                 }
                                 ?>
                              </select>
                           </div>

                           <div class="form-group">
                              <label for="className">Class Name:</label>
                              <select name="className" style="width:250px; height:50px; border-radius:20px; text-align:center;">
                                 <?php
                                 include('database.php');
                                 $sql = "SELECT * FROM class";
                                 $result = mysqli_query($con, $sql);
                                 while ($row = mysqli_fetch_assoc($result)) {
                                 ?>
                                    <option value="<?php echo $row['ClassID'] ?>"><?php echo $row['ClassName'] ?></option>
                                 <?php
                                 }
                                 ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="Plan">Plan:</label>
                              <input type="text" name="plan" class="form-control" placeholder="e.g 1months">
                           </div>
                           <div class="form-group">
                              <label for="Price">Price:</label>
                              <input type="text" name="price" class="form-control" placeholder="e.g 10000">
                           </div>
                           <button type="submit" class="btn btn-primary" name='addSubject'>Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-sm-8 col-lg-8">
                  <?php include 'SubjectTutorList.php' ?>
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