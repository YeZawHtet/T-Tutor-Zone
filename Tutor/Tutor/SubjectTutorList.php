<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Subject List</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped">
                        <thead>
                        <tr class="ligth">
                           <th>No.</th>
                           <th>Subject Name</th>
                           <th>Class Name</th>
                           <th>Category Name</th>
                           <th>Plan</th>
                           <th>Price</th>
                           <th style="min-width: 100px">Action</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                     <?php 
                     include 'database.php';
                     $qry= "select * from subjecttutor where TutorID=$tutorID";
                     $num=1;
                     $result=mysqli_query($con,$qry);
                     while($row=mysqli_fetch_assoc($result)) {
                      $classID=$row['ClassID'];
                      $categoryID=$row['CategoryID'];
                      $subjectID=$row['SubjectID'];
                      $subqry="select * from subject where SubjectID=$subjectID";
                      $subres=mysqli_query($con, $subqry);
                      $subrow=mysqli_fetch_assoc($subres);
                      $cqry = "select * from Class where ClassID = $classID";
                      $cr=mysqli_query($con,$cqry);
                      $crow = mysqli_fetch_assoc($cr);
                      $caqry = "select * from Category where CategoryID = $categoryID";
                      $car=mysqli_query($con,$caqry);
                      $carow = mysqli_fetch_assoc($car);
                     ?>
                           <tr>
                           <td><?php echo $num; $num++; ?></td>
                           <td><?php echo $subrow['SubjectName'];?></td>
                           <td><?php echo $crow['ClassName']; ?></td>
                           <td><?php echo $carow['CategoryName']; ?></td>
                           <td><?php echo $row['Plan'];?></td>
                           <td><?php echo $row['Price'];?></td>
                           <td>
                              <div class="flex align-items-center list-user-action">
                                 <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit" href="UpdateSubjectTutor.php?subjecttutorupID=<?php echo $row['SubjectTutorID']; ?>" name="subjecttutorUpdate"><i class="ri-pencil-line mr-0"></i></a>
                                 <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Delete" href="delete.php?subjecttutordelID=<?php echo $row['SubjectTutorID']; ?>" name="deleteSubjecttutor"><i class="ri-delete-bin-line mr-0"></i></a>
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