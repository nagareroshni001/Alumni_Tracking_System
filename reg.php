<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sqlregconfirm = "UPDATE alumni SET status='Registered' WHERE reg_no='$_POST[enrollment_no_entry]'";
	$qsqlregconfirm = mysqli_query($con,$sqlregconfirm);
	$qry = "insert into tbluser(gender,name, dob, emailid,phone,pyear, courseid,occupation,address,message,upass,status,location,membershiptype,mfee,paytype,bank,cardno,cvv,expmonth,expyear,reg_date,designation,organization,enrollment_no) values ('".$_POST['Gender']."','".$_POST['Name']."','".$_POST['Date_Of_Birth']."','".$_POST['Email']."','".$_POST['phone']."','".$_POST['Passing_Out_year']."','".$_POST['course']."','".$_POST['Occupation']."','".$_POST['Address']."','".$_POST['Message']."','".$_POST['Pass']."','Inactive','".$_POST['location']."','".$_POST['membershiptype']."','".$_POST['membershipfee']."','".$_POST['paytype']."','".$_POST['bankname']."','".$_POST['cardno']."','".$_POST['cvv']."','".$_POST['cardexpmonth']."','".$_POST['year']."','" . date("Y-m-d") . "','".$_POST['designation']."','" . $_POST['organization'] . "','" . $_POST['enrollment_no'] . "')";
	if(mysqli_query($con, $qry))
	{ 
		$uid = mysqli_insert_id($con);
		//$filename = "noimage.png";
		$filename = rand().$_FILES['aphoto']['name'];
		move_uploaded_file($_FILES['aphoto']['tmp_name'],"upload/alumni/".$filename);
		$rs1=mysqli_query($con,"insert into tblalumniphoto(userid,profilepic) values('".$uid."','".$filename."')");
		//####################
		/*
		$cstname = $_POST['Name'];
		$emailid = $_POST['Email'];
		include("phpmailer.php");
		$msg = "Hello $cstname, <br><br>
		Welcome to ALUMNI TRACKING SYSTEM,<br><br>
		Your account verified successfully..<br>
		<br>
		Login ID : " . $_POST['Email'] ." 
		<br>
		Password : " . $_POST['Pass'] . "
		<br>
		<hr>
		<b>Do not share your Login Credentials with anyone.</b>";
		sendmail($emailid, $cstname , "Successfully registered with ALUMNI TRACKING SYSTEM..", $msg);
		*/
		//####################
		echo "<script>alert('Registration Done successfully.. You will get an Email Notification After admin verification...');</script>";
		echo "<script>window.location='index.php';</script>"; 
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Staff / Alumni Login Panel</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-6">
					<label class="control-label"><B>Full Name</B> <span id="lblError" style="color: red"></span></label>
					<input type="text" class="form-control" id="Name" name="Name" placeholder="Name"   onkeypress="return Validate(event);"  >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Profile Photo</B></label>
					<input type="file" class="form-control" id="aphoto" name="aphoto" >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Gender</B> </label>
					<select name="Gender" id="Gender"  class="form-control" >
						<option value="">Select Gender</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Date of Birth</B> </label>
					<input type="date" class="form-control" id="Date_Of_Birth" name="Date_Of_Birth" placeholder="Date of Birth" >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Email ID</B> </label>
					<input type="email" class="form-control" id="Email" name="Email" placeholder="Email ID"  onchange="checkemail(this.value)">
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Contact No.</B> </label>
					<input type="number" class="form-control" id="phone" name="phone" placeholder="Contact no." required>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Password</B> </label>
					<input type="Password" class="form-control" id="Pass" name="Pass" placeholder="Password" >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Confirm Password</B> </label>
					<input type="Password" class="form-control" id="Cpass" name="Cpass" placeholder="Confirm Password"  >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Select Course</B> </label>
					<select name="course" id="course" class="form-control">
					<?php
					$qry = "Select * from tblcourse";
					$res = mysqli_query($con, $qry);
					echo "<option value='0'>-- Select --</option>";
					while($row = mysqli_fetch_array($res))
					{
						echo "<option value='$row[0]'>$row[1]</option>";
					}
					?>
					</select>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Enrollment No.</B> </label>
					<input type="text" class="form-control" id="enrollment_no_entry" name="enrollment_no_entry" placeholder="Enrollment No." required readonly>
				</div>
				<div class="col-md-6">
					<label  class="control-label">Occupation</label>
					<input type="text" class="form-control" id="Occupation" name="Occupation" placeholder="Occupation" >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Passout Year</B> </label>
					<input type="number" class="form-control" id="Passing_Out_year" name="Passing_Out_year" placeholder="Passout Year" required onchange="validateDate(this.value,Date_Of_Birth.value)" readonly>
				</div>
				<div class="col-md-6">
					<label  class="control-label">Organization</label>
					<input type="text" class="form-control" id="organization" name="organization" placeholder="Organization" >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Designation</B> </label>
					<input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" >
				</div>
				<div class="col-md-6">
					<label  class="control-label">Address</label>
					<textarea class="form-control" id="Address" name="Address" placeholder="Address"></textarea> 
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Region</B> </label>
					<select name="location" id="location" class="form-control">
					<?php
					$qry = "Select * from tblregion";
					$res = mysqli_query($con, $qry);
					echo "<option value='0'>-- Select Region --</option>";
					while($row = mysqli_fetch_array($res))
					{
						echo "<option value='$row[0]'>$row[1]</option>";
					}
					?>
					</select>
				</div>
				<div class="col-md-6">
					<label  class="control-label">Membership Type</label>
					<select name="membershiptype"  class="form-control"  onchange="updatecost(this.value)">
						<option value="Standard" selected >Standard</option>
						<option value="Premium">Premium</option>
					</select>
				</div>
				<div class="col-md-6">
					<label  class="control-label">Membership Fee</label>
					<input type="text" class="form-control" id="membershipfee" readonly name="membershipfee" placeholder="Membership Fee" required value="500">
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Payment Type</B> </label>
					<select name="membershiptype"  class="form-control" required >
						<option value=""  >Select Payment Type</option>
						<option value="Debitcard"  >Debit Card</option>
						<option value="Creditcard">Credit Card</option>
					</select>
				</div>
				<div class="col-md-6">
					<label  class="control-label">Bank Name</label>
					<input type="text" class="form-control" id="bankname" name="bankname" placeholder="Bank Name" required>
				</div>
				<div class="col-md-6">
					<label  class="control-label">Card No.</label>
					<input type="number" class="form-control" id="cardno" name="cardno" placeholder="Card No" required>
				</div>
				<div class="col-md-6">
					<label  class="control-label">CVV No.</label>
					<input type="Password" class="form-control" id="cvv" name="cvv" placeholder="CVV" required >
				</div>
				<div class="col-md-6">
					<label  class="control-label">Card Expire Month</label>
					<select name="cardexpmonth" id="cardexpmonth" class="form-control">
					 <option value='0'>--Select -- </option> 
					 <option value='1'>1</option>
					 <option value='2'>2</option>
					 <option value='3'>3</option>
					 <option value='4'>4</option>
					 <option value='5'>5</option>
					 <option value='6'>6</option>
					 <option value='7'>7</option>
					 <option value='8'>8</option>
					 <option value='9'>9</option>
					 <option value='10'>10</option>
					 <option value='11'>11</option>
					 <option value='12'>12</option>
					 </select>
				</div>
				<div class="col-md-6">
					<label  class="control-label">Year</label>
					<select name="year" id="year" class="form-control">
						 <option value='0'>--Select -- </option>
						 <option value='2021'>2021</option>
						 <option value='2022'>2022</option>
						 <option value='2023'>2023</option>
						 <option value='2024'>2024</option>
						 <option value='2025'>2025</option>
					</select>
				</div>
				<div class="col-md-6">

				</div>
				<div class="col-md-12">
					<label  class="control-label">Message (About Yourself)</label>
					<textarea class="form-control" id="Message" name="Message" placeholder="Message" rows="3"></textarea>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<div class="tn-news">
							<button value="Login" name="btnsubmit" id="btnsubmit" class="btn btn-warning btn-lg" type="button" onclick="return frmValidate()" >Click Here to Register</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="otpModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="max-width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Verify OTP</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
	<p class="coupon-input form-row-first">
		<label><b>We have sent OTP to following Email ID.</b></label>
		<input type="text" name="emailids" id="emailids" readonly class='form-control'>
		<input type="hidden" name="otpnumber" id="otpnumber" readonly>
	</p>
		<p class="coupon-input form-row-first">
		<label>Enter OTP</label>
		<input type="text" name="enteredotp" id="enteredotp" class='form-control'>
	</p>
      </div>
      <div class="modal-footer">
			<button value="Login" name="submit" id="submit" class="btn btn-info btn-lg" type="submit" onclick="return validateotp()">Complete Registration</button>
      </div>
    </div>
  </div>
</div>
<div id="VerifyModal" class="modal fade" role="dialog">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <b class="modal-title">Kindly enter following details to Create account</b>
        <a href="index.php"  class="btn-danger" style="float: right;" >&nbsp; CANCEL &nbsp;</a>
      </div>
      <div class="modal-body">
	<p class="coupon-input form-row-first">
		<label><b>Enrollment Number</b> <span id="id_verify_reg_no"></span></label>
		<input type="text" name="verify_reg_no" id="verify_reg_no"  class='form-control'>
	</p>
		<p class="coupon-input form-row-first">
		<label>Passout Year <span id="id_verify_pass_yr"></span></label>
		<input type="number" name="verify_pass_yr" id="verify_pass_yr" class='form-control'>
	</p>
      </div>
      <div class="modal-footer">
			<span id="idverificationstatus"></span> <button value="Login" name="submit" id="submit" class="btn btn-primary" type="button" onclick="return verifyregdetail()">Verify Details</button>
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
    function frmValidate()
	{
        var password = document.getElementById("Pass");
        var confirmPassword = document.getElementById("Cpass");
		
        var month = document.getElementById("cardexpmonth").value;
        var year = document.getElementById("year").value;
		
		var objdate = new Date();
		var cur_month = objdate.getUTCMonth()+1;
		var cur_year = objdate.getUTCFullYear();
		
		if(document.getElementById("Name").value == "")
		   {
			   alert('Name Should not be empty');
			   document.getElementById("Name").focus();
			   return false;
		   }
		else if(document.getElementById("aphoto").value == "")
		   {
			   alert('Kindly upload Photo');
			   document.getElementById("aphoto").focus();
			   return false;
		   }
		else if(document.getElementById("Gender").value == "")
		   {
			   alert('Kindly select Gender');
			   document.getElementById("Gender").focus();
			   return false;
		   }
		else if(document.getElementById("Email").value == "")
		   {
			   alert('Kindly Enter valid Email ID');
			   document.getElementById("Email").focus();
			   return false;
		   }
		else if(document.getElementById("phone").value.length != 10)
		   {
			   alert('Invalid Mobile Number');
			   document.getElementById("phone").focus();
			   return false;
		   }
	   else if(document.getElementById("cardno").value == "")
		{
			alert("Enter Card Number");
			document.getElementById("cardno").focus();
			return false;
		}
		 else if(document.getElementById("cardno").value.length != 16)
		{
			alert("Invalid Card Number");
			document.getElementById("cardno").value="";
			document.getElementById("cardno").focus();
			return false;
		}
		else if(document.getElementById("cvv").value == "")
		{
			alert("Please Enter CVV");
			document.getElementById("cvv").focus();
			return false;
		}
		else if(document.getElementById("cvv").value.length != 3)
		{
			alert("Kindly enter 3 digit CVV");
			document.getElementById("cvv").value="";
			document.getElementById("cvv").focus();
			return false;
		}
		else if(month == 0)
		{
			alert("Select Month");
			return false;
		}
		else if(year == 0)
		{
			alert("Select Year");
			return false;
		}
		else if(month < cur_month && year == cur_year)
		{
			alert('Card Expired!!!');
			return false;
		}
	   else if(password.value == "")
	   {
		   alert('Enter Password');
		   password.focus();
		   return false;
	   }
	   else if(password.value.length < 6 || password.value.length >10)
	   {
		   alert('Password length should be between 6 to 10.');
		   password.focus();
		   return false;
	   }
	   else if(password.value != confirmPassword.value) 
		{
			alert('Password Mismatch!!!');
			document.getElementById("Pass").value = "";
			document.getElementById("Cpass").value = "";
		}
		 else   
		 {
				$('#otpModal').modal('show');
				document.getElementById("emailids").value = document.getElementById("Email").value;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) 
					{
						document.getElementById("otpnumber").value = this.responseText;
						document.getElementById("emailids").value = document.getElementById("Email").value;
					}
				};
				xmlhttp.open("GET","sendotp.php?emailid="+document.getElementById("Email").value+"&cstname="+document.getElementById("Name").value,true);
				xmlhttp.send();
		 }
    }
</script>
<script>
function validateotp()
{
	if(document.getElementById("otpnumber").value == document.getElementById("enteredotp").value)
	{
		return true;
	}
	else
	{
		alert("You have entered invalid OTP..");
		return false;
	}
}
</script>
<script type="text/javascript">
function validateDate(date, dob)
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
				 
				if(xmlhttp.responseText.trim() == "error")
				{
					  document.getElementById("Passing_Out_year").value="";
					  document.getElementById("Passing_Out_year").focus();
					  alert("Invalid Passout Year");
				}
				 
			}
		}
	var getlink = "ajaxsetup.php?passdate="+date+"&dob="+dob;
	xmlhttp.open("GET",getlink,true);
	xmlhttp.send();
}
</script>
<script>
	function updatecost(type)
	{
		if(type == "Standard")
		{
			document.getElementById("membershipfee").value = "500";
		}
		else if(type == "Premium")
		{
			document.getElementById("membershipfee").value = "1000";
		}
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
<script>
function checkemail(email)
{
	if (window.XMLHttpRequest) 
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
		{
			if(xmlhttp.responseText.trim() == "error")
			{
				  document.getElementById("Email").value="";
				  document.getElementById("Email").focus();
				  alert("Email Id already Registred");
			}
		}
	}
	var getlink = "ajaxsetup.php?useremail="+email;
	xmlhttp.open("GET",getlink,true);
	xmlhttp.send();
}
</script>
<script type="text/javascript">
    $(window).on('load', function() {
		$('#VerifyModal').modal({backdrop: 'static', keyboard: false})  
    });
</script>
<script type="application/javascript">
 function verifyregdetail()
 {
	 //	verify_reg_no id_verify_reg_no verify_pass_yr id_verify_pass_yr
	 var validatecondtion = 0;
	 document.getElementById("id_verify_reg_no").innerHTML ="";
	 document.getElementById("id_verify_pass_yr").innerHTML ="";
	 if(document.getElementById("verify_reg_no").value=="")
	 {
		 document.getElementById("id_verify_reg_no").innerHTML ="<font color='red'>Enrollment Number Should not be empty..</font>";
		 validatecondtion=1;
	 }
	 if(document.getElementById("verify_pass_yr").value=="")
	 {
		 document.getElementById("id_verify_pass_yr").innerHTML ="<font color='red'>Pass year should not be empty.</font>";
		 validatecondtion=1;
	 }
	 if(validatecondtion==1)
	 {
		 return false;
	 }
	 else
	 {
		//#######################
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
			document.getElementById("idverificationstatus").innerHTML = this.responseText;
			if(this.responseText=="<span style='color: green;'>Account Verified Successfully..</span>")
			{
				document.getElementById("enrollment_no_entry").value = document.getElementById("verify_reg_no").value;
				document.getElementById("Passing_Out_year").value = document.getElementById("verify_pass_yr").value;
				$("#VerifyModal").modal('hide');
			}
		  }
		};
		xmlhttp.open("GET","ajaxregverification.php?verify_reg_no="+document.getElementById("verify_reg_no").value+"&verify_pass_yr="+document.getElementById("verify_pass_yr").value,true);
		xmlhttp.send();
		//#######################
	 }
 }
 </script>