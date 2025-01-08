<?php
include("header.php");
if(isset($_POST['btnadd']))
{
	$region = mysqli_real_escape_string($con,$_POST['region']);
	$q = mysqli_query($con, "select * from tblregion where LOWER(location)=LOWER('".$_POST['region']."')");
	if(mysqli_num_rows($q) >0 )
	{
		echo "<script>alert('Region alredy exist!!!');</script>";
	}
	else
	{
	$qry = "insert into tblregion(location) values ('".$region."')";
	if(mysqli_query($con, $qry))
	{ 
		echo "<script>alert('Region added successfully.!!!');</script>";
	}
	}
}
if(isset($_GET['id']))
{
	$rs = mysqli_query($con, "delete from tblregion where locid=".$_GET['id']);
	if($rs)
	{
		echo "<script>alert('Record Deleted!!!');window.location='region.php';</script>";
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Add Region</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label"><B>Region</B></label>
					<input type="text" class="form-control" id="region" name="region" placeholder="Region" required>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info btn-lg" id="btnadd" name="btnadd" value="Click Here to Submit" >
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
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#featured">View Alumni Regions</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
<table class="table table-bordered" id="dataTables-example">
  <tr>
    <th>#</th>
    <th>Region</th>
    <th>Action</th>
  </tr>
  <?php
  $res = mysqli_query($con, "Select * from tblregion");
  $c = 1;
  while($row = mysqli_fetch_array($res))
  {
	  echo "<tr>
    <td>".$c++."</td>
    <td>".$row[1]."</td>
    <td><a href='region.php?id=$row[0]' class='btn btn-danger' onclick='return val()'>Delete</a></td>
  </tr>";
  }
  /* ### */  ?>
  
</table>
				</div>
			</div>
		</div>
	</div>
</FORM>		<br>		
			</div>

		</div>
	</div>
</div>
<!-- Tab News Start-->
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