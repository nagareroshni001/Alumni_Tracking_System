<?php
include("header.php");
if(isset($_SESSION["type"]))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['fpass']))
{
	if($_POST["utype"] == "1")
	{
		$email=$_POST['email'];
		$check_user_data = mysqli_query($conn,"SELECT * FROM tbluser WHERE emailid = '".$_POST['email']."'") ;
		
		if(mysqli_num_rows($check_user_data) == 0)
		{
			echo "<script>alert('This email address does not exist. Please try again.')</script>";
		}
		else 
		{
			$row = mysqli_fetch_array($check_user_data);
			$email=$row['emailid'];
			$to = $email;
			$subject  =  "Here are your login details . . . ";
				$message = "This is in response to your request for reset login password as ALUMNI of our ALUMNI TRACKING SYSTEM.<br/>Your Name is ".$row['name'].".<br/>Your  Password is ".$row['upass'].".<br/>Don't give your password to anyone in your group, but do save it somewhere safe. <br/><br/> Enjoy!!..<br/>Regards,<br/>the management";
				include("phpmailer.php");
			sendmail($to,$row['name'],$subject,$message);
			echo "<script>alert('Please Check your registered email id..');window.location='forgotpass.php';</script>";
		}
	}
	else if($_POST["utype"] == "2")
	{
		$email=$_POST['email'];
		$check_user_data = mysqli_query($conn,"SELECT * FROM tblstaff WHERE emailid = '".$_POST['email']."'") ;
		
		if(mysqli_num_rows($check_user_data) == 0)
		{
			echo "<script>alert('This email address does not exist. Please try again.')</script>";
		}
		else 
		{
			$row = mysqli_fetch_array($check_user_data);
			$email=$row['emailid'];
			$to = $email;
			$subject  =  "Here are your login details . . . ";
			$message = "This is in response to your request for reset login password as Staff of our ALUMNI TRACKING SYSTEM.<br/>Your Name is ".$row['staffname'].".<br/>Your  Password is ".$row['staff_pass'].".<br/>Don't give your password to anyone in your group, but do save it somewhere safe. <br/><br/> Enjoy!!..<br/>Regards,<br/>the management";
			include("phpmailer.php");
			sendmail($to,$row['staffname'],$subject,$message);
			echo "<script>alert('Please Check your registered email id..');</script>";
			echo "<script>window.location='forgotpass.php';</script>";
		}
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Forgot Password</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label"><B>User type</B></label>
					<select name="utype" id="utype" class="form-control" required>
						 <option value="1">Alumni</option>
						  <option value="2">Staff</option>
						 </select>
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Enter Registered Email ID</B></label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Email Id" required>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info" id="btnsubmit" name="fpass" value="Click Here to Recover Password" >
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