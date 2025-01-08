<?php
include("header.php");
if(isset($_POST['btnsubmit']))
{
	if($_POST["utype"] == "1")
	{
		$rs = mysqli_query($conn,"select * from tbluser where emailid='".$_POST['username']."' and upass='".$_POST['password']."'");
		if(mysqli_num_rows($rs) > 0)
		{
				$result = mysqli_fetch_array($rs);
				$ts1 = strtotime(date("Y-m-d"));
				$ts2 = strtotime($result['reg_date']);
				
				$d1 = new DateTime(date("Y-m-d"));
				$d2 = new DateTime($result['reg_date']);

				$diff = $d2->diff($d1);
				$age = $diff->d;
				
				$seconds_diff = $ts1 - $ts2;
 
			  if($result['status'] == "Inactive")
			  {
				   echo "<script>alert('Account Yet to be Verified!!!');</script>";
			  }
			  else  if($result['status'] == "Disapproved")
			  {
				   echo "<script>alert('Account disapproved by Admin!!!');</script>";
			  }
			  else if($result['membershiptype'] == "Standard" && $age > 365)
			  {
				   echo "<script>alert('Membership Expired..Please Renew the memership!!!');window.location='renew.php?id=$result[0]';</script>";
			  }
			  else
			  {
				$_SESSION['uid'] = $result[0];
				$_SESSION['student_id'] = $result[0];
				$_SESSION['name'] = $result[2];
				$_SESSION['type'] = "alumni";
				$_SESSION['place'] = $result['location'];
				echo "<script>window.location='index.php';</script>";
			  }
		}
		else
		{
			 echo "<script>alert('Invalid credential!!!!!');</script>";
		} 
	}
	else if($_POST["utype"] == "2")
	{
		$rs = mysqli_query($conn,"select * from tblstaff where emailid='".$_POST['username']."' and staff_pass='".$_POST['password']."' ");
		if(mysqli_num_rows($rs) > 0)
		{
			$result = mysqli_fetch_array($rs);
			 if($result['status'] == "Inactive")
			  {
				   echo "<script>alert('Account Yet to be Verified!!!');</script>";
			  }
			  else  if($result['status'] == "Disapproved")
			  {
				   echo "<script>alert('Account disapproved by Admin!!!');</script>";
			  }
              else
			  {			  
					$_SESSION['uid'] = $result[0];
					$_SESSION['name'] = $result[1];
					$_SESSION['type'] = "staff";
					echo "<script>window.location='index.php';</script>";
		       }
		}
		else
		{
			echo "<script>alert('Invalid credential!!!!!');</script>";
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Staff / Alumni Login Panel</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label"><B>User type</B></label>
		 <select name="utype" id="utype" class="form-control" required>
			<option value="">Select User type</option>
			<option value="1">Alumni</option>
			<option value="2">Staff</option>
		 </select>
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>User Name</B></label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Password</B></label>
					 <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<div class="tn-news row">
						<div class="col-md-6">
							<input type="submit" class="btn btn-info" id="btnsubmit" name="btnsubmit" value="Click Here to Login" >
						</div>
						<div class="col-md-6" style="text-align: right;">
							<a href="forgotpass.php">Forget Password</a>
						</div>
					</div>
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