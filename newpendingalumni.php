<?php
include("header.php");
if(!isset($_SESSION['type']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE alumni SET name='".$_POST['name']."',reg_no='".$_POST['reg_no']."',pass_yr='".$_POST['pass_yr']."',courseid='".$_POST['courseid']."' WHERE  alumni_id='" . $_GET['editid'] . "'";
		$qsql = mysqli_query($con, $sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Alumni Record updated successfully..');</script>";
		}
		else
		{
			echo "<script>alert('ERROR: Registration number already exists..');</script>";
		}
	}
	else
	{	
		$sql = "insert into alumni(name,reg_no,pass_yr,courseid,status) values ('".$_POST['name']."','".$_POST['reg_no']."','".$_POST['pass_yr']."','".$_POST['courseid']."','Pending')";
		$qsql = mysqli_query($con, $sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('New Alumni Record Added..');</script>";
			echo "<script>window.location='newpendingalumni.php';</script>";
		}
		else
		{
			echo "<script>alert('ERROR: Registration number already exists..');</script>";
			echo "<script>window.location='newpendingalumni.php';</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM alumni where alumni_id='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con, $sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
<br>
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#featured">Add Alumni Account</a>
					</li>
				</ul>
<form action="" method="post" enctype="multipart/form-data"  name="frmform" onsubmit="return validateform()">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-6">
					<label class="control-label"><B>Student Name</B> <span id="lblname" style="color: red"></span></label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Full Name"   onkeypress="return Validate(event);" value="<?php echo $rsedit['name']; ?>"  >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Course</B> <span id="lblcourseid" style="color: red"></span></label>
					<select class="form-control" name="courseid" id="courseid">
					<option value="">Select Course</option>
					<?php
					$sqlcourse = "SELECT * FROM tblcourse";
					$qsqlcourse = mysqli_query($con,$sqlcourse);
					while($rscourse = mysqli_fetch_array($qsqlcourse))
					{
						if($rscourse['courseid'] == $rsedit['courseid'])
						{
							echo "<option value='$rscourse[courseid]' selected>$rscourse[coursename]</option>";
						}
						else
						{
							echo "<option value='$rscourse[courseid]'>$rscourse[coursename]</option>";
						}
					}
					?>
				  </select>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Registration No.</B> <span id="lblreg_no" style="color: red"></span></label>
					<input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="Registration No." value="<?php echo $rsedit['reg_no']; ?>"  >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Passout year</B> <span id="lblpass_yr" style="color: red"></span></label>
					<input type="number" class="form-control" id="pass_yr" name="pass_yr" placeholder="Passout year"  min="2001" max="2030" value="<?php echo $rsedit['pass_yr']; ?>" >
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info btn-lg" name="submit" value="Click Here to Submit" >
				</div>
			</div>
		</div>
	</div>
</FORM>				
			</div>

		</div>
	</div>
</div>
<!-- Tab News Start-->
<br>
<?php
include("footer.php");
?>
<script type="application/javascript">
function validateform()
{
	 var validatecondtion = 0;
	 document.getElementById("lblname").innerHTML ="";
	 document.getElementById("lblcourseid").innerHTML ="";
	 document.getElementById("lblreg_no").innerHTML ="";
	 document.getElementById("lblpass_yr").innerHTML ="";
	 if(document.frmform.name.value=="")
	 {
		document.getElementById("lblname").innerHTML ="<font color='red'>Name Should not be emtpy..</font>";
		validatecondtion=1;
	 }
	 if(document.frmform.courseid.value=="")
	 {
		document.getElementById("lblcourseid").innerHTML ="<font color='red'>RKindly select the Course..</font>";
		validatecondtion=1;
	 }
	 if(document.frmform.reg_no.value=="")
	 {
		document.getElementById("lblreg_no").innerHTML ="<font color='red'>Registration No. Should not be empty..</font>";
		validatecondtion=1;
	 }
	 if(document.frmform.pass_yr.value=="")
	 {
		document.getElementById("lblpass_yr").innerHTML ="<font color='red'>Passout Year Should not be empty..</font>";
		validatecondtion=1;
	 }
	 if(validatecondtion==1)
	 {
		return false;
	 }
	 else
	 {
		return true;
	 }
}
</script>