<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT  &  ~E_WARNING);
date_default_timezone_set("Asia/Calcutta");
include("dbconnection.php");
if(isset($_GET['student_id']))
{
	$_SESSION['chat1student_id'] = $_GET['student_id'];
}
$sqlstudent = "SELECT tbluser.userid as student_id, `name` as student_name,profilepic FROM `tbluser` LEFT join tblcourse on tbluser.courseid = tblcourse.courseid LEFT join tblalumniphoto on tbluser.userid=tblalumniphoto.userid  WHERE tbluser.userid='$_SESSION[chat1student_id]'";
$qsqlstudent = mysqli_query($con,$sqlstudent);
$rsstudent = mysqli_fetch_array($qsqlstudent);
$stid = $_SESSION['chat1student_id'];
if(isset($_POST['chatsessionid']))
{
	$stid = $_POST['chatsessionid'];
}
?>
<input type="hidden" name="receiver_student_id" id="receiver_student_id" value="<?php echo $stid; ?>" />
<input type="hidden" name="receiver_student_name" id="receiver_student_name" value="<?php echo $rsstudent['student_name']; ?>" />
<?php
$sqlmessage = "SELECT * FROM chat WHERE (student_id1='$_SESSION[student_id]' AND student_id2='$stid') OR (student_id2='$_SESSION[student_id]' AND student_id1='$stid') ";
$qsqlmessage = mysqli_query($con,$sqlmessage);
$rsmessage = mysqli_fetch_array($qsqlmessage);
$countmsg =mysqli_num_rows($qsqlmessage);
$msgid=$rsmessage[0];
$sqlreplymsg = "SELECT chat_message.*,tbluser.userid as student_id,tbluser.name as student_name,tblalumniphoto.profilepic FROM chat_message LEFT JOIN tbluser ON chat_message.student_id=tbluser.userid LEFT JOIN tblalumniphoto on tbluser.userid=tblalumniphoto.userid WHERE chat_message.chat_id='$msgid' ORDER BY chat_message.date,chat_message.time";
$qsqlreplymsg = mysqli_query($con,$sqlreplymsg);
while($rsreplymsg = mysqli_fetch_array($qsqlreplymsg))
{
	if($rsreplymsg['student_id'] != $_SESSION['student_id'])
	{
?>
<div class="incoming_msg">
	<div class="incoming_msg_img"> <img src="<?php
				if($rsreplymsg['profilepic'] == "")
				{
					echo "img/821no-user-image.png";
				}
				else if(file_exists("upload/alumni/" . $rsreplymsg['profilepic']))
				{
					echo "upload/alumni/" . $rsreplymsg['profilepic'];
				}
				else
				{
					echo "img/821no-user-image.png";
				}				
				?>" alt="<?php echo $rsreplymsg['student_name']; ?>"> </div>
	<div class="received_msg">
		<div class="received_withd_msg">
		<p><?php echo $rsreplymsg['message'];?></p>
		<span class="time_date"> <?php echo date("h:i A",strtotime($rsreplymsg['time'])); ?>    |    <?php echo date("d-M-Y",strtotime($rsreplymsg['date'])); ?></span></div>
	</div>
</div>
<?php
	}
	else
	{
?>
<div class="outgoing_msg">
  <div class="sent_msg">
	<p><?php echo $rsreplymsg['message'];?></p>
	<span class="time_date"> <?php echo date("h:i A",strtotime($rsreplymsg['time'])); ?>    |    <?php echo date("d-M-Y",strtotime($rsreplymsg['date'])); ?></span> </div>
</div>	
<?php
	}
}
	/*        
	<div class="chat-box-footer" id="chatmessagefooter1">
	<div class="input-group">
	<input type="text" class="form-control" id="txtchat1" placeholder="Press Enter key to Send.."  onkeyup="submitchat('<?php echo $stid;  ?>','Student',this.value,event)">
	<span class="input-group-btn">
		<button class="btn btn-info" type="button" onClick="submitbtnchat('<?php echo $stid;   ?>','Student',txtchat1.value,event)">SEND</button>
	</span>
	</div>
	</div>
	*/
?>