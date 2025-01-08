<?php
include("header.php");
$imgslider = array  
  (  
  array("Alumni Tracking System","imgslider/slider3.jpg"),
  array("Alumni Tracking System","imgslider/slider1.jpeg"),
  array("Alumni Tracking System","imgslider/slider6.jpg"),
  );  
?>
<br>
        
        <!-- Tab News Start-->
        <div class="tab-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#featured">Upcoming Events</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="featured" class="container tab-pane active">
<?php							
  $rs = mysqli_query($conn, "select * from tblalumnimeet where status='Active' and event_date >= CURDATE() order by eventid DESC");
				if(mysqli_num_rows($rs) > 0)
				{
				while($rowd = mysqli_fetch_array($rs))
				{
					$event_date = $rowd['event_date'];
					$parts = explode("-",$event_date);
					$day = $parts[2];
					$dateobj = DateTime::createFromFormat('!m',$parts[1]);
					$month = $dateobj->format('F');
?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <a href=""> &nbsp; <?php echo $day; /* ### */  ?> <?php echo $month; /* ### */  ?></a>
                                    </div>
                                    <div class="tn-title">
                                        <a href="" style="font-weight: 700;"><?php echo $rowd['event_name']; /* ### */  ?></a>
										<p><?php echo $rowd['description']; /* ### */  ?></p>
										<a class="btn btn-info" href="event_info.php?eventid=<?php echo $rowd[0]; /* ### */  ?>">Read More</a>
                                    </div>
                                </div>
<?php
	  }
  }
?>
                            </div>

						</div>
                    </div>

				</div>
            </div>
        </div>
        <!-- Tab News Start-->
<br>

<?php
include("footer.php");
?>