
    <div class="col-lg-3 col-md-3" style="display: flex; background-color:rgba(0, 0, 0, .2); margin-left:10px; padding:5px; align-items:center; justify-content:center; flex-direction:column; text-align:center">
      <img src="../assets/images/tutor/<?php echo $ee['Image']; ?>" class="img-fluid rounded-circle avatar-90 m-auto" alt="image" style="width:100px; height:100px;">
      <div class="odr-content rounded">
        <h4 class="mb-2"><?php echo $ee['TutorName']; ?></h4>
        <p class="mb-3" style="color:black;"><?php echo $ee['Email']; ?> </p>
        <div class="pt-3 mb-2">
          <a href="tutorprofile.php?tID=<?php echo $ee['TutorID']; ?>" name="tutorID" class="btn btn-primary">View Profile</a>
        </div>
      </div>
    </div>