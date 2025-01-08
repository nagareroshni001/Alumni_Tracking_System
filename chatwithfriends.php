<?php
include("header.php");
date_default_timezone_set("Asia/Calcutta");
?>
<style>
.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 480px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 400px;
  overflow-y: auto;
}
</style>
<br>
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#featured">Chat Box - Chat With Friends</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
<!--################################## Chat Box Starts here  #########################-->
<!------ Include the above in your HEAD tag ---------->
<div class="container">
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Feinds List</h4>
            </div>
          </div>
          <div class="inbox_chat">
<?php
$sqlstudentchat ="SELECT tbluser.userid as student_id, `name` as student_name,profilepic, tblcourse.coursename FROM `tbluser` left join tblcourse on tbluser.courseid = tblcourse.courseid left join tblalumniphoto on tbluser.userid=tblalumniphoto.userid WHERE status='Active' AND tbluser.userid != '$_SESSION[student_id]'";
$qsqlstudentchat = mysqli_query($con,$sqlstudentchat);
while($rsstudentchat = mysqli_fetch_array($qsqlstudentchat))
{
?>
            <div class="chat_list" style="cursor: pointer;" onclick="funloadchat(<?php echo $rsstudentchat['student_id']; ?>)">
              <div class="chat_people">
                <div class="chat_img"> <img src="<?php
				if($rsstudentchat['profilepic'] == "")
				{
					echo "img/821no-user-image.png";
				}
				else if(file_exists("upload/alumni/" . $rsstudentchat['profilepic']))
				{
					echo "upload/alumni/" . $rsstudentchat['profilepic'];
				}
				else
				{
					echo "img/821no-user-image.png";
				}				
				?>" alt="<?php echo $rsstudentchat['student_name']; ?>" style="width: 41px;height: 41px;"> </div>
                <div class="chat_ib">
                  <h5><?php echo $rsstudentchat['student_name']; ?> </h5>
                  <p><?php echo $rsstudentchat['coursename']; ?></p>
                </div>
              </div>
            </div>
<?php
}
?>			
          </div>
        </div>
          <div class="headind_srch">
            <div class="recent_heading">
              <b id="divchatstname"></b>
            </div>
          </div>
        <div class="mesgs">
          <div class="msg_history" id="divchatbox">
		  
			
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <textarea name="write_msg" id="write_msg" placeholder="Type a message"  onkeyup="return submitchat(receiver_student_id.value,'Student',this.value,event)" class="form-control write_msg" ></textarea>
            </div>
          </div>
        </div>
      </div>
      
    </div>
	</div>
<!--################################## Chat Box Ends here  #########################-->
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
<br>
<?php
include("footer.php");
?>
<script>
function checkpass(pass)
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
						 
						 if(xmlhttp.responseText.trim() =="error")
						 {
							 alert("invalid current password");
							 document.getElementById("curpass").value="";
							 document.getElementById("curpass").focus();
						 }
					}
				}
		var getlink = "ajaxsetup.php?p="+pass;
        xmlhttp.open("GET",getlink,true);
        xmlhttp.send();
	
}

function isPasswordMatch() {
    var password = document.getElementById("newpass");
   var confirm_password = document.getElementById("retypepass");

    if(password.value != confirm_password.value) 
	{
    confirm_password.setCustomValidity("Passwords Don't Match");
    } 
   else 
   {
    confirm_password.setCustomValidity('');
   }
}
</script>
<script>
function funloadchat(student_id)
{
	var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("divchatbox").innerHTML = this.responseText;
			document.getElementById("divchatstname").innerHTML = "Chat with " + document.getElementById("receiver_student_name").value;
		}
	};
	xmlhttp.open("GET","chatbox1.php?student_id="+student_id,true);
	xmlhttp.send();
}
</script>
<script>
function submitchat(chatsessionid,custtype,message,e)
{
	if(message != "")
	{
		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13) //Enter keycode
		{ 
			var chatsessionid = chatsessionid;
			var txtmessage = message;
			$('#write_msg').val('');
			$.post("jschatmsg.php", { chatsessionid: chatsessionid, custtype: custtype, message: message});
		}
	}
	return false;
}
</script>

<script>
function funloadautochat()
{
	funloadchat(document.getElementById("receiver_student_id").value);
}
setInterval(funloadautochat,2000);
</script>