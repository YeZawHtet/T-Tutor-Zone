<?php
error_reporting(0);
include 'database.php';
$selectedYear = date('Y');
if (isset($_REQUEST['search'])) {
  $year = $_REQUEST['year'];
  $selectedYear=$year;
  $month = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0);
  $pSQL = "SELECT *,Month(ConfirmDate) as cmonth FROM payment WHERE Year(ConfirmDate) = $year";
  $pCON = mysqli_query($con, $pSQL);
  while ($pROW = mysqli_fetch_assoc($pCON)) {
    foreach ($month as $key => $val) {
      $cdate = $pROW['cmonth'];
      if ($cdate == $key) {
        $month[$key] += $pROW['Amount'];
      }
    }
  }
  foreach ($month as $key => $val) {
    $dataPoints[] = array("y" => $val, 'label' => date("M", mktime(0, 0, 0, $key)));
  }
}
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
</head>

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

    <!-- Start Manage Subjects -->
    <div class="content-page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between row">
                <div class="header-title col-sm-4">
                  <h4 class="card-title">Yearly Income Report</h4>
                </div>

                <div class="col-sm-6">
                  <form method="post">
                  <select class="form-control" name="year">
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
                <div class="col-sm-2">
                <button type="submit" name="search" style="width:100px; float:right;" class="btn btn-success">Search</button>
                </div>
                </form>
              </div>


            </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div class="row justify-content-between">
                <div class="col-sm-12 col-md-12">

                  <div class="form-group mb-0">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                  </div>

                </div>
              </div>
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

  <!-- Income Report Line Chart -->
  <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

  <script>
    window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
          text: "Membership Income by Year"
        },
        axisY: {
          title: "Revenue in MMK",
          //valueFormatString: "#0,,.",
          //suffix: "mn",
          //prefix: "$"
        },
        axisX: {
          title: "Month",
          //valueFormatString: "#0,,.",
          //suffix: "mn",
          //prefix: "$"
        },
        data: [{
          type: "spline",
          //markerSize: 5,
          //xValueFormatString: "YYYY",
          //yValueFormatString: "$#,##0.##",
          //xValueType: "dateTime",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });

      chart.render();

    }
  </script>
</body>

</html>