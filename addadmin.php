<?php
include("header.php");
if(isset($_POST['btnsubmit']))
{
	$qry = "insert into tbladmin(fullname,emailid,apassword,contactno) values ('".$_POST['Name']."','".$_POST['Email']."','". md5($_POST['Pass'])."','".$_POST['phone']."')";
	if(mysqli_query($con, $qry))
	{ 		
	echo "<script>alert('New Admin record Added!!!');</script>";
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Add Admin</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label"><B>Full Name</B> <span id="lblError" style="color: red"></span></label>
					<input type="text" class="form-control" id="Name" name="Name" placeholder="Name" required  onkeypress="return Validate(event);"  >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Email ID/Login ID</B></label>
					<input type="email" class="form-control" id="Email" name="Email" placeholder="Email Id" required onchange="checkemail(this.value)">
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Contact No.</B></label>
					<input type="number" class="form-control" id="phone" name="phone" placeholder="Contact no." required>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Password</B></label>
					<input type="Password" class="form-control" id="Pass" name="Pass" placeholder="Password" required>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Confirm Password</B></label>
					<input type="Password" class="form-control" id="Cpass" name="Cpass" placeholder="Confirm Password" required >
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