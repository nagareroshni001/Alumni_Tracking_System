<?php
include("header.php");
if(isset($_POST['submit']))
{
	$qry = "insert into tblalumnimeet(event_name,loc,event_date,event_time,description,status) values ('".$_POST['eventname']."','".$_POST['location']."','".$_POST['eventdate']."','".$_POST['eventtime']."','".$_POST['description']."','".$_POST['status']."')";
	if(mysqli_query($con, $qry))
	{
		echo "<script>alert('Event Published successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
if(isset($_POST['update']))
{
	$rs = mysqli_query($con,"update tblalumnimeet set event_name='".$_POST['eventname']."',loc='".$_POST['location']."',event_date='".$_POST['eventdate']."',event_time='".$_POST['eventtime']."',description='".$_POST['description']."',status='".$_POST['status']."'	where eventid='".$_POST['arid']."'");
	if($rs)
	{
		echo "<script>alert('Event record updated successfully...!!');</script>";
		echo "<script>window.location='manage_events.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
if(isset($_GET['id']))
{
	$rs = mysqli_query($con, "Select * from tblalumnimeet where eventid=".$_GET['id']);
	$row = mysqli_fetch_array($rs);
	$eventid = $row['eventid'];
	$event_name = $row['event_name'];
	$loc = $row['loc'];
	$event_date = $row['event_date'];
	$event_time = $row['event_time'];
	$description = $row['description'];
	$status = $row['status'];
	
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Events About Alumni Meet</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
<input type="hidden" value="<?php echo $eventid; /* ### */  ?>" name="arid"/>
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label"><B>Event Title</B></label>
					<input type="text" class="form-control" id="eventname" name="eventname" placeholder="Title" required value="<?php echo $event_name; /* ### */  ?>" >
				</div>
				<div class="col-md-4">
					<label class="control-label"><B>Location</B></label>
					<input type="text" class="form-control" id="location" name="location" placeholder="Location" required value="<?php echo $loc; ?>" >
				</div>
				<div class="col-md-4">
					<label class="control-label"><B>Event Date</B></label>
					<input type="date" class="form-control" id="eventdate" name="eventdate" required value="<?php echo $event_date; ?>" onchange="validateDate(this.value)">
				</div>
				<div class="col-md-4">
					<label class="control-label"><B>Event Time</B></label>
					<input type="time" class="form-control" id="eventtime" name="eventtime" required value="<?php echo $event_time; ?>">
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Description</B></label>
					<textarea class="form-control" id="description" name="description" placeholder="Description" required ><?php echo $description;/* ### */  ?></textarea>
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Status</B></label>
					<select name="status" id="status" class="form-control">
					   <option value="Active" <?php if($status == 'Active') echo "selected"; /* ### */  ?> >Active</option>
						<option value="Inactive" <?php if($status == 'Inactive') echo "selected"; /* ### */  ?> >Inactive</option>
					   </select>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
        <?php
		if(isset($_GET['id']))
		{
		?>
         <input type="submit" class="btn btn-info btn-lg" name="update" value="Click Here to UPDATE">
         <?php
		}
		else
		{
		 ?>
          <input type="submit" class="btn btn-info btn-lg" name="submit" value="Click Here to SUBMIT">
         <?php
          }
         ?>
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