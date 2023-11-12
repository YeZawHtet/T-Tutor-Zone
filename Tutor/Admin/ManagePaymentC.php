<?php 
session_start();
include 'auth.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard</title>

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
<style>
  .img-fluid:hover{
    transform: scale(8);
    position: absolute;
    top: 50px;
    z-index: 2000;
  }
</style>

<body class="  ">
  <div class="wrapper">
    <?php include 'adminsidebar.php';
    include 'navbar.php';
    ?>
    <div class="content-page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                  <h4 class="card-title">Payment List</h4>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table data-table table-striped">
                    <thead>
                      <tr class="ligth">
                        <th>No.</th>
                        <th>TutorName</th>
                        <th>ChargeType</th>
                        <th>PaymentDate</th>
                        <th>Amount</th>
                        <th>Image</th>
                        <th>ConfirmDate</th>
                        <th>ExpireDate</th>
                        <th style="min-width: 100px">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      include 'database.php';
                      $qry = "select p.*, t.TutorName, c.ChargeType, c.Amount from Payment p, Tutor t, Charge c Where t.TutorID=p.TutorID And p.ChargeID=c.ChargeID";
                      $num = 1;
                      $result = mysqli_query($con, $qry);
                      while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>

                          <td><?php echo $num;
                              $num++; ?></td>
                          <td><?php echo $row['TutorName']; ?></td>
                          <td><?php echo $row['ChargeType']; ?></td>
                          <td><?php echo $row['PaymentDate']; ?></td>
                          <td><?php echo $row['Amount']; ?></td>
                          <td class="text-center"><img class="img-fluid avatar-40" src="../assets/images/payment/<?php echo $row['Image']; ?>" alt="profile">
                          </td>
                          <td><?php echo $row['ConfirmDate']; ?></td>
                          <td><?php echo $row['ExpireDate']; ?></td>
                          <td>
                            <form method="get" action="ManagePayment.php">
                              <div class="flex align-items-center list-user-action">
                                <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" data-original-title="Confirm" href="ManagePaymentC.php?paymentupID=<?php echo $row['PaymentID']; ?>"><i class="ri-pencil-line mr-0"></i></a>
                                <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="delete.php?paymentdelID=<?php echo $row['PaymentID']; ?>" name="deletePayment"><i class="ri-delete-bin-line mr-0"></i></a>
                              </div>
                            </form>
                          </td>
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
    <?php



    include 'database.php';
    if (isset($_GET['paymentupID'])) {

      $paymentupID = $_GET['paymentupID'];
      $confirmDate = date('Y-m-d');
      $expireDate = date("Y-m-d", strtotime("+3 months", strtotime($confirmDate)));
      $payupdate = "UPDATE Payment SET ConfirmDate='" . $confirmDate . "', ExpireDate='" . $expireDate . "' WHERE PaymentID=$paymentupID";
      mysqli_query($con, $payupdate);
      echo "<script>alert('Payment updated Successfully!');location.assign('ManagePaymentC.php');</script>";
      $tuupdate = "Update Tutor Set TutorStatus='Verified' where TutorID in (select TutorID from payment where PaymentID=$paymentupID)";
      mysqli_query($con, $tuupdate);
    }
    ?>
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