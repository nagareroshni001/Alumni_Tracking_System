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
						<a class="nav-link active" data-toggle="pill" href="#featured">View  Invested Funds</a>
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
	<th>Utilized For</th>
	<th>Invested Date</th>
	<th>Remarks</th> 
	<th>Amount Invested</th>
  </tr>
</thead>
<tfoot>
            <tr>
                <th colspan="5" style="text-align:right"></th>
                <th></th>
            </tr>
        </tfoot>
 <tbody>

  <?php
  $res = mysqli_query($conn, "Select * from tblfundinterest");
  $c = 1;
  
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   { 
	  
	   $invest=$invest+$row['iamount'];
	   
	    echo "<tr>
		<td>".$c++."</td>
		<td>".$row['investedfor']."</td>	
		<td>".$row['investeddate']."</td>
		<td>".$row['note']."</td>
		<td>".$row['iamount']."</td> 
		</tr>";
	   }
	    $res = mysqli_query($conn, "Select sum(amount) from tblfund");
  $row = mysqli_fetch_array($res);
  $result = $row[0];
	   $bal = $result - $invest;
	   
  }
 
 ?>
    </tbody>
</table>
<h3 style='float:right;padding-right:120px;'>Balance: <?php echo number_format((float)$bal, 2, '.', '');  /* ### */  ?></h3>
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
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script>
/*
$(document).ready(function() {
    $('#dataTables').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
*/
</script>
<script>
$(document).ready(function() {
	
// Setup - add a text input to each footer cell
    $('#dataTables thead tr').clone(true).appendTo( '#dataTables thead' );
    $('#dataTables thead tr:eq(1) th').each( function (i) {
		if(i != 0 && i != 4)
		{
			var title = $(this).text();
			$(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
	 
			$( 'input', this ).on( 'keyup change', function () {
				if ( table.column(i).search() !== this.value ) {
					table
						.column(i)
						.search( this.value )
						.draw();
				}
			} );
		}
    } );
 
    var table = $('#dataTables').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
		dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	
} );
</script>
<script>
function confirmdel()
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