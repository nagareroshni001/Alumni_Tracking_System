<?php
include("header.php");
if(isset($_POST['update']))
{
	if(isset($_SESSION["type"]))
	{
		if($_SESSION["type"] == "alumni")
		{
			 $rs = mysqli_query($con,"update tbluser set upass='".$_POST['newpass']."' where userid=".$_SESSION["uid"]);
				if($rs)
				{
					echo "<script>alert('Password Updated!!');</script>";
				} 
		}
		else if($_SESSION["type"] == "admin")
		{
			 $rs1 = mysqli_query($con,"update tbladmin set apassword='".$_POST['newpass']."' where adminid=".$_SESSION["uid"]);
				if($rs1)
				{
					echo "<script>alert('Password Updated!!');</script>";
				}
		}
		else if($_SESSION["type"] == "staff")
		{
			 $rs2 = mysqli_query($con,"update tblstaff set staff_pass='".$_POST['newpass']."' where staffid=".$_SESSION["uid"]);
				if($rs2)
				{
					echo "<script>alert('Password Updated!!');</script>";
				}
		}
	}
	else
	{
		echo "<script>alert('Please login !!');window.location='index.php';</script>";
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Change Password</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label"><B>Current Password</B> </label>
					<input type="password" class="form-control" id="curpass" name="curpass" placeholder="Current Password" required onchange="checkpass(this.value)">
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>New Password</B> </label>
					 <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Password" required>
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Retype Password</B> </label>
					<input type="password" class="form-control" id="retypepass" name="retypepass" placeholder="Password" required>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" name="update" value="UPDATE" class="btn btn-info"  onclick="isPasswordMatch()"/>
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
<script>
function checkpass(pass)
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
						 
						 if(xmlhttp.responseText.trim() =="error")
						 {
							 alert("invalid current password");
							 document.getElementById("curpass").value="";
							 document.getElementById("curpass").focus();
						 }
					}
				}
		var getlink = "ajaxsetup.php?p="+pass;
        xmlhttp.open("GET",getlink,true);
        xmlhttp.send();
	
}

function isPasswordMatch() {
    var password = document.getElementById("newpass");
   var confirm_password = document.getElementById("retypepass");

    if(password.value != confirm_password.value) 
	{
    confirm_password.setCustomValidity("Passwords Don't Match");
    } 
   else 
   {
    confirm_password.setCustomValidity('');
   }
}
</script>

 