<?php
include("header.php");
if(isset($_POST['btnsubmit']))
{
	$sql = "select * from tbladmin where emailid='".$_POST['adminname']."' and apassword='". $_POST['password'] ."'";
	$qrs = mysqli_query($conn,$sql);
	echo mysqli_error($conn);
	if(mysqli_num_rows($qrs) > 0)
	{
		$result = mysqli_fetch_array($qrs);		  
		$_SESSION['uid'] = $result[0];
		$_SESSION['name'] = $result[1];
		$_SESSION['type'] = "admin";		
		echo "<script>window.location='index.php';</script>";
	}
	else
	{
	    echo "<script>alert('Invalid Login credential!!!!!');</script>";
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
						<a class="nav-link active" data-toggle="pill" href="#featured">ADMIN LOGIN</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label"><B>User Name</B></label>
					<input type="text" class="form-control" id="adminname" name="adminname" placeholder="Username" >
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Password</B></label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info" id="btnsubmit" name="btnsubmit" value="Click Here to Login" >
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