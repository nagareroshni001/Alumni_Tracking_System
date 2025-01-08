<?php
include("header.php");
if(isset($_POST["btnApply"]))
{
	$filename = rand().$_FILES["uploadresume"]["name"];
	move_uploaded_file($_FILES["uploadresume"]["tmp_name"],"upload/cv/".$filename);
	$date = date("Y-m-d");
	$qry = "insert into tbljobappln(jobid,candidatename,contactno,emailid,applndate,resumecopy,coverletter) values ('".$_POST['jobid']."','".$_POST['candidatename']."','".$_POST['contactno']."','".$_POST['email']."','$date','".$filename."','".$_POST['coverletter']."')";
	if(mysqli_query($conn, $qry))
	{ 
		echo "<script>alert('Applied successfully!!!');</script>";
	}
}
?>
<style>
/* ===== Career ===== */
.career-form {
  background-color: #4e63d7;
  border-radius: 5px;
  padding: 0 16px;
}

.career-form .form-control {
  background-color: rgba(255, 255, 255, 0.2);
  border: 0;
  padding: 12px 15px;
  color: #fff;
}

.career-form .form-control::-webkit-input-placeholder {
  /* Chrome/Opera/Safari */
  color: #fff;
}

.career-form .form-control::-moz-placeholder {
  /* Firefox 19+ */
  color: #fff;
}

.career-form .form-control:-ms-input-placeholder {
  /* IE 10+ */
  color: #fff;
}

.career-form .form-control:-moz-placeholder {
  /* Firefox 18- */
  color: #fff;
}

.career-form .custom-select {
  background-color: rgba(255, 255, 255, 0.2);
  border: 0;
  padding: 12px 15px;
  color: #fff;
  width: 100%;
  border-radius: 5px;
  text-align: left;
  height: auto;
  background-image: none;
}

.career-form .custom-select:focus {
  -webkit-box-shadow: none;
          box-shadow: none;
}

.career-form .select-container {
  position: relative;
}

.career-form .select-container:before {
  position: absolute;
  right: 15px;
  top: calc(50% - 14px);
  font-size: 18px;
  color: #ffffff;
  content: '\F2F9';
  font-family: "Material-Design-Iconic-Font";
}

.filter-result .job-box {
  -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
          box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
  border-radius: 10px;
  padding: 10px 35px;
}

ul {
  list-style: none; 
}

.list-disk li {
  list-style: none;
  margin-bottom: 12px;
}

.list-disk li:last-child {
  margin-bottom: 0;
}

.job-box .img-holder {
  height: 65px;
  width: 65px;
  background-color: #4e63d7;
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
  background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
  font-family: "Open Sans", sans-serif;
  color: #fff;
  font-size: 22px;
  font-weight: 700;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  border-radius: 65px;
}

.career-title {
  background-color: #4e63d7;
  color: #fff;
  padding: 15px;
  text-align: center;
  border-radius: 10px 10px 0 0;
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
  background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
}

.job-overview {
  -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
          box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
  border-radius: 10px;
}

@media (min-width: 992px) {
  .job-overview {
    position: -webkit-sticky;
    position: sticky;
    top: 70px;
  }
}

.job-overview .job-detail ul {
  margin-bottom: 28px;
}

.job-overview .job-detail ul li {
  opacity: 0.75;
  font-weight: 600;
  margin-bottom: 15px;
}

.job-overview .job-detail ul li i {
  font-size: 20px;
  position: relative;
  top: 1px;
}

.job-overview .overview-bottom,
.job-overview .overview-top {
  padding: 35px;
}

.job-content ul li {
  font-weight: 600;
  opacity: 0.75;
  border-bottom: 1px solid #ccc;
  padding: 10px 5px;
}

@media (min-width: 768px) {
  .job-content ul li {
    border-bottom: 0;
    padding: 0;
  }
}

.job-content ul li i {
  font-size: 20px;
  position: relative;
  top: 1px;
}
</style>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Job List</a></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Single News Start-->
        <div class="single-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sn-container">
                            <div class="sn-content">
							
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />

<div class="container">
 

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="career-search mb-60">
                        <div class="filter-result">
                            <p class="mb-30 ff-montserrat">Total Job Openings : <?php 
$res = mysqli_query($conn, "Select * from tbljob inner join tbluser on tbljob.alumnid=tbluser.userid where tbljob.lastdate >= CURDATE() and  tbljob.status='Active'");
echo mysqli_num_rows($res);  
							?></p>
<?php
$res = mysqli_query($conn, "Select * from tbljob inner join tbluser on tbljob.alumnid=tbluser.userid where tbljob.lastdate >= CURDATE() and  tbljob.status='Active'");
  if(mysqli_num_rows($res) >0)
  {
while($result = mysqli_fetch_array($res))
{
?>
                            <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                                <div class="job-left my-4 d-md-flex align-items-center flex-wrap" >
                                    <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                        <?php echo substr($result['jobtitle'], 0, 2);  ?>
                                    </div>
                                    <div class="job-content">
                                        <h5 class="text-center text-md-left"><?php echo $result['jobtitle'];  ?> <span style="color:blue;font-size: 12px;">Posted By: <?php echo $result['name']; ?></span></h5>
										<p><?php echo $result['jobdescription']; ?></p>
										<p><b>Key Skills:</b> <?php echo $result['keyskils']; /* ### */  ?></p>
                                        <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                            <li class="mr-md-3">
                                                <i class="zmdi zmdi-pin mr-2"></i> <?php echo $result['job_location']; ?>
                                            </li>
                                            <li class="mr-md-3">
                                                <i class="zmdi zmdi-triangle-up mr-2"></i> <?php echo $result['company'];  ?>
                                            </li>
                                            <li class="mr-md-3">
                                                <i class="zmdi zmdi-time mr-2"></i> <?php echo $result['exp_required']; ?> 
                                            </li>
                                            <li class="mr-md-3">
                                                <i class="zmdi zmdi-time mr-2"></i> Rs. <?php echo $result['salary']; ?>/yr
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-right my-4 flex-shrink-0" >
                                    <button onclick="return false;" style="cursor: pointer;" class="btn d-block w-100 d-sm-inline-block btn-light open-EditRow"  href="#myModal" data-toggle="modal" data-id="<?php echo $result[0]; ?>" >Apply now</button>
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
                        </div>
	
				   </div>

				</div>
            </div>
        </div>
        <!-- Single News End--> 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Apply Job</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="fetched-data">
	  
		</div>
      </div>
    </div>
  </div>
</div>	
	
	<?php
	include("footer.php");
	?>
<script>
$('.open-EditRow').click(function(){
$('#myModal').on('show.bs.modal', function (e) {
	var rowid = $(e.relatedTarget).data('id');
	$('.fetched-data').load("jobapply.php?edit_id="+rowid);
 });
});  

</script>