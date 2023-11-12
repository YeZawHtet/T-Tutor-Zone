<div class="col-lg-3 col-md-3" style="background-color:rgba(0, 0, 0, .2); display: flex; align-items:center; justify-content:center; flex-direction:column; margin-left:10px; padding:5px; text-align:center">
    <img style="width:100px; height:100px;" src="../assets/images/parent/<?php echo $gg['ParentImage']; ?>" class="img-fluid rounded-circle avatar-90 m-auto" alt="image">
  <div class="odr-content rounded">
    <h4 class="mb-2"><?php echo $gg['PaName']; ?></h4>
    <p class="mb-3" style="color:black;"><?php echo $gg['Email']; ?> </p>
    <div class="pt-3 mb-2">
      <a href="parentprofile.php?pID=<?php echo $gg['PaID']; ?>" name="pID" class="btn btn-primary">View Profile</a>
    </div>
  </div>
</div>