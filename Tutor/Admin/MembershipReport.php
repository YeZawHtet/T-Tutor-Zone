<?php
error_reporting(0);
session_start();
include 'database.php';

// Default values
$selectedYear = date('Y'); // Current year

// Check if the year filter form is submitted
if (isset($_POST['yearFilter'])) {
  $selectedYear = $_POST['yearFilter'];
}

$newmember = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(TutorID) AS new_count FROM tutor WHERE TutorStatus='Verified' AND YEAR(JoinDate) = $selectedYear"));
$leavemember = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(TutorID) AS leave_count FROM tutor WHERE TutorStatus='Leave' AND YEAR(JoinDate) = $selectedYear"));
$allmember = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(TutorID) AS all_count FROM tutor WHERE TutorStatus='Not Verify!' AND YEAR(JoinDate) = $selectedYear"));

$newMembership = $newmember['new_count'];
$leaveMembership = $leavemember['leave_count'];
$totalMembership = $allmember['all_count'];
$new = mysqli_fetch_assoc(mysqli_query($con, "SELECT DATE(JoinDate) AS nd FROM tutor WHERE TutorStatus='Verified' AND YEAR(JoinDate) = $selectedYear"));
$leave = mysqli_fetch_assoc(mysqli_query($con, "SELECT DATE(JoinDate) AS ld FROM tutor WHERE TutorStatus='Leave' AND YEAR(JoinDate) = $selectedYear"));
$all = mysqli_fetch_assoc(mysqli_query($con, "SELECT DATE(JoinDate) AS ad FROM tutor WHERE TutorStatus='Not Verify!' AND YEAR(JoinDate) = $selectedYear"));
$nJoin = $new['nd'];
$lJoin = $leave['ld'];
$tJoin = $all['ad'];
$totalVisitors = $totalMembership;
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>IncomeReport</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.ico" />
  <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
  <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">
  <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
  <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">

  <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-calendar/dist/tui-calendar.css">
  <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-date-picker/dist/tui-date-picker.css">
  <link rel="stylesheet" href="../assets/vendor/tui-calendar/tui-time-picker/dist/tui-time-picker.css">

  <!-- Chart begin -->
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script>
    window.onload = function() {
      var totalVisitors = <?php echo $totalVisitors; ?>;
      var newMembership = <?php echo $newMembership; ?>;
      var leaveMembership = <?php echo $leaveMembership; ?>;
      var totalVisitors = <?php echo $totalVisitors; ?>;

      var newVsReturningVisitorsDataPoints = [
        {
          y: newMembership,
          name: "Paid Membership",
          color: "#E7823A"
        },
        {
          y: leaveMembership,
          name: "Leave Membership",
          color: "#546BC1"
        },
        {
          y: totalVisitors,
          name: "Unpaid Membership",
          color: "#dd6BC1"
        }
      ];

      var newVSReturningVisitorsOptions = {
        animationEnabled: true,
        theme: "light2",
        title: {
          text: "Paid vs Unpaid vs Leave Membership"
        },
        subtitles: [{
          backgroundColor: "#2eacd1",
          fontSize: 16,
          fontColor: "white",
          padding: 5
        }],
        legend: {
          fontFamily: "calibri",
          fontSize: 14,
          itemTextFormatter: function(e) {
            return e.dataPoint.name + ": " + Math.round(e.dataPoint.y / totalVisitors * 100) + "%";
          }
        },
        data: [{
          type: "doughnut",
          startAngle: 90,
          innerRadius: "75%",
          legendMarkerType: "square",
          name: "Paid vs Unpaid vs Leave Membership",
          indexLabelFontSize: 16,
          indexLabel: "{name} - {y}",
          toolTipContent: "{name}: {y} - <strong>#percent%</strong>",
          dataPoints: newVsReturningVisitorsDataPoints
        }]
      };

      var chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
      chart.render();
    };
  </script>
  <!-- Chart End -->
</head>

<body class="  ">
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
        <form id="yearlyFilterForm" action="" method="POST">
          <div class="form-group row">
            <div class="col-md-4">
              <select class="form-control" name="yearFilter">
                <?php
                // Generate select options for the past 10 years
                $currentYear = date('Y');
                for ($i = $currentYear; $i >= $currentYear - 10; $i--) {
                  $selected = ($selectedYear == $i) ? 'selected' : '';
                  echo "<option value='$i' $selected>$i</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary">Filter</button>
            </div>
          </div>
        </form>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      </div>
    </div>
    <!-- End manage Subjects -->

    <!-- Footer start -->
    <?php include 'footer.php'; ?>
    <!-- Footer end -->

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

    <!-- App JavaScript -->
    <script src="../assets/js/app.js"></script>

    <!-- Moment JavaScript -->
    <script src="../assets/vendor/moment.min.js"></script>
  </div>
  <!-- End Wrapper -->
</body>

</html>
