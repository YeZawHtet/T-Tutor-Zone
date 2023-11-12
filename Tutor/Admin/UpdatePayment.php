    <!-- Form Start -->
    <?php 
               include 'database.php';
               if(isset($_REQUEST['paymentUpdate']))
               {
                  $paymentupID=$_REQUEST['paymentupID'];
                        $confirmDate=date('Y-m-d');
                        $eDate=3;
                        $expireDate=$confirmDate+$eDate;
                        $chupdate="UPDATE Payment SET ConfirmDate='".$confirmDate."' , ExpireDate='".$expireDate."' where PaymentID= '".$paymentupID."'";

                        mysqli_query($con,$chupdate) or die(mysqli_error($con));

                        echo "<script>alert('Payment updated Successfully!');location.assign('ManagePayment.php');</script>";
                     }
                     ?>
                     