<?php
include("header.php");
if(!isset($_SESSION["uid"]) && isset($_SESSION['type']) != "alumni")
{
	echo "<script>alert('".$_SESSION['type']."');window.location='index.php';</script>";
}
if(isset($_POST['btnsubmit']))
{
   $qry = "insert into tbljob(company,jobtitle,qualification,jobdescription,salary,exp_required,noofvacancy,emailid,status,lastdate,alumnid,keyskils,job_location) values ('".$_POST['company']."','".$_POST['jobtitle']."','".$_POST['qualification']."','".$_POST['description']."','".$_POST['package']."','".$_POST['exp_required']."','".$_POST['noofvacancy']."','".$_POST['emailid']."','Active','".$_POST['lastdate']."','".$_SESSION["uid"]."','".$_POST['keyskills']."','".$_POST['joblocation']."')";
	 
	 if(mysqli_query($conn, $qry))
	 { 
		echo "<script>alert('success!!!');</script>";  
	 }
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Post Jobs</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label">Job Title</label>
					<input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Job Title" required>
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Description</B></label>
					<textarea class="form-control" id="description" name="description" placeholder="Description" rows="3"></textarea> 
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Company</B> </label>
					<input type="text" class="form-control" id="company" name="company" placeholder="Company" required>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Job Location</B></label>
					<input type="text" class="form-control" id="joblocation" name="joblocation" placeholder="Job Location" required>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Qualification</B></label>
					 <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Qualification" required>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Key Skills</B></label>
					<input type="text" class="form-control" id="keyskills" name="keyskills" placeholder="Key Skills" required>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Package</B></label>
					<input type="text" class="form-control" id="package" name="package" placeholder="Package">
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Reference Email</B></label>
					<input type="email" class="form-control" id="emailid" name="emailid" placeholder="Reference Email" required>
				</div>
				<div class="col-md-4">
					<label class="control-label"><B>No. of Vacancy</B></label>
					<input type="number" class="form-control" id="noofvacancy" name="noofvacancy" placeholder="No. of Vacancy" required>
				</div>
				<div class="col-md-4">
					<label class="control-label"><B>Experienced Required</B></label>
					<input type="text" class="form-control" id="exp_required" name="exp_required" placeholder="Experienced Required" required>
				</div>
				<div class="col-md-4">
					<label class="control-label"><B>Last Date to Apply</B></label>
					 <input type="date" class="form-control" id="lastdate" name="lastdate" placeholder="Last Date" required min="<?php date("Y-m-d"); ?>">
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info btn-lg" id="btnsubmit" name="btnsubmit" value="Click Here to Submit" >
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