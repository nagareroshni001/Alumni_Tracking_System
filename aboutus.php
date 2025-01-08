<?php
include("header.php");
?>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="aboutus.php">About Us</a></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Single News Start-->
        <div class="single-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sn-container">
                            <div class="sn-img">
                                <img src="img/alumni-banner.jpg" />
                            </div>
                            <div class="sn-content">
	<h1 class="sn-title">Alumni Tracking System</h1>
	<p>Alumni today are the best source of jobs, donation & knowledge capital for you institute, so get them back by signing up for ALUMNI today!</p>
	<p>Alumni of a college generally stay in touch with their immediate friends but find it hard to stay connected with other college mates. Contact between alumni can be used to forge business connections and to gain references or insight in a new field. Alumni work can consist of alumni mentoring students, organizing alumni days, having training sessions during alumni days for alumni, inviting alumni to give lectures, arranging work practices, and proposing topics of theses, raise funds for the organizations. It is important to carry out a good follow-up marketing of alumni events.</p>
	<p>ALUMNI helps institutes strategically build and manage their alumni network, by facilitating engagement, community-building, networking, communications and giving back. With ALUMNI, your Alumni data can be centralized and combined with a host of exciting front-end member modules and time-saving, back-end administration tools.</p>
                            </div>
                        </div>
					</div>

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2 class="sw-title">In This Gallery</h2>
                                <div class="news-list">
	<?php
	$sqlgallery ="SELECT * FROM tblgallery ORDER BY RAND() limit 4";
	$qsqlgallery = mysqli_query($conn,$sqlgallery);
	while($rsgallery = mysqli_fetch_array($qsqlgallery))
	{
	?>
	<div class="nl-item">
		<div class="nl-img">
			<img src="<?php echo $rsgallery['photo']; ?>" />
		</div>
		<div class="nl-title">
			<a href=""><?php echo $rsgallery['gallery_title']; ?></a>
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
            </div>
        </div>
        <!-- Single News End-->        
<?php
include("footer.php");
?>