<?php
include("dbconnection.php");
 if(isset($_GET["post"]) || isset($_GET["region"]) || isset($_GET["pyear"]))
  {
	  if($_GET["post"] == "0" && $_GET["region"] != 0 && $_GET["pyear"] == 0)
	  {
		  $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status='Active' and tbluser.location=".$_GET["region"];
	  }
	  else if($_GET["post"] != "" && $_GET["region"] == 0 && $_GET["pyear"] == 0)
	  {
		   $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status='Active' and tbluser.occupation='".$_GET["post"]."'";
	  }
	  else if($_GET["post"] != "0" && $_GET["region"] != 0 && $_GET["pyear"] == 0)
	  {
		   $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status='Active' and tbluser.occupation='".$_GET["post"]."' and tbluser.location=".$_GET["region"];
	  }
	  else if($_GET["post"] == "0" && $_GET["region"] == 0 && $_GET["pyear"] != 0)
	  {
		  $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status='Active' and pyear='".$_GET["pyear"]."'";
	  }
	  else  if($_GET["post"] == "0" && $_GET["region"] != 0 && $_GET["pyear"] != 0)
	  {
		   $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status='Active' and pyear='".$_GET["pyear"]."' and tbluser.location=".$_GET["region"];
	  }
	  else  if($_GET["post"] != "0" && $_GET["region"] == 0 && $_GET["pyear"] != 0)
	  {
		  $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status='Active' and pyear='".$_GET["pyear"]."' and tbluser.occupation='".$_GET["post"]."'";
	  }
	  else  if($_GET["post"] != "0" && $_GET["region"] != 0 && $_GET["pyear"] != 0)
	  {
		  $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status='Active' and pyear='".$_GET["pyear"]."' and tbluser.occupation='".$_GET["post"]."' and tbluser.location=".$_GET["region"];
	  }
	   else
	  {
		   $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status='Active'";
	  }
  }
  else
  {
	 $q = "SELECT tbluser.userid,name,gender,dob,emailid,phone,pyear,occupation,address,tblregion.location,tblalumniphoto.profilepic, tblcourse.coursename FROM tbluser left join `tblalumniphoto` on tbluser.userid=tblalumniphoto.userid inner join tblregion on tbluser.location = tblregion.locid inner join tblcourse on tbluser.courseid=tblcourse.courseid where status='Active'";
  }
  $res = mysqli_query($con, $q);
  echo mysqli_error($con);
  $c = 1;
					while($ks = mysqli_fetch_array($res))
					{
						?>
						<div class="col-md-4">
                                <div class="mn-img"><center>
                            <?php 
							if($ks["profilepic"] != "" || $ks["profilepic"] != NULL)
							{ 
								if(!file_exists("upload/alumni/".$ks['profilepic']))
								{
								echo "<img style='width: 250px;height:300px' src='upload/alumni/noimage.png' >";
								}
								else
								{
								echo "<img  style='width: 250px;height:300px' src='upload/alumni/" . $ks['profilepic'] . "' >";
								}
							}
							else
						    {
								echo "<img src='upload/alumni/noimage.png'  style='250px;height:300px' />"; 								
							}
							?></center><div class="mn-title">
                                        <a href=""><?php echo $ks['name']; ?></a>
                                    </div>
                                </div>
                        </div>
				<?php 
				    }
				?>