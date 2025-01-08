<?php
include("header.php");
if(!isset($_SESSION["type"]))
{
echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$qry = "insert into tblfundinterest(investedfor,note,investeddate,iamount) values ('".$_POST['investedfor']."','".$_POST['note']."','".$_POST['date']."','".$_POST['iamount']."')";
	if(mysqli_query($con, $qry))
	{ 
		echo "<script>alert('success!!!');</script>";
	}
}
$res = mysqli_query($con, "Select sum(amount) from tblfund");
$row = mysqli_fetch_array($res);
$result = $row[0];
$res1 = mysqli_query($con, "Select sum(iamount) from tblfundinterest");
$row1 = mysqli_fetch_array($res1);
$avail = $row1[0];
$Total = $result-$avail;
?>
<br>
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#featured">Fund invested</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
<input type="hidden" value="<?php echo $Total; ?>" name="hdnamt" id="hdnamt"/>
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-6">
					<label class="control-label"><B>Collected Fund Amount (Rs.)</B></label>
					<input type="text" class="form-control" id="camount" name="camount" value="<?php  echo $result;?>" readonly>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Available Amount (Rs.)</B> </label>
					<input type="text" class="form-control" id="availamount" name="availamount" value="<?php echo number_format((float)$Total, 2, '.', ''); ?>"  readonly>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Utilized Amount</B></label>
					<input type="text" class="form-control" id="iamount" name="iamount" placeholder="Utilized Amount" onchange="updateAmt(this.value,hdnamt.value)" required>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Utilized Date</B></label>
					<input type="date" id="date" name="date" placeholder="Date" required class="form-control" max="<?php echo date("Y-m-d"); ?>">
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Utilized For</B></label>
					<input type="text " class="form-control" id="investedfor" name="investedfor" placeholder="Utilized For" required>
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Enter Note</B></label>
					<textarea  class="form-control" id="note" name="note" placeholder="Note" required></textarea>
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