<?php
include("header.php");
if(!isset($_SESSION["type"]))
{
echo "<script>window.location='index.php';</script>";
}
?>
<br>

        <!-- Main News Start-->
        <div class="main-news">
            <div class="container">
                <div class="row">
				
				
                    <div class="col-lg-3 table table-bordered">
                        <div class="mn-list">
                            <centeR  class="btn btn-info" style="width: 100%;">Search Friends Circle</center>
                            <hr>
							<form id="f1" method="post">
								      <div class="form-group">
        <label for="inputEmail3" class="col-sm-1 control-label">Occupation</label>
        <div >
         <select name="post" id="post" class="form-control" onchange="loadalumni(post.value,region.value,pyear.value)" >
			<option value="">Select Occupation</option>
			<?php
			$qry = "SELECT DISTINCT occupation FROM `tbluser`";
			$res = mysqli_query($con, $qry);
			echo "<option value='0'>-- All --</option>";
			while($row = mysqli_fetch_array($res))
			{
			   echo "<option value='$row[0]'>$row[0]</option>";
			}
			/* ### */  ?>
			</select>
        </div>
      </div> 
	  <div class="form-group">
        <label for="inputEmail3" class="col-sm-1 control-label">Region</label>
        <div >
         <select name="region" id="region" class="form-control" onchange="loadalumni(post.value,region.value,pyear.value)">
		 <option value="">Select Region</option>
			<?php
			$qry = "Select * from tblregion";
			$res = mysqli_query($con, $qry);
			echo "<option value='0'>--All--</option>";
			while($row = mysqli_fetch_array($res))
			{
				if($locid == $row[0])
				{
					echo "<option value='$row[0]' selected>$row[1]</option>";
				}
				else
				{
					echo "<option value='$row[0]'>$row[1]</option>";
				}
			}
			/* ### */  ?>
			</select>
        </div>
      </div> 
	    <div class="form-group">
        <label for="inputEmail3" class="col-sm-1 control-label">Batch</label>
        <div >
         <input type="number" name="pyear" id="pyear" placeholder="Enter Pass Out Year" onchange="loadalumni(post.value,region.value,pyear.value)" min="1" class="form-control" />
        </div>
      </div>
	  <div class=""></div>
							</form>
                        </div>
                    </div>
				
                    <div class="col-lg-9">
                        <div class="row" id="ajaxoffice"><?php
include("ajaxalumni.php");
?></div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main News End-->

<?php
include("footer.php");
?>
<script>
function loadalumni(post,region,pyear) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("ajaxoffice").innerHTML=xmlhttp.responseText;
    }
  }
  if(pyear == "")
  {
	  pyear  = "0";
  }
  var link = "ajaxalumni.php?post="+post+"&region="+region+"&pyear="+pyear;
  xmlhttp.open("GET",link,true);
  xmlhttp.send();
}
</script>