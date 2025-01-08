<?php
include("dbconnection.php");
$sqlver = "SELECT * FROM alumni WHERE reg_no='$_GET[verify_reg_no]' AND pass_yr='$_GET[verify_pass_yr]' AND status='Pending'";
$qsqlver = mysqli_query($con,$sqlver);
if(mysqli_num_rows($qsqlver) == 1)
{
echo "<span style='color: green;'>Account Verified Successfully..</span>";
}
else
{
echo "<span style='color: red;'>Sorry ! You are not allowed to register. Please contact Alumni incharge..</span>";
}
?>