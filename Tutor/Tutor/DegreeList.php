<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Degree List</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped">
                        <thead>
                        <tr class="ligth">
                           <th>No.</th>
                           <th>Degree Name</th>
                           <th>Degree Image</th>
                           <th>Achieved Date</th>
                           <th style="min-width: 100px">Action</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                     <?php 
                     include 'database.php';
                     $tutorID=$_SESSION['TutorID'];
                     $qry= "select * from degree where TutorID=$tutorID order by DegreeName";
                     $num=1;
                     $result=mysqli_query($con,$qry);
                     while($row=mysqli_fetch_assoc($result)) {
                      $DegreeID=$row['DegreeID'];
                     ?>
                           <tr>
                           <td><?php echo $num; $num++; ?></td>
                           <td><?php echo $row['DegreeName']; ?></td>
                           <td><img src="../assets/images/degree/<?php echo $row['DegreeImage']; ?>" class="img-fluid avatar-90 m-auto" alt="image"></td>
                           <td><?php echo $row['AchievedDate']; ?></td>
                           <td>
                              <div class="flex align-items-center list-user-action">
                                 <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit" href="UpdateDegree.php?degreeupID=<?php echo $row['DegreeID']; ?>" name="degreeUpdate"><i class="ri-pencil-line mr-0"></i></a>
                                 <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Delete" href="delete.php?degreedelID=<?php echo $row['DegreeID']; ?>" name="deleteDegree"><i class="ri-delete-bin-line mr-0"></i></a>
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