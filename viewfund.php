<?php
include("header.php");
if(!isset($_SESSION["type"]))
{
	echo "<script>window.location='index.php';</script>";
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
						<a class="nav-link active" data-toggle="pill" href="#featured">View  Funds</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row tablediv">
				<div class="col-md-12">
<table class="table table-bordered" id="dataTables-example">
	<thead>
  <tr>
    <th>#</th>
    <th>Alumni Name</th>
	<th>Payment Date</th>
    <th>Payment Type</th>
    <th>Bank Name</th>  
	<th>Remarks</th>
    <th>Paid Amount</th>
  </tr>
</thead>
<tfoot>
            <tr>
                <th colspan="7" style="text-align:right"></th>
            </tr>
        </tfoot>
 <tbody>

  <?php
  $res = mysqli_query($conn, "Select * from tblfund inner join tbluser on tblfund.userid=tbluser.userid order by fundid desc");
  $c = 1;
  $tot=0;
  
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   { 
	   $tot = $tot + $row['amount'];
	   
	    echo "<tr>
		<td>".$c++."</td>
		<td>".$row['name']."</td>
		<td>".$row['paiddate']."</td>
		<td>".$row[5]."</td>
		<td>".$row['bankname']."</td>
		<td>".$row['remarks']."</td>
		<td>".$row['amount']."</td>	 
		</tr>";
	   }
	   
	   
  }
?>
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