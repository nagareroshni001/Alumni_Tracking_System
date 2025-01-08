<?php
include("header.php");
if(!isset($_SESSION["type"]))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submitdata']))
{
	//passyears course selectiondata selrec val
	$selectednamecount= 0;
	$selectedenrollcount= 0;
	$nameid = 0;
	$enrollid=0;
	$slnoarr = $_POST['slnoarr'];
	$arrselectiondata = $_POST['selectiondata'];
	$selrecs = $_POST['selrec'];
	for($p=0;$p<count($_POST['selectiondata']);$p++)
	{
		if($arrselectiondata[$p] == "Name")
		{
			$nameid=$p;
			$selectednamecount = $selectednamecount + 1;
		}
		if($arrselectiondata[$p] == "Enrollment No.")
		{
			$enrollid=$p;
			$selectedenrollcount = $selectedenrollcount + 1;
		}
	}
	if($selectednamecount ==0)
	{
		echo "<script>alert('ERROR: Student Name Column not selected..');</script>";
	}
	else if($selectednamecount > 1)
	{
		echo "<script>alert('ERROR: Name selected  multiple times..');</script>";
	}
	else if($selectedenrollcount == 0)
	{
		echo "<script>alert('ERROR: Enrollment No. Column not selected..');</script>";
	}
	else if($selectedenrollcount > 1)
	{
		echo "<script>alert('ERROR: Enrollment No. selected  multiple times..');</script>";
	}
	else
	{
		$val = $_POST['val'];
		$errdata = "Serial No. ";
		for($q=0;$q<count($_POST['selrec']);$q++)
		{
			//slnoarr[$k]
			$seleqval = $selrecs[$q];
			if($val[$seleqval][$nameid] == "")
			{
				$errdata = $errdata .  $slnoarr[$seleqval] . ", ";
			}
			else if($val[$seleqval][$enrollid] == "")
			{
				$errdata = $errdata .   $slnoarr[$seleqval] . ", ";
			}
			else
			{
			}
		}
		if($errdata == "Serial No. ")
		{
			for($q=0;$q<count($_POST['selrec']);$q++)
			{
				$seleqval = $selrecs[$q];
				$sql = "insert into alumni(name,reg_no,pass_yr,courseid,status) values ('". $val[$seleqval][$nameid] ."','". $val[$seleqval][$enrollid] ."','". $_POST['passyears'] ."','" . $_POST['course'] ."','Pending')";
				$qsql = mysqli_query($con, $sql);
				//echo mysqli_error($con);
				//echo $seleqval . "<br>";
				
			}
			echo "<script>alert('SUCCESS : All data uploaded..');</script>";
			echo "<script>window.location='viewpendingalumniaccount.php';</script>";
		}
		else
		{
			$errdata = rtrim($errdata, ", ");
			echo "<script>alert('ERROR : $errdata has error data. Kindly check and re upload..');</script>";
		}
	}
}
if(isset($_POST['submit']))
{
	$filename= rand() . $_FILES['alumni_file']['name'];
	move_uploaded_file($_FILES['alumni_file']['tmp_name'],"docexcelfile/" . $filename);
	echo "<script>window.location='uploadalumnilist.php?filename=$filename&pass_yr=$_POST[pass_yr]&course=$_POST[courseid]';</script>";
}
?>
<br>
<?php
if(isset($_GET['filename']))
{
?>
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row viewtablediv">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#featured">Excel Records - Confirm Data before uploading to the database | Passout year : <?php echo $_GET['pass_yr']; ?></a>
					</li>
				</ul>
<form action="" method="post" enctype="multipart/form-data"  name="frmform" onsubmit="return validateform()">
<input type="hidden" name="passyears" id="passyears" value="<?php echo $_GET['pass_yr']; ?>" >
<input type="hidden" name="course" id="course" value="<?php echo $_GET['course']; ?>" >
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row tablediv">
				<div class="col-md-12">
<?php
require 'vendor/autoload.php';
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("docexcelfile/".$_GET['filename']);
$worksheet = $spreadsheet->getActiveSheet();
echo '<table class="table table-bordered">' . PHP_EOL;
$i=0;
$k=0;
foreach ($worksheet->getRowIterator() as $row) {
	if($i == 0)
	{
		echo '<tr>' . PHP_EOL;
		echo '<td>SL No.</td><td></td>' . PHP_EOL;
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(FALSE);
		$l=0;
		foreach ($cellIterator as $cell)
		{
			echo "<td> <select name='selectiondata[]' id='selectiondata[]' class='form-control' value='$l'>
			<option value=''>Select</option>";
			if(isset($_POST['submitdata']))
			{
				$arrvl = array("Enrollment No.","Name");
				foreach($arrvl as $vl)
				{
					echo "<option value='$vl' ";				
					if($arrselectiondata[$l] == $vl)
					{
					echo " selected ";
					}
					echo ">$vl</option>";
				}
			}
			else
			{
				echo "<option value='Enrollment No.'>Enrollment No.</option>";
				echo "<option value='Name' >Name</option>";
			}
			echo "</select></td>" . PHP_EOL;
			$l = $l +1;
		} 
		echo '</tr>' . PHP_EOL;
    }
	else
	{
		echo '<tr>' . PHP_EOL;
		echo "<td>";
		echo $slno = $k+1;
		echo "<input type='hidden' name='slnoarr[$k]' id='slnoarr[]' value='" . $slno . "'>";
		echo "</td><td>";
		$chk ="checked";
		if(isset($_POST['submitdata']))
		{
			if(array_search($k,$selrecs) == "")
			{
				$chk = "";
			}
			else
			{
				$chk = "checked";
			}
		}
		echo "<input type='checkbox' name='selrec[]' id='selrec" . $k ."' $chk value='$k'>
		</td>" . PHP_EOL;
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(FALSE);
		$j=0;
		foreach ($cellIterator as $cell)
		{
			echo "<td>";
			echo $cell->getValue();
			echo "<input type='hidden' name='val[" . $k ."][". $j . "]' id='val" . $k . $j . "' value='" . $cell->getValue() .  "'>";
			echo "</td>" . PHP_EOL;
			$j = $j +1;
		}
		echo '</tr>' . PHP_EOL;
	}
	if($i == 0)
	{
	$i=$i + 1;
	}
	else
	{
	$k=$k+1;
	}
}
echo '</table>' . PHP_EOL;
?>
				</div>

			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info btn-lg" name="submitdata" id="submitdata" value="Click Here to Confirm" >
				</div>
			</div>
		</div>
	</div>
</FORM>				
			</div>

		</div>
	</div>
</div>
<!-- Tab News Start-->
<?php
}
else
{
?>
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#featured">Import Alumni Accounts using File uploader</a>
					</li>
				</ul>
<form action="" method="post" enctype="multipart/form-data"  name="frmform" onsubmit="return validateform()">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-6">
					<label class="control-label"><B>Passout year *</B> <span id="lblpass_yr" style="color: red"></span></label>
					<input type="number" class="form-control" id="pass_yr" name="pass_yr" placeholder="Passout year"  min="2001" max="2030" value="<?php echo $rsedit['pass_yr']; ?>" >
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Course</B> <span id="lblcourseid" style="color: red"></span></label>
					<select class="form-control" name="courseid" id="courseid">
					<option value="">Select Course</option>
					<?php
					$sqlcourse = "SELECT * FROM tblcourse";
					$qsqlcourse = mysqli_query($con,$sqlcourse);
					while($rscourse = mysqli_fetch_array($qsqlcourse))
					{
						if($rscourse['courseid'] == $rsedit['courseid'])
						{
							echo "<option value='$rscourse[courseid]' selected>$rscourse[coursename]</option>";
						}
						else
						{
							echo "<option value='$rscourse[courseid]'>$rscourse[coursename]</option>";
						}
					}
					?>
				  </select>
				</div>
				<div class="col-md-6">
					<label class="control-label"><B>Upload File *</B> <span id="lblalumni_file" style="color: red"></span></label>
					<input type="file" class="form-control" id="alumni_file" name="alumni_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >
					
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info btn-lg" name="submit" value="Click Here to Upload Excel File" >
				</div>
			</div>
		</div>
	</div>
</FORM>				
			</div>

		</div>
	</div>
</div>
<!-- Tab News Start-->
<?php
}
?>
<br>
<?php
include("footer.php");
?>
<script type="application/javascript">
function validateform()
{
	var validatecondtion = 0;
	document.getElementById("lblalumni_file").innerHTML ="";
	document.getElementById("lblpass_yr").innerHTML ="";
	if(document.frmform.alumni_file.value=="")
	{
		document.getElementById("lblalumni_file").innerHTML ="<font color='red'>Kindly upload Excel file..</font>";
		validatecondtion=1;
	}
	if(document.frmform.pass_yr.value=="")
	{
		document.getElementById("lblpass_yr").innerHTML ="<font color='red'>Passout Year Should not be empty..</font>";
		validatecondtion=1;
	}
	if(validatecondtion==1)
	{
		return false;
	}
	else
	{
		return true;
	}
}
</script>