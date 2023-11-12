<div class="container-fluid">
   <form method="Post">
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
                              <th style="min-width: 100px">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           include 'database.php';
                           $tutorID=$_SESSION['TutorID'];
                           $qry = "select * from subjectrequest where TutorID=$tutorID";
                           $num = 1;
                           $result = mysqli_query($con, $qry);
                           while ($row = mysqli_fetch_assoc($result)) { ?>
                              <tr>
                                 <td><?php echo $num;
                                       $num++; ?></td>
                                 <td><?php echo $row['SubjectName']; ?></td>
                                 <td>
                                    <div class="flex align-items-center list-user-action">
                                       <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="UpdateSubjectRequest.php?reqsubID=<?php echo $row['SubjectRequestID']; ?>" name="subjectUpdate"><i class="ri-pencil-line mr-0"></i></a>
                                       <a class="btn btn-sm bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="delete.php?reqsubdelID=<?php echo $row['SubjectRequestID']; ?>" name="deleteSubject"><i class="ri-delete-bin-line mr-0"></i></a>
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
   </form>
</div>