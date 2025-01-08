<?php
include("header.php");
if(!isset($_SESSION["type"]) || $_SESSION["type"] != "alumni")
{
	echo "<script>window.location='index.php'</script>";
}
if(isset($_POST['updatep']))
{
	$filename = rand().$_FILES["aphoto"]["name"];
	move_uploaded_file($_FILES["aphoto"]["tmp_name"],"upload/alumni/".$filename);
	//update query for alumni profile
	$rs = mysqli_query($con,"update tbluser set gender='".$_POST['Gender']."',name='".$_POST['Name']."',phone='".$_POST['phone']."',occupation='".$_POST['Occupation']."',address='".$_POST['Address']."',location='".$_POST['location']."' where userid=".$_SESSION['uid']);
	$sqlphotoupd = "DELETE FROM tblalumniphoto where userid = ".$_SESSION['uid'];
	mysqli_query($con,$sqlphotoupd);
	$sqlupd = "INSERT INTO tblalumniphoto (profilepic,userid) VALUES('$filename','$_SESSION[uid]')";
	$rs1=mysqli_query($con,$sqlupd);
	echo "<script>alert('Record updated successfully...!!');window.location='alumniprofile.php';</script>";
}
$res = mysqli_query($con, "Select * from tbluser left join tblcourse on tbluser.courseid=tblcourse.courseid left join tblalumniphoto on  tbluser.userid = tblalumniphoto.userid left join tblregion on tbluser.location=tblregion.locid where tbluser.userid=".$_SESSION["uid"]);
echo mysqli_error($con);
$row = mysqli_fetch_array($res);		
$name = $row['name'];
$gender = $row['gender'];
$dob= $row['dob'];
$course=$row['coursename'];
$email = $row['emailid'];
$contactno = $row['phone'];
$pyear = $row['pyear'];
$occupation = $row['occupation'];
$address = $row['address'];
$location=$row['location'];
$photo = $row['profilepic'];
?>
<br>
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#featured">My Profile</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-6">
					<label class="control-label"><B>Full Name</B></label>
					<input type="text" class="form-control" id="Name" name="Name" placeholder="Name" required value="<?php echo $name; ?>"readonly>
					<br>
					<label class="control-label"><B>Gender</B></label>
					<input type="Radio" name="Gender" value="Male"  checked/> Male
         <input type="Radio" name="Gender" value="Female" /> Female
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Photo</B></label>
					<input type="file" class="form-control" id="aphoto" name="aphoto" required readonly>
					<img src="upload/alumni/<?php echo $photo; ?>" height="120px" width="120px" readonly />
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Date of Birth</B></label>
					<input type="date" class="form-control" id="Date_Of_Birth" name="Date_Of_Birth" placeholder="Date of Birth" value="<?php echo $dob; ?>" readonly >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Email ID</B></label>
					<input type="email" class="form-control" id="Email" name="Email" placeholder="Email Id" value="<?php echo $email; /* ### */  ?>" readonly >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Contact No.</B></label>
					 <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact no."  value="<?php echo $contactno; /* ### */  ?>" readonly>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Passout Year</B></label>
					<input type="text" class="form-control" id="Passing_Out_year" name="Passing_Out_year" placeholder="Passout Year" readonly value="<?php echo $pyear ; /* ### */  ?>">
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Course</B></label>
					<input type="text" class="form-control" id="course" name="course" placeholder="Course" value="<?php echo $course; /* ### */  ?>" readonly>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Occupation</B></label>
					<input type="text" class="form-control" id="Occupation" name="Occupation" placeholder="Occupation" required value="<?php echo$occupation ; /* ### */  ?>" readonly>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Address</B></label>
					<textarea class="form-control" id="Address" name="Address" placeholder="Address" rows="3" readonly ><?php echo $address; /* ### */  ?></textarea>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>City</B></label>
					<input type="text" class="form-control" id="location" name="location" placeholder="City" required value="<?php echo $location; /* ### */  ?>" readonly>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info btn-lg" name="updatep" id="btnupdatep" value="Update Profile" onclick="updateprofile()">
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