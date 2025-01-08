<?php
include("header.php");
if(!isset($_SESSION["type"]))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['id']))
{
	$qry = "update tbluser set status='Active',reg_date=CURDATE() where userid=".$_GET['id'];
	$qrs = mysqli_query($con,$qry);
	if(mysqli_affected_rows($con) == 1)
	{
		$sqlsel = "SELECT * FROM  tbluser where userid=".$_GET['id'];
		$qrsuser = mysqli_query($con,$sqlsel);
		$rsuser = mysqli_fetch_array($qrsuser);
		//####################
		$cstname = $rsuser['name'];
		$emailid = $rsuser['emailid'];
		include("phpmailer.php");
		$msg = "Hello $cstname, <br><br>
		Welcome to ALUMNI TRACKING SYSTEM,<br><br>
		Your account verified successfully..<br>
		<br>
		Login ID : " . $rsuser['emailid'] ." 
		<br>
		Password : " . $rsuser['upass'] . "
		<br>
		<hr>
		<b>Do not share your Login Credentials with anyone.</b>";
		sendmail($emailid, $cstname , "ALUMNI TRACKING SYSTEM - Your Account Activated successfully...", $msg);
		//####################
		echo "<script>alert('Student Account Approved successfully...!!');window.location='verify_reg.php';</script>";
	}
}
if(isset($_GET['did']))
{
	$qrs = mysqli_query($con,"update tbluser set status='Disapproved', reg_date=CURDATE() where userid=".$_GET['did']);
	if(mysqli_affected_rows($con) == 1)
	{
		$sqlsel = "SELECT * FROM  tbluser where userid=".$_GET['did'];
		$qrsuser = mysqli_query($con,$sqlsel);
		$rsuser = mysqli_fetch_array($qrsuser);
		//####################
		$cstname = $rsuser['name'];
		$emailid = $rsuser['emailid'];
		include("phpmailer.php");
		$msg = "Hello $cstname, <br><br>
		Welcome to ALUMNI TRACKING SYSTEM,<br><br>
		Due to some reasons we cannot activate/Approve your account...<br>
		<hr>
		<b>Sorry for the Inconvenience.</b>";
		sendmail($emailid, $cstname , "ALUMNI TRACKING SYSTEM - Verification Status - Rejected...", $msg);
		//####################		
		echo "<script>alert('Account Disapproved or Suspended..!!');window.location='verify_reg.php';</script>";
	}
}
?>
<br>
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row viewtablediv">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#featured">Verify Alumni</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row tablediv">
				<div class="col-md-12">
<table class="table table-bordered" id="dataTables-example">
  <tr>
    <th >#</th>
    <th >Name</th>
    <th >Email ID</th>
    <th >Contact No.</th>
    <th >DOB</th>
    <th >Passout Year</th>
    <th >Course</th>
    <th>Occupation</th>
	<th >Region</th>
    <th >Membership Detail</th>
    <th >Verify</th>
  </tr>

  <?php
  $res = mysqli_query($con, "Select * from tbluser left join tblcourse on tbluser.courseid=tblcourse.courseid left join tblregion on tbluser.location=tblregion.locid where  tbluser.status='Inactive'");
  $c = 1;
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   {  echo "<tr>
		<td>".$c++."</td>
		<td>".$row['name']."</td>
		<td>".$row['emailid']."</td>
		<td>".$row['phone']."</td>
		<td>".$row['dob']."</td>
		<td>".$row['pyear']."</td>
		<td>".$row['coursename']."</td>
		<td>".$row['occupation']."</td>
		<td>".$row['location']."</td>
		<td>".$row['membershiptype']."<br>Rs. ".$row['mfee']."<br>".$row['paytype']."</td>
		<td><a href='verify_reg.php?id=$row[0]' class='btn btn-info' onclick='return confirmverification()' >Approve</a><br><a href='verify_reg.php?did=$row[0]' onclick='return confirmverification()' class='btn btn-danger'>Deny</a></td>
		</tr>";
	   }
  }
  else	  
	  {
		  echo "<tr><td colspan='7' style='text-align:center;'>Sorry!! No Records</td></tr>";
	  }
?>
</table>
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
function confirmverification()
{
	if(confirm("Are you sure?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>


<link rel="stylesheet" type="text/css" href="DataTables-1.10.12/extensions/Buttons/css/buttons.dataTables.css">
 	<link rel="stylesheet" type="text/css" href="DataTables-1.10.12/media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="DataTables-1.10.12/media/js/jquery.dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.js">
	</script>
	<script type="text/javascript" language="javascript" src="Stuk-jszip-6d2b991/dist/jszip.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="pdfmake-master/build/pdfmake.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="pdfmake-master/build/vfs_fonts.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/extensions/Buttons/js/buttons.html5.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/examples/resources/syntax/shCore.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/examples/resources/demo.js">
	</script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable({
		dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
			'pdfHtml5'
        ]
	} );
        });
    </script>