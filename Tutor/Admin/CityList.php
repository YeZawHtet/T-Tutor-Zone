<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">City List</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped">
                        <thead>
                        <tr class="ligth">
                           <th>No.</th>
                           <th>Division Name</th>
                           <th>City Name</th>
                           <th style="min-width: 100px">Action</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                     <?php 
                     $num=1;
                     include 'database.php';
                     $qry= "select c.*, d.DivisionName from City c, Division d where c.DivisionID=d.DivisionID order by CityID desc";
                     $result=mysqli_query($con,$qry);
                     while($row=mysqli_fetch_assoc($result)) {
                      $CityID=$row['CityID'];
                     ?>
                        <tr>
                           <td><?php echo $num; $num++;?></td>
                           <td><?php echo $row['DivisionName']; ?></td>
                           <td><?php echo $row['CityName']; ?></td>
                           <td>
                              <div class="flex align-items-center list-user-action">
                                 <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit" href="UpdateCity.php?upID=<?php echo $row['CityID']; ?>" name="CityUpdate"><i class="ri-pencil-line mr-0"></i></a>
                                 <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Delete" href="delete.php?citydelID=<?php echo $row['CityID']; ?>" name="deleteCity"><i class="ri-delete-bin-line mr-0"></i></a>
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