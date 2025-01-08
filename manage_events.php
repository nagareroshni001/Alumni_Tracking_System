<?php
include("header.php");
if(isset($_GET['did']))
{
	$rs = mysqli_query($con,"update tblalumnimeet set status='Inactive' where eventid=".$_GET['did']);
	if($rs)
	{
		echo "<script>alert('Record updated successfully...!!');window.location='manage_events.php';</script>";
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
						<a class="nav-link active" data-toggle="pill" href="#featured">View/Manage  Events</a>
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
	  <th>Event Title</th>
    <th>Location</th>
    <th>Event Date</th>
    <th>Time</th>
     <th>Action</th>
   </tr>
    <thead>
    <tbody>
<?php
  $res = mysqli_query($con, "Select * from tblalumnimeet where status='Active'");
  $c = 1;
  if(mysqli_num_rows($res) > 0)
  {
	  while($row = mysqli_fetch_array($res))
	  {
		echo "<tr>
		<td>".$c++."</td>
		<td>".$row['event_name']."</td>
		<td>".$row['loc']."</td>
		<td>".$row['event_date']."</td>
		<td>".$row['event_time']."</td>
		<td><a href='alumnimeet.php?id=$row[0]' class='btn btn-info' >Edit</a>&nbsp;/&nbsp;<a href='manage_events.php?did=$row[0]' class='btn btn-danger' >Delete</a></td>
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
<link rel="stylesheet" type="text/css" href="DataTables-1.10.12/extensions/Buttons/css/buttons.dataTables.css">
 	<link rel="stylesheet" type="text/css" href="DataTables-1.10.12/media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="DataTables-1.10.12/media/js/jquery.dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.js">
	</script>
	<script type="text/javascript" language="javascript" src="Stuk-jszip-6d2b991/dist/jszip.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="pdfmake-master/build/pdfmake.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="pdfmake-master/build/vfs_fonts.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/extensions/Buttons/js/buttons.html5.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/examples/resources/syntax/shCore.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/examples/resources/demo.js">
	</script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable({
		dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
			'pdfHtml5'
        ]
	} );
        });
    </script>