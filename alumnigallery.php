<?php
include("header.php");
if(isset($_POST['btnuploadupload']))
{
	$flag = false;
	for($i=0; $i < count(array_filter($_FILES['photo']['name'])); $i++)
	{
		$filename = rand().$_FILES["photo"]["name"][$i];
		move_uploaded_file($_FILES["photo"]["tmp_name"][$i],"gallery/".$filename);
		$glry = "gallery/".$filename;
		$qry = "insert into tblgallery(eventid,photo,gallery_title) values ('".$_POST['event']."','".$glry."','" . $_POST['gallery_title'] . "')";
		$quest = mysqli_query($con, $qry);
		if($quest)
		{
			$flag = true;
		}
	}
	if($flag)
	{
		echo "<script>alert('success!!!');</script>";
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Upload Photos to Gallery</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-6">
					<label class="control-label"><B>Event</B> </label>
						<select name="event" id="event" class="form-control">
						<?php
						  $res = mysqli_query($con, "select * from tblalumnimeet");
						  echo "<option value='0'>--Select -- </option>";
						  while($row = mysqli_fetch_array($res))
						  {
							 echo "<option value='$row[0]'>$row[1]</option>";
						  }
						?>
					  </select>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Gallery Title</B> </label>
					 <input type="text" name="gallery_title" class="form-control" />
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Event</B></label>
					 <input type="file" name="photo[]" class="form-control" />
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info btn-lg" id="btnupload" name="btnuploadupload" value="Click Here to Upload" >
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