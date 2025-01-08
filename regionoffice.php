<?php
include("header.php");
if(isset($_POST['submit']))
{
	$qrys = "select * from tblofficer where locid='".$_POST['region']."' and postid='".$_POST['position']."' and userid = '".$_POST['user']."'";
	$res = mysqli_query($con, $qrys);
	if(mysqli_num_rows($res) > 0)
	{
		echo "<script>alert('Data Already Exist!!!');</script>";
	}
	else
	{
		$qrys2 = "select * from tblofficer where locid='".$_POST['region']."' and postid='".$_POST['position']."'";
		$res2 = mysqli_query($con, $qrys2);
		if(mysqli_num_rows($res2) > 0)
		{
			echo "<script>alert('Post Already Exist for this region!!!');</script>";
		}
		else
		{
			$qry = "insert into tblofficer(locid,postid, userid) values ('".$_POST['region']."','".$_POST['position']."','".$_POST['user']."')";
			if(mysqli_query($con, $qry))
			{
				echo "<script>alert('success!!!');</script>";
			}
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Office Bearears</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label"><B>Region</B> </label>
					<select name="region" id="region" class="form-control" onchange="loadAlumni(this.value)">
					<?php
					$qry = "Select * from tblregion";
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
					<label class="control-label"><B>Alumni</B></label>
					<select name="user" id="user" class="form-control">
						<option value='0'>-- Select --</option>
					</select>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Post</B></label>
					<select name="position" id="position" class="form-control">
					<?php
					$qry = "Select * from tblpost";
					$res = mysqli_query($con, $qry);
					echo "<option value='0'>-- Select --</option>";
					while($row = mysqli_fetch_array($res))
					{
						echo "<option value='$row[0]'>$row[1]</option>";
					}
					?>
					</select>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info btn-lg" id="submit" name="submit" value="Click Here to Submit" >
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
 function loadAlumni(locid)
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
							 
							document.getElementById("user").innerHTML=xmlhttp.responseText;
							 
						}
					}
			var getlink = "ajaxsetup.php?locid="+locid;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
 }
 </script>