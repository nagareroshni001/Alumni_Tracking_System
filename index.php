<?php
include("header.php");
$imgslider = array  
  (  
  array("Alumni Tracking System","imgslider/slider3.jpg"),
  array("Alumni Tracking System","imgslider/slider1.jpeg"),
  array("Alumni Tracking System","imgslider/slider6.jpg"),
  );  
?>
<!-- Top News Start-->
<div class="top-news">
	<div class="container">
		<div class="row">

<div class="col-md-6 tn-left">
	<div class="row tn-slider">
<?php
for($row = 0; $row < count($imgslider); $row++)
{
?>
	<div class="col-md-6">
		<div class="tn-img">
			<img src="<?php echo $imgslider[$row][1]; ?>" style="height: 344px;" />
			<div class="tn-title">
				<a href=""><?php echo $imgslider[$row][0]; ?></a>
			</div>
		</div>
	</div>
<?php
}
?>
	</div>
</div>
<div class="col-md-6 tn-right">
	<div class="row">
	<?php
	$sqlgallery ="SELECT * FROM tblgallery ORDER BY RAND() limit 4";
	$qsqlgallery = mysqli_query($conn,$sqlgallery);
	while($rsgallery = mysqli_fetch_array($qsqlgallery))
	{
	?>
		<div class="col-md-6">
			<div class="tn-img"   style="width: 100%;height: 172px;">
				<img src="<?php echo $rsgallery['photo']; ?>"/>
				<div class="tn-title">
					<a href=""><?php echo $rsgallery['gallery_title']; ?></a>
				</div>
			</div>
		</div>
	<?php
	}
	?>
	</div>
</div>

		</div>
	</div>
</div>
<!-- Top News End-->
        
        <!-- Tab News Start-->
        <div class="tab-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#featured">Welcome to ALUMNI TRACKING SYSTEM</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="featured" class="container tab-pane active">
                                <div class="tn-news">
                                    <div class="tn-title">
                                        <B>Alumni today are the best source of jobs, donation & knowledge capital for you institute, so get them back by signing up for ALUMNI today!</B>
                                    </div>
                                    <div class="tn-title">
                                        Alumni of a college generally stay in touch with their immediate friends but find it hard to stay connected with other college mates. Contact between alumni can be used to forge business connections and to gain references or insight in a new field. Alumni work can consist of alumni mentoring students, organizing alumni days, having training sessions during alumni days for alumni, inviting alumni to give lectures, arranging work practices, and proposing topics of theses, raise funds for the organizations. It is important to carry out a good follow-up marketing of alumni events.
                                    </div>
                                </div>
                            </div>

						</div>
                    </div>

				</div>
            </div>
        </div>
        <!-- Tab News Start-->
		<BR>
        <!-- Tab News Start-->
        <div class="tab-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#featured">Upcoming Event</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="featured" class="container tab-pane active">
<?php							
  $rs = mysqli_query($conn, "select * from tblalumnimeet where status='Active' and event_date >= CURDATE() order by eventid ASC LIMIT 1");
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