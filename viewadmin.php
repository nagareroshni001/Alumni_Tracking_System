<?php
include("header.php");
if(!isset($_SESSION["type"]))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sqldel = "DELETE  FROM tbladmin WHERE adminid='$_GET[delid]'";
	$qsqldel = mysqli_query($conn,$sqldel);
	echo mysqli_error($conn);
	if(mysqli_affected_rows($conn) == 1)
	{
		echo "<script>alert('Admin record deleted successfully..');</script>";
		echo "<script>window.location='viewadmin.php';</script>";
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
						<a class="nav-link active" data-toggle="pill" href="#featured">View  Admin</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row tablediv">
				<div class="col-md-12">
<table class="table table-bordered" id="dataTables">
		<thead>
  <tr>
    <th>#</th>
    <th>Full Name</th>
    <th>Email ID</th>
    <th>Contact No.</th>
    <th>Action</th>
  </tr>
		</thead>
		<tbody>
  <?php
  $res = mysqli_query($con, "Select * from tbladmin");
  $c = 1;
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	   {  echo "<tr>
		<td>".$c++."</td>
		<td>".$row['fullname']."</td>
		<td>".$row['emailid']."</td>
		<td>".$row['contactno']."</td>
		<td><a href='viewadmin.php?delid=$row[0]' onclick='return confirmdel()' class='btn btn-danger'>Delete</a></td>
		</tr>";
	   }
  }
  else	  
	  {
		  echo "<tr><td colspan='5' style='text-align:center;'>Sorry!! No Records</td></tr>";
	  }
?>
		</tfoot>
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