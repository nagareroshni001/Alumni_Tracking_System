<?php
include("header.php");
if(isset($_POST['submit']))
{
   $qry = "insert into tbltraining(topicname,description,courseid,trainingdate,duration,venue,participationdate,refcontactname,refcontactno,status) values ('".$_POST['topic']."','".$_POST['description']."','".$_POST['course']."','".$_POST['trainingdate']."','".$_POST['duration']."','".$_POST['venue']."','".$_POST['participationdate']."','".$_POST['refcontactname']."','".$_POST['refcontactno']."','".$_POST['status']."')";
	 
	 if(mysqli_query($con, $qry))
	 { 
		echo "<script>alert('success!!!');</script>";  
	 }
}
if(isset($_POST['update']))
{
	$rs = mysqli_query($con,"update tbltraining set topicname='".$_POST['topic']."',description='".$_POST['description']."',courseid='".$_POST['course']."',trainingdate='".$_POST['trainingdate']."',duration='".$_POST['duration']."',venue='".$_POST['venue']."',participationdate='".$_POST['participationdate']."',status='".$_POST['status']."',refcontactname='".$_POST['refcontactname']."',refcontactno='".$_POST['refcontactno']."' 
	where trainingid='".$_POST['trid']."'");
	if($rs)
	{
		echo "<script>alert('Record updated successfully...!!');window.location='viewtraining.php';</script>";
	}
}
if(isset($_GET['eid']))
{
	$rs = mysqli_query($con, "Select * from tbltraining where trainingid=".$_GET['eid']);
	$row = mysqli_fetch_array($rs);
	$tid = $row[0];
	$topic = $row[1];
	$descr = $row[2];
	$courseid = $row[3];
	$tdate = $row[4];
	$duration = $row[5];
	$venue = $row[6];
	$pdate = $row[7];
	$status = $row[8];
	$rcontact = $row[9];
	$rphone = $row[10];
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Schedule Training</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
      <input type="hidden" value="<?php echo $tid; ?>" name="trid"/>
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-6">
					<label class="control-label"><B>Course</B></label>
			<select name="course" id="course" class="form-control">
			<?php
			$qry = "Select * from tblcourse";
			$res = mysqli_query($con, $qry);
			echo "<option value='0'>-- Select --</option>";
			while($row = mysqli_fetch_array($res))
			{
				if($courseid == $row[0])
				{
					echo "<option value='$row[0]' selected>$row[1]</option>";
				}
				else
				{
					echo "<option value='$row[0]'>$row[1]</option>";
				}
			}
			?>
			</select>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Training Date</B></label>
					 <input type="date" class="form-control" id="trainingdate" name="trainingdate" placeholder="Training Date" required value="<?php echo $tdate; /* ### */  ?>" onchange="validateDate(this.value)">
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Topic</B></label>
					 <input type="text" class="form-control" id="topic" name="topic" placeholder="Topic" required value="<?php echo $topic; ?>">
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Description</B></label>
					<textarea  class="form-control" id="description" name="description" placeholder="Description" required ><?php echo $descr;  ?></textarea>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Duration</B></label>
					<input type="text" class="form-control" id="duration" name="duration" placeholder="Duration" value="<?php echo $duration; ?>">
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Venue</B></label>
					<input type="text" class="form-control" id="venue" name="venue" placeholder="Venue" required value="<?php echo $venue; ?>">
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Last Date Participation</B></label>
					<input type="date" class="form-control" id="participationdate" name="participationdate" placeholder="Participation date" required value="<?php echo $pdate; /* ### */  ?>" onchange="validateDate1(this.value)">
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Reference Contact Name</B></label>
					<input type="text" class="form-control" id="refcontactname" name="refcontactname" placeholder="Reference Contact Name" required value="<?php echo $rcontact; /* ### */  ?>" >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Reference Contact Number</B></label>
					<input type="number" class="form-control" id="refcontactno" name="refcontactno" placeholder="Reference Contact Number" required value="<?php echo $rphone; /* ### */  ?>" onchange="validatephone(this.value)">
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Status</B></label>
					<select name="status" id="status" class="form-control">
				   <option value="Active" <?php if($status == 'Active') echo "selected"; /* ### */  ?> >Active</option>
					<option value="Inactive" <?php if($status == 'Inactive') echo "selected"; /* ### */  ?> >Inactive</option>
				   </select>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
		<?php
		if(isset($_GET['eid']))
		{
		?>
         <input type="submit" class="btn btn-info btn-lg" name="update" value="CLICK HERE TO UPDATE">
         <?php
		}
		else
		{
		?>
          <input type="submit" class="btn btn-info btn-lg" name="submit" value="CLICK HERE TO SUBMIT">
         <?php
          }
          ?>
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
<script type="text/javascript">
    function Validate()
	{
        var password = document.getElementById("Pass").value;
        var confirmPassword = document.getElementById("Cpass").value;
		
        var month = document.getElementById("cardexpmonth").value;
        var year = document.getElementById("year").value;
    }
</script>
<script>
function checkemail(email)
{
			 if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							 
							if(xmlhttp.responseText == "error")																							
							{
								  document.getElementById("Email").value="";
								  document.getElementById("Email").focus();
								  alert("Email Id already Registred");
							}
							 
						}
					}
			var getlink = "ajaxsetup.php?adminemail="+email;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
}
</script>
<script type="text/javascript">
    function Validate(e) {
        var keyCode = e.keyCode || e.which;
 
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
 
        //Regex for Valid Characters i.e. Alphabets.
        var regex = /^[A-Za-z\s]+$/;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            lblError.innerHTML = "Only Alphabets allowed.";
        }
        return isValid;
    }
</script>