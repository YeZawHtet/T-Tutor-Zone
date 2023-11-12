<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Student List</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped">
                        <thead>
                        <tr class="ligth">
                           <th>No.</th>
                           <th>Student Name</th>
                           <th>Student Image</th>
                           <th>Date of Birth</th>
                           <th>Gender</th>
                           <th style="min-width: 100px">Action</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                     <?php 
                     include 'database.php';
                     $qry= "select * from student where PaID=$parentID";
                     $num=1;
                     $result=mysqli_query($con,$qry);
                     while($row=mysqli_fetch_assoc($result)) {
                     ?>
                           <tr>
                           <td><?php echo $num; $num++; ?></td>
                           <td><?php echo $row['StudentName']; ?></td>
                           <td><img src="../assets/images/parent/student/<?php echo $row['StudentImage']; ?>" class="img-fluid avatar-90 m-auto" style="border-radius:30px;" alt="image"></td>
                           <td><?php echo $row['DateofBirth']; ?></td>
                           <td><?php echo $row['Gender'];?></td>
                           <td>
                              <div class="flex align-items-center list-user-action">
                                 <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit" href="UpdateStudent.php?studentupID=<?php echo $row['StudentID']; ?>" name="studentUpdate"><i class="ri-pencil-line mr-0"></i></a>
                                 <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Delete" href="delete.php?studentdelID=<?php echo $row['StudentID']; ?>" name="deleteStudent"><i class="ri-delete-bin-line mr-0"></i></a>
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