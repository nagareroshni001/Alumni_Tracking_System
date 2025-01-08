<?php
include("header.php");
if(!isset($_SESSION['type']))
{
	//echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['id']))
{
	$rs = mysqli_query($con,"update tblstaff set status='Active' where staffid=".$_GET['id']);
	if(mysqli_affected_rows($con) == 1)
	{
		$sqlsel = "SELECT * FROM  tblstaff where staffid=".$_GET['id'];
		$qrsuser = mysqli_query($con,$sqlsel);
		$rsuser = mysqli_fetch_array($qrsuser);
		//####################
		$cstname = $rsuser['staffname'];
		$emailid = $rsuser['emailid'];
		include("phpmailer.php");
		$msg = "Hello $cstname, <br><br>
		Welcome to ALUMNI TRACKING SYSTEM,<br><br>
		Your Staff account verified successfully..<br>
		<br>
		Login ID : " . $rsuser['staffname'] ." 
		<br>
		Password : " . $rsuser['staff_pass'] . "
		<br>
		<hr>
		<b>Do not share your Login Credentials with anyone.</b>";
		sendmail($emailid, $cstname , "ALUMNI TRACKING SYSTEM - Your Account Activated successfully...", $msg);
		//####################
		echo "<script>alert('Staff Account Approved successfully...!!');window.location='verify_staff.php';</script>";
	}
}
if(isset($_GET['did']))
{
	$rs = mysqli_query($con,"update tblstaff set status='Disapproved' where staffid=".$_GET['did']);
	if(mysqli_affected_rows($con) == 1)
	{
		$sqlsel = "SELECT * FROM  tblstaff where staffid=".$_GET['did'];
		$qrsuser = mysqli_query($con,$sqlsel);
		$rsuser = mysqli_fetch_array($qrsuser);
		//####################
		$cstname = $rsuser['staffname'];
		$emailid = $rsuser['emailid'];
		include("phpmailer.php");
		$msg = "Hello $cstname, <br><br>
		Welcome to ALUMNI TRACKING SYSTEM,<br><br>
		Due to some reasons we cannot activate/Approve your Staff account...<br>
		<hr>
		<b>Sorry for the Inconvenience.</b>";
		sendmail($emailid, $cstname , "ALUMNI TRACKING SYSTEM - Verification Status - Rejected...", $msg);
		//####################	
		echo "<script>alert('Account Disapproved or Suspended..!!');window.location='verify_staff.php';</script>";
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
    <th>#</th>
	  <th>Photo</th>
    <th>Full Name</th>
    <th>Qualification</th>
    <th>Designation</th>
    <th>Date Of Join</th>
     <th>Address</th>
    <th>Contact No</th>
    <th>Email Id</th>
      <th>Verify</th>
   </tr>
<?php
  $res = mysqli_query($con, "Select * from tblstaff where status='Inactive'");
  $c = 1;
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	  {
		echo "<tr>
		<td>".$c++."</td>
		<td>";
		if(file_exists('upload/staff/'.$row['staffphoto']))
		{
		echo "<img src='upload/staff/".$row['staffphoto']."' width='100px' height='100px' alt='$row[1]'/>";
		}
		else
		{
		echo "<img src='images/821no-user-image.png' width='100px' height='100px' alt='$row[1]'/>";
		}
		echo "</td>
		<td>".$row['staffname']."</td>
		<td>".$row['qualification']."</td>
		<td>".$row['designation']."</td>
		<td>".$row['dateof_join']."</td>
		<td>".$row['address']."</td>
		<td>".$row['contactno']."</td>
		<td>".$row['emailid']."</td>
	   
		<td><a href='verify_staff.php?id=$row[0]' class='btn btn-info'  onclick='return confirmverification()'  >Approve</a>&nbsp;/&nbsp;<a href='verify_staff.php?did=$row[0]' onclick='return confirmverification()'  class='btn btn-danger'>Deny</a></td>
	  </tr>";
	  }
   }
  else	  
	  {
		  echo "<tr><td colspan='10' style='text-align:center;'>Sorry!! No Records</td></tr>";
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