<?php
include("header.php");
$rs = mysqli_query($con, "Select * from tblalumnimeet where eventid=".$_GET['eventid']);
$row = mysqli_fetch_array($rs);
$event_name = $row['event_name'];
$loc = $row['loc'];
$event_date = $row['event_date'];
$event_time = $row['event_time'];
$description = $row['description'];
?>
        <!-- Single News Start-->
        <div class="single-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 table table-bordered">
                        <div class="sn-container">
                            <div class="sn-content">
	<h1 class="sn-title"><?php echo $event_name; ?></h1>
	<p><?php echo $description; ?></p>
	<p><b>Event Date:</b> <?php echo $event_date; ?> | <b>Event Time:</b> <?php echo $event_time; ?></p>
	<p><b>Event Location:</b> <?php echo $loc; ?></p>
                            </div>
                        </div>
					</div>

			   </div>
            </div>
        </div>
        <!-- Single News End-->        
<?php
include("footer.php");
?>