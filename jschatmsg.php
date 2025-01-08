<?php
session_start();
include("dbconnection.php");
date_default_timezone_set("Asia/Calcutta");
$dttime = date("Y-m-d h:i:s");
$dt= date("Y-m-d");
$tim = date("h:i:s");
if(isset($_POST['chatsessionid']))
{
	$stid = $_POST['chatsessionid'];
}
$sqlmessage = "SELECT * FROM chat WHERE (student_id1='$_SESSION[student_id]' AND student_id2='$stid') OR (student_id2='$_SESSION[student_id]' AND student_id1='$stid') ";
$qsqlmessage = mysqli_query($con,$sqlmessage);
$rsmessage = mysqli_fetch_array($qsqlmessage);
$countmsg =mysqli_num_rows($qsqlmessage);
$msgid=$rsmessage[0];
if($countmsg == 0)
{
	$sql = "INSERT INTO chat(student_id1,student_id2) VALUES('$_SESSION[student_id]','$_SESSION[chat1student_id]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);	
	$msgid = mysqli_insert_id($con);
}
if($_POST['message'] != "")
{
	$msg = mysqli_real_escape_string($con,$_POST['message']);
	$sql = "INSERT INTO chat_message(chat_id,student_id,date,time,message,message_status) VALUES('$msgid','$_SESSION[student_id]','$dt','$tim','$msg','Active')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
}
?>