<?php
include("header.php");
if(!isset($_SESSION['type']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET["id"]))
{
	$qry = mysqli_query($con, "delete from tblofficer where id=".$_GET["id"]);
	if($qry)
	{
		echo "<script>alert('Record Deleted!!!');window.location='alumnioffice.php';</script>";
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Alumni Office bearears</a>
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
    <th >Photos</th>
    <th >Post</th>
	<th >Region</th>
    <th >Name</th>
    <th >Contact Detail</th>
	<th >Action</th>
  </tr>
<tbody>
  <?php
  $c = 1;

		$sqlofficebearer ="SELECT * from tblofficer";
		$qsqlofficebearer = mysqli_query($con,$sqlofficebearer);
		while($rsofficebearer  = mysqli_fetch_array($qsqlofficebearer))
		{
			$sqltblpost ="SELECT * from tblpost WHERE postid='$rsofficebearer[postid]'";
			$qsqltblpost = mysqli_query($con,$sqltblpost);
			$rstblpost  = mysqli_fetch_array($qsqltblpost);
			$sqlregion ="SELECT * from tblregion WHERE locid='$rsofficebearer[locid]'";
			$qsqlregion = mysqli_query($con,$sqlregion);
			$rstregion  = mysqli_fetch_array($qsqlregion);
			$q = "Select * from tbluser left join tblalumniphoto on tbluser.userid=tblalumniphoto.userid  where tbluser.status='Active' AND tbluser.userid='$rsofficebearer[userid]' ";
			$res = mysqli_query($con, $q);
			$row = mysqli_fetch_array($res);
		   {  echo "<tr>
			<td>".$c++."</td>";
			if($row['profilepic'] != NULL)
			{
			echo "<td><img src='upload/alumni/".$row['profilepic']."' width='150px' height='150px'/></td>";
			}
			else{
				echo "<td><img src='upload/alumni/noimage.png' width='150px' height='150px'/></td>";
			}
			echo "<td>".$rstblpost['postname']."</td>
			<td>".$rstregion['location']."</td>
			<td>".$row['name']."</td>
			<td>".$row['address']. "<br>Ph. No. ". $row['phone']. "<br>Email: " .$row['emailid']."</td>
			<td><a href='alumnioffice.php?id=$rsofficebearer[0]' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a></td>
			</tr>";
		   }
		}

   /* ### */  ?>
   </tbody>
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
function confirmdelete()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>