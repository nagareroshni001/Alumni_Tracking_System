<?php
include("header.php");
if(isset($_POST['btnsend']))
{
	$date = date("d/m/y");
	$qry = "insert into tblcontact(cname,email, subject, cno,message,date) values ('".$_POST['name']."','".$_POST['email']."','".$_POST['subject']."','".$_POST['cno']."','".$_POST['message']."','".$date."')";
	if(mysqli_query($conn, $qry))
	{ 
		echo "<script>alert('Thank you for sending query!!! We will Contact you...');</script>";
	}
}
?>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form method="post" action>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" placeholder="Your Name" name="name" required/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="email" class="form-control" name="email" placeholder="Email ID" required />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" name="cno" placeholder="Contact Number"   required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="subject"  required />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="message" placeholder="Message" required ></textarea>
                                </div>
                                <div><button class="btn" type="submit" name="btnsend">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-info">
                            <h3>Get in Touch</h3>
                            <p>
                                Kindly contact us if you have any queries ..
                            </p>
                            <h4><i class="fa fa-map-marker"></i><?php echo PROADDR; ?></h4>
                            <h4><i class="fa fa-envelope"></i><?php echo PROEMAIL; ?></h4>
                            <h4><i class="fa fa-phone"></i><?php echo PROPHNO; ?></h4>
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
<?php
include("footer.php");
?>