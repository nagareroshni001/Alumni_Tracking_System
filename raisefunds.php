<?php
include("header.php");
if(isset($_POST['btnpaynow']))
{
	$date = date("d/m/y");
	$qry = "insert into tblfund(amount,paiddate,remarks,userid,paytype,bankname, cardno,cvv,exp_month,exp_year) values ('".$_POST['amount']."','".$date."','".$_POST['remarks']."','".$_SESSION["uid"]."','".$_POST['paytype']."','".$_POST['bankname']."','".$_POST['cardno']."','".$_POST['cvv']."','".$_POST['cardexpmonth']."','".$_POST['year']."')";
	if(mysqli_query($con, $qry))
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
						<a class="nav-link active" data-toggle="pill" href="#featured">Raise Funds</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label"><B>Amount</B> </label>
					<input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required>
				</div>
				<div class="col-md-12">
					<label class="control-label"><B>Remarks</B></label>
					<textarea  class="form-control" id="remarks" name="remarks" placeholder="Remarks" required></textarea>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Pay Type</B></label>
<input type="Radio" name="paytype" value="Debitcard" /> Debit Card
        &nbsp;&nbsp;<input type="Radio" name="paytype" value="Creditcard" /> Credit Card<br/>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Bank Name</B></label>
					<input type="text" class="form-control" id="bankname" name="bankname" placeholder="Bank Name" required>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Card No</B></label>
					<input type="text " class="form-control" id="cardno" name="cardno" placeholder="Card No" required onchange="checkcardno(this.value)">
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>CVV</B></label>
					<input type="text " class="form-control" id="cvv" name="cvv" placeholder="CVV" required>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Card Expire Month</B></label>
					<select name="cardexpmonth" id="cardexpmonth" class="form-control">
         <option value='0'>--Select -- </option> 
		 <option value='1'>1</option>
		 <option value='2'>2</option>
		 <option value='3'>3</option>
		 <option value='4'>4</option>
		 <option value='5'>5</option>
		 <option value='6'>6</option>
		 <option value='7'>7</option>
		 <option value='8'>8</option>
		 <option value='9'>9</option>
		 <option value='10'>10</option>
		 <option value='11'>11</option>
		 <option value='12'>12</option>
		 </select>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Card Expire Year</B></label>
					<select name="year" id="year" class="form-control">
         <option value='0'>--Select -- </option>
		 <?php
		 $arr = array("2020","2021","2022","2023","2024","2025","2026","2027","2028","2029","2030");
		 foreach($arr as $val)
		 {
			 echo "<option value='$val'>$val</option>";
		 }
		 ?>
		</select>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info btn-lg" id="btnpaynow" name="btnpaynow" value="PAY NOW" >
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
function checkcardno(cardno)
{
	if(cardno.length != 16)
	{

		alert("Invalid Card Number");
		document.getElementById("cardno").value="";
		document.getElementById("cardno").focus();
	}
}
</script>