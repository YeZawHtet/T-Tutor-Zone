<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Charge List</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped">
                        <thead>
                        <tr class="ligth">
                           <th>No.</th>
                           <th>Charge Type</th>
                           <th>noOfSubjects</th>
                           <th>Amount</th>
                           <th>Define Date</th>
                           <th style="min-width: 100px">Action</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                     <?php 
                     include 'database.php';
                     $qry= "select * from Charge order by ChargeType";
                     $num=1;
                     $result=mysqli_query($con,$qry);
                     while($row=mysqli_fetch_assoc($result)) {
                     ?>
                           <tr>
                           <td><?php echo $num; $num++; ?></td>
                           <td><?php echo $row['ChargeType']; ?></td>
                           <td><?php echo $row['noOfSubjects']; ?></td>
                           <td><?php echo $row['Amount']; ?></td>
                           <td><?php echo $row['DefineDate']; ?></td>
                           <td>
                              <div class="flex align-items-center list-user-action">
                                 <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit" href="UpdateCharge.php?chargeupID=<?php echo $row['ChargeID']; ?>" name="chargeUpdate"><i class="ri-pencil-line mr-0"></i></a>
                                 <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Delete" href="delete.php?chargedelID=<?php echo $row['ChargeID']; ?>" name="deleteCharge"><i class="ri-delete-bin-line mr-0"></i></a>
                              </div>
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