<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>T TutorZone</title>
  <meta charset="UTF-8">
  <meta name="description" content="Real estate HTML Template">
  <meta name="keywords" content="real estate, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="css/aa.css" />
</head>

<body>
  <!-- Header Section -->
  <?php include 'header.php' ?>
  <!-- Header Section end -->

  <!-- Hero Section start -->
  <section class="hero-section set-bg" style="background-color:rgba(0, 0, 0, 0.5);">
    <div class="hero-warp" style="position:absolute; top:200px; background-color:#CCCCFF;">
      <h3 style=" text-align: center; color:green;">Search Tutor or Tuition Job
      </h3>
      <form class="main-search-form" method="post">
        <div class="spider" style="padding-left:10px;">
          <label for="subjectName"><b>Subject Name:</b></label>
          <input type="text" name="subjectName" required style="width:130px" placeholder="Subject Name" class="form-control">
        </div>
        <div class="spider">
          <label for="classname"><b>Level:</b></label>
          <select name="className" class="form-control" style="width:100px">
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
        <div class="spider">
          <label for="person"><b>Person:</b></label>
          <select name="person" class="form-control" style="width:100px">
            <option value="1">Parent</option>
            <option value="2">Tutor</option>
          </select>
        </div>
        <div class="spider" style="padding-top:30px; padding-right:10px;">
          <button class="btn form-control" type="submit" name="search" style="background-color: #f39c12;  color: #CCCCFF;">Search</button>
        </div>
      </form>

    </div>
  </section>
  <!-- Hero Section end -->
  <!-- Footer Section start -->
    <div class="row" style="padding:2%; background-color: rgba(0, 1, 0, 0.6);">
        <?php
        include 'database.php';
        if (isset($_POST['search'])) {
          $subjectName = $_POST['subjectName'];
          $className = $_POST['className'];
          $person = $_POST['person'];
          if ($person == 1) {
            $r = mysqli_query($con, "select p.* from parent p, subjectrequest sr where p.PaID=sr.PaID and sr.SubjectName='$subjectName'");
            while ($gg = mysqli_fetch_assoc($r)) { ?>
             <?php include 'SearchResultForParent.php'; ?>
              <?php
            }
          } else {
            $a = mysqli_fetch_assoc(mysqli_query($con, "select * from subject where SubjectName='$subjectName'"));
            $subID = $a['SubjectID'];
            $r1 = mysqli_query($con, "select t.* from tutor t, subjecttutor st where t.TutorID=st.TutorID and st.SubjectID=$subID and st.ClassID=$className");
            if($r1){
              echo "<script> alert ('good'); </script>";
              while ($ee = mysqli_fetch_assoc($r1)) {
              include 'SearchResultForTutor.php';
            }
            } else
              echo "<script> alert ('good'); </script>";
          }
        }
        ?>
    </div>
  <!-- Footer Section end -->
  <!-- Jquery JS-->

  <!-- Main JS-->
  <script src="js/global.js"></script>
  <!--====== Javascripts & Jquery ======-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>