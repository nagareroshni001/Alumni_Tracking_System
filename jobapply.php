<?php
include("dbconnection.php");
?>
<div class="bs-example" data-example-id="simple-horizontal-form">
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-12 control-label">Candidate Name</label>
        <div class="col-sm-12">
		<input type="hidden" name="jobid" value="<?php echo $_GET["edit_id"]; /* ### */  ?>">
          <input type="text" class="form-control" id="candidatename" name="candidatename" placeholder="Candidate Name" required>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-12 control-label">Contact No</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact No" required>
        </div>
      </div> 
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-12 control-label">Email</label>
        <div class="col-sm-12">
		<input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
      </div> 
	   <div class="form-group">
        <label for="inputEmail3" class="col-sm-12 control-label">Cover Letter</label>
        <div class="col-sm-12">
		<textarea class="form-control" id="coverletter" name="coverletter" placeholder="Cover Letter" rows="3"></textarea> 
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-12 control-label">Upload Resume</label>
        <div class="col-sm-12">
		<input type="file" class="form-control" id="uploadresume" name="uploadresume" placeholder="Upload Resume">
        </div>
      </div> 
    <div class="form-group">
        <div class="col-sm-12">
          <input type="submit" name="btnApply" value="Click Here to Apply" class="btn btn-info">
        </div>
      </div>
    </form>
  </div>	
 
 
