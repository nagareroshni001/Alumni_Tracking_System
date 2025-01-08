<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
date_default_timezone_set("Asia/Calcutta");
include("dbconnection.php");
define("PROTITLE", "Alumni Tracking System");
define("PROADDR", "Indira College of engineering and management ,Pune, Maharashtra, India");
define("PROEMAIL", "rutubhavsar2003@gmail.com");
define("PROPHNO", "+91 7588972732");
define("PRODEVELOPER", "AlumniO");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo PROTITLE; ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="<?php echo PROTITLE; ?>" name="keywords">
        <meta content="<?php echo PROTITLE; ?>" name="description">
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
		<style>
			.viewtablediv
			{
			margin-right: -100px;
			margin-left: -100px;
			}
			.tablediv
			{
			margin-right: -75px;
			margin-left: -75px;
			}
		</style>
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tb-contact">
                            <p><i class="fas fa-envelope"></i><?php echo PROEMAIL; ?></p>
                            <p><i class="fas fa-phone-alt"></i><?php echo PROPHNO; ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tb-menu">
                            <a href="index.php">Index</a>
                            <a href="aboutus.php">About Us</a>
                            <a href="contact.php">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar Start -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-4">
                        <div class="b-logo">
                            <a href="index.php">
                                <img src="logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="b-search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
<?php
if(!isset($_SESSION["type"]))
{
?>
<a href="index.php" class="nav-item nav-link">Home</a>
<a href="aboutus.php" class="nav-item nav-link">About</a>
<a href="event.php" class="nav-item nav-link">Events</a>
<a href="gallery.php" class="nav-item nav-link">Gallery</a>
<a href="login.php" class="nav-item nav-link">Login</a>
<a href="reg.php" class="nav-item nav-link">Alumni Register</a>
<a href="staffreg.php" class="nav-item nav-link">Staff Register</a>
<a href="contact.php" class="nav-item nav-link">Contact</a>
<?php
}
else if(isset($_SESSION["type"]) && $_SESSION['type'] == 'admin')
{
?>
<a href="index.php" class="nav-item nav-link">Home</a>


<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Alumni Data</a>
	<div class="dropdown-menu">
		<a href="newpendingalumni.php" class="dropdown-item">New Alumni</a>
		<a href="uploadalumnilist.php" class="dropdown-item">Upload Alumni List</a>
		<a href="viewpendingalumniaccount.php" class="dropdown-item">View Alumni</a>
		<a href="verify_reg.php" class="dropdown-item">Verify  Alumni</a>
		<a href="verify_staff.php" class="dropdown-item">Verify Staff</a>
	</div>
</div>

		
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Events</a>
	<div class="dropdown-menu">
		<a href="alumnimeet.php" class="dropdown-item">Publish Event</a>
		<a href="manage_events.php" class="dropdown-item">View/Update</a>
	</div>
</div>
			
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Gallery</a>
	<div class="dropdown-menu">
		<a href="alumnigallery.php" class="dropdown-item">Upload Photos</a>
		<a href="gallery.php" class="dropdown-item">View Gallery</a>
	</div>
</div>
					
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Office Bearers</a>
	<div class="dropdown-menu">
		<a href="regionoffice.php" class="dropdown-item">Add Office Bearears</a>
		<a href="alumnioffice.php" class="dropdown-item">View/Update</a>
		<a href="region.php" class="dropdown-item">Add Region</a>
	</div>
</div>
				
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Fund</a>
	<div class="dropdown-menu">
		<a href="viewfund.php" class="dropdown-item">View Collection</a>
		<a href="invest.php" class="dropdown-item">Update Investment</a>
		<a href="viewinvest.php" class="dropdown-item">View Investment</a>
	</div>
</div>
							
						
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Training</a>
	<div class="dropdown-menu">
		<a href="training.php" class="dropdown-item">Schedule Training</a>
		<a href="viewtraining.php" class="dropdown-item">View/Update</a>
	</div>
</div>
									
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Report</a>
	<div class="dropdown-menu">
		<a href="viewalumniaccount.php" class="dropdown-item">Alumni Report</a>
		<a href="viewstaffaccount.php" class="dropdown-item">Staff Report</a>
		<a href="viewenquiries.php" class="dropdown-item">Enquiry Report</a>
		<a href="verifyjob.php" class="dropdown-item">Job Postings</a>
	</div>
</div>
						
				
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Settings</a>
	<div class="dropdown-menu">
		<a href="addadmin.php" class="dropdown-item">New Admin</a>
		<a href="viewadmin.php" class="dropdown-item">View Admin</a>
		<a href="managecourse.php" class="dropdown-item">Manage Course</a>
	</div>
</div>
				
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Account</a>
	<div class="dropdown-menu">
		<a href="changepass.php" class="dropdown-item">Change Password</a>
		<a href="logout.php" class="dropdown-item">Logout</a>
	</div>
</div>
<?php
}
else if(isset($_SESSION["type"]) && $_SESSION['type'] == 'alumni')
{
?>
<a href="index.php" class="nav-item nav-link">Home</a>
<a href="event.php" class="nav-item nav-link">Events</a>
	
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Jobs</a>
	<div class="dropdown-menu">
		<a href="jobposting.php" class="dropdown-item">Post Jobs</a>
		<a href="job.php" class="dropdown-item">View Jobs</a>
	</div>
</div>
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Friends</a>
	<div class="dropdown-menu">
		<a href="search.php" class="dropdown-item">Search Friends</a>
		<a href="chatwithfriends.php" class="dropdown-item">Chat With Friends</a>
	</div>
</div>		
<a href="officesearch.php" class="nav-item nav-link">Office Bearers</a>
<a href="viewtraining.php" class="nav-item nav-link">Training</a>
							
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Fund</a>
	<div class="dropdown-menu">
		<a href="raisefunds.php" class="dropdown-item">Donate Fund</a>
		<a href="viewfund.php" class="dropdown-item">View Donations</a>
		<a href="viewinvest.php" class="dropdown-item">View Utilized</a>
	</div>
</div>						
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Gallery</a>
	<div class="dropdown-menu">
		<a href="gallery.php" class="dropdown-item">View Gallery</a>
		<a href="alumnigallery.php" class="dropdown-item">Update Gallery</a>
	</div>
</div>					
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Account</a>
	<div class="dropdown-menu">
		<a href="alumniprofile.php" class="dropdown-item">Update Profile</a>
		<a href="changepass.php" class="dropdown-item">Change Password</a>
		<a href="logout.php" class="dropdown-item">Logout</a>
	</div>
</div>
<?php
}
else if(isset($_SESSION["type"]) && $_SESSION['type'] == 'staff')
{
?>
<a href="job.php" class="nav-item nav-link">Jobs</a>
<a href="event.php" class="nav-item nav-link">View Events</a>
<a href="officesearch.php" class="nav-item nav-link">Office Bearers</a>
							
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Gallery</a>
	<div class="dropdown-menu">
		<a href="gallery.php" class="dropdown-item">View Gallery</a>
		<a href="alumnigallery.php" class="dropdown-item">Update Gallery</a>
	</div>
</div>							
<div class="nav-item dropdown">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Account</a>
	<div class="dropdown-menu">
		<a href="staffprofile.php" class="dropdown-item">Update Profile</a>
		<a href="changepass.php" class="dropdown-item">Change Password</a>
		<a href="logout.php" class="dropdown-item">Logout</a>
	</div>
</div>	
<?php
}
?>
                        </div>
<?php
if(isset($_SESSION["type"]) && $_SESSION['type'] != 'admin')
{
?>
                        <div class="social ml-auto">
                            <a href="https://www.facebook.com/icem/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://icem.wordpress.com/"><i class="fab fa-wordpress"></i></a>
                            <a href="https://www.linkedin.com/company/icem/?originalSubdomain=in"><i class="fab fa-linkedin"></i></a>
                            <a href="https://www.youtube.com/channel/UC9m-8o7d34-tmIg_a2vuuDQ"><i class="fab fa-youtube"></i></a>
                        </div>
<?php
}
?>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->