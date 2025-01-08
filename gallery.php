<?php
include("header.php");
if(isset($_POST['btnsubmit']))
{
	$qry = "insert into tbladmin(fullname,emailid,apassword,contactno) values ('".$_POST['Name']."','".$_POST['Email']."','". md5($_POST['Pass'])."','".$_POST['phone']."')";
	if(mysqli_query($conm, $qry))
	{ 		
	echo "<script>alert('New Admin record Added!!!');</script>";
	}
}
?>
<br>
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row">
        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
					<?php
						  $restblalumnimeet = mysqli_query($conn, "select * from tblalumnimeet");
						  while($rowtblalumnimeet = mysqli_fetch_array($restblalumnimeet))
						  {
						  $restbltblgallery = mysqli_query($conn, "select * from tblgallery WHERE eventid='$rowtblalumnimeet[eventid]'");
						  if(mysqli_num_rows($restbltblgallery) >= 1)
						  {
					?>
                    <div class="col-md-12">
                        <h2><?php echo $rowtblalumnimeet['event_name']; ?></h2>
                        <div class="row cn-slider">
					<?php
						  while($rowtblgallery = mysqli_fetch_array($restbltblgallery))
						  {
					?>
                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="<?php echo $rowtblgallery['photo']; ?>" style="height: 250px;" />
                                    <div class="cn-title">
                                        <a href=""><?php echo $rowtblgallery['gallery_title']; ?></a>
                                    </div>
                                </div>
                            </div>
					<?php
						  }
					?>
                        </div>
                    </div>
					<?php
						  }
						  }
					?>
					
                </div>
            </div>
        </div>
        <!-- Category News End-->
		</div>
	</div>
</div>
<!-- Tab News Start-->
<br>
<?php
include("footer.php");
?>
<script type="text/javascript">
    function Validate()
	{
        var password = document.getElementById("Pass").value;
        var confirmPassword = document.getElementById("Cpass").value;
		
        var month = document.getElementById("cardexpmonth").value;
        var year = document.getElementById("year").value;
    }
</script>
<script>
function checkemail(email)
{
			 if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							 
							if(xmlhttp.responseText == "error")																							
							{
								  document.getElementById("Email").value="";
								  document.getElementById("Email").focus();
								  alert("Email Id already Registred");
							}
							 
						}
					}
			var getlink = "ajaxsetup.php?adminemail="+email;
			xmlhttp.open("GET",getlink,true);
			xmlhttp.send();
}
</script>
<script type="text/javascript">
    function Validate(e) {
        var keyCode = e.keyCode || e.which;
 
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
 
        //Regex for Valid Characters i.e. Alphabets.
        var regex = /^[A-Za-z\s]+$/;
 
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            lblError.innerHTML = "Only Alphabets allowed.";
        }
        return isValid;
    }
</script>