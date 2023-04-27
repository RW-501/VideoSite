
<?php

$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);

$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);
 
	if(isset($_GET['r'])){
			$userID = $_GET['r'];

		$queryU = "SELECT  userName , userPhotoPath , userID FROM  UsersInfoTable  WHERE userID = '$userID'   Limit 1";


   }else{
   
$queryU = "SELECT  * FROM FollowingTable LEFT JOIN UsersInfoTable ON FollowingTable.followingID=UsersInfoTable.userID WHERE
 FollowingTable.userID = '$uID' And FollowingTable.following = 'YES'  Limit 20";
   
   }

 


?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>StreetzWatchin</title>
	
<meta name="description" content="Hood Awards">
	
<meta name="keywords" content="Hood Awards ">

<meta name="Distribution" content="Global" />

<meta name="Rating" content="General" />

<meta name="Robots" content="INDEX,FOLLOW" />

<meta name="Revisit-after" content="1 Day" />

<style type="text/css" media="all">

<!--


@import url("/HoodAwards/messages/indexCSS.css");



-->

</style>

	
</head>

<body>


	

 <div id="page_container">
		
		<div id="left_side_container">		</div>
		
				<div id="center_container">		
			
						<div id='messages_header'>
						<div id='header_scroll'>
						<?php
						
						


			$resultU = mysqli_query($db_conx, $queryU);
	$numrowsU = mysqli_num_rows($resultU);
if($numrowsU > 0){	
		while ($numrowsU = mysqli_fetch_array($resultU, MYSQLI_ASSOC)) {
	 	$uNU = $numrowsU["userName"];
	$uIDU = $numrowsU["userID"];

	$userPhotoPathU = $numrowsU["userPhotoPath"];
	$videocount = $numrowsU["videocount"];
	$followingID = $numrowsU["followingID"];

	//$signup = $numrowsU["userSignupDate"];
	//$lastlogin = $numrowsU["userLastLogin"];

	
	   echo"
	   <div class='box'>
	   <div class='r_name'>$uNU</div>
	   <img class='r_pic' src='$userPhotoPathU' alt='$uNU' onclick=select_user_func('$uIDU','','$uNU') 
	   ondblclick=window.location.href='/HoodAwards/user/index.php?u=$uIDU';>
	   </div>";
		}
}
			
?>

</div>
</div>
												<div id='messages'>
					<div id='msg_header' class="other_headers">
						<div id='msg_title'  onclick="location.href='/HoodAwards/messages'"  class="other_title">Messages</div>
					</div>
			
			
			
			
			
			
		
			<div id='convo_area'>
			<div id='new_convo'><div id='rec_names'></div>  <button id='start_c' onclick="start_msg_func();" >Start</button></div>

<?php
$query11 = "SELECT DISTINCT MsgTable.msgConvoID FROM MsgTable WHERE  MsgTable.msg_receiverID = '$uID' or MsgTable.msg_senderID = '$uID' order by MsgTable.msg_updateDate desc ";
					$result11 = mysqli_query($db_conx, $query11);
	$row11 = mysqli_num_rows($result11);

if($row11 > 0){
		while ($row11 = mysqli_fetch_array($result11, MYSQLI_ASSOC)) {
		$msgConvoID11 =  $row11['msgConvoID'];
		
	$query10 = "SELECT   * FROM MsgTable Left JOIN UsersInfoTable  on MsgTable.msg_senderID = UsersInfoTable.userID or MsgTable.msg_receiverID = UsersInfoTable.userID GROUP BY  MsgTable.msgConvoID = '$msgConvoID11' order by  MsgTable.msg_updateDate  ";

	//	

			$result10 = mysqli_query($db_conx, $query10);
	$row1 = mysqli_num_rows($result10);

if($row1 > 0){
		while ($row1 = mysqli_fetch_array($result10, MYSQLI_ASSOC)) {
$v++;
		$msgID_convo =  $row1['msgID'];
		$msg_updateDate_convo =  $row1['msg_updateDate'];
		$msgConvoID_convo =  $row1['msgConvoID'];
		$msg_senderID_convo	 =  $row1['msg_senderID'];
		$msg_receiverID_convo	 =  $row1['msg_receiverID'];
		$msq_text_convo =  $row1['msq_text'];
		$msg_read_BOOL_convo =  $row1['msg_read_BOOL'];
		
		$msg_Date_convo =  $row1['msg_updateDate'];
		$userPhotoPath_msg_convo =  $row1['userPhotoPath'];
		$userName_convo =  $row1['userName'];
			
$msq_text_convo = preg_replace("/(@\w+)/", "<a href='/user/?u=$0'>$0</a>", $msq_text_convo);
			
			//<a href='/user/index.php?u="+xx+"'>@"+uName+"</a>
			
					$msg_Date_convo = time_elapsed_string($msg_Date_convo);
}
}
?>




<div class='msg_row' onclick='get_convo_func(<?php echo $msgConvoID_convo; ?>)'>
<div class='left_side'>
<div class='convo_names'>
<?php echo "$v .... $msgID_convo    $userName_convo     $msgConvoID_convo"; ?>
</div>
<div class='convo_preview'>
<?php echo $msq_text_convo; ?>
</div>
</div>
<div class='right_side'>
<div class='date_box'><?php echo "$msg_Date_convo <br> $msgConvoID_convo"; ?> </div>
</div>

</div>


<?php


		}
		}


?>





		
				</div>
			
			
						
						






								<div id='message_area'>
								<div id='msg_area'>


				
</div>
					
<div id='msg_input_area'>
	<div id="input_msg"><textarea contenteditable  maxlength="2000" id="msg_input" placeholder="Send a message.."></textarea></div>
	 <button id='msg_user_button' onclick='send_msg_func()'>Send</button></div>
			
			
			
			
				</div>
				</div>
				
				
			








					<span id="scrollupbtn" onclick="scroll_up_Func();">Scroll down</span>






						
						
				
				</div>
				
				
				
				<div id="right_side_container">

				
				
						</div>
				
				
				</div>


		
</body>
<script>
				
					function _(id){ return document.getElementById(id); }

			var uIP = _('uIP').value;

var recv_uIDs;
function select_user_func(xxx, yyyy, zzz){
console.log('Select user  ' +xxx);
convo = '';
recv_uIDs = xxx;
_('rec_names').innerHTML = zzz;
_('new_convo').style.display = 'block';
console.log('r?recv_uIDs?????????/  ' +recv_uIDs);
	$.post("backend/refresh.php",  {r:recv_uIDs,uID:User_ID,c:yyyy}, function(output1) { //alert([output1]);
$("#msg_area").html(output1);

	 var elmnt = _("msg_input");
	  elmnt.scrollIntoView();
});
	
}


function start_msg_func(){

if(recv_uIDs == "" || recv_uIDs == null){
}else{

_('convo_area').style.display = 'none';
_('message_area').style.display = 'block';
}

}

var convo;
function get_convo_func(xxx){
_('convo_area').style.display = 'none';
_('message_area').style.display = 'block';
convo = xxx;
	$.post("backend/refresh.php",  {c:xxx,uID:User_ID}, function(output1) { //alert([output1]);
$("#msg_area").html(output1);

});
		document.getElementById("msg_input").value = '';
			 var elmnt = document.getElementById("msg_input_area");
						  elmnt.scrollIntoView();	

}


			function reply_comment_func(xxxx){

 var elmnt = document.getElementById("msg_input");
  elmnt.scrollIntoView();		

			}	
					
			


		function flag_func(){
					alert("Flag Comment");
					
					}
					
					
			function send_msg_func(){
			
				if(LoggedIn == "YES"){   

	var msg = _("msg_input").value;

	console.log(recv_uIDs+'     rconvo??/  ' +convo);
		$.post("backend/send.php",  {mID:convo,t:msg,s:User_ID,r:recv_uIDs}, function(output1) { //alert([output1]);
	console.log('output1????????????/  ' +output1);
//$("#msg_area").html(output1);	  
});
	
	  			_("msg_input").value = '';

	  
setTimeout(loadmsg, 3000);
	  
	  }else{
	  
	  opengatewayFunc();
		}

			}
						
		
			
function loadmsg(){

console.log('r???loadmsg???????/  ' +recv_uIDs);
select_user_func(recv_uIDs, convo);
 var elmnt = _("msg_input");
	  elmnt.scrollIntoView();

}






$('#input_msg').keypress(function(event) {
    if (event.keyCode == 13 || event.which == 13) {
        $('#msg_user_button').focus();
        event.preventDefault();
    }
});







var currentLocation = window.location;

let url = new URL(currentLocation)
let params = new URLSearchParams(url.search);
let ie = params.has('r') // true
//console.log('r????????????/  ' +ie);
if(ie == true){
let r = params.get('r') // 'chrome-instant'
recv_uIDs = r;
_('convo_area').style.display = 'none';
_('message_area').style.display = 'block';
console.log('rrecv_uIDs????????????/  ' +recv_uIDs);

	$.post("backend/refresh.php",  {r:recv_uIDs,uID:User_ID }, function(output1) { //alert([output1]);
$("#msg_area").html(output1);
		document.getElementById("msg_input").value = '';
			 var elmnt = document.getElementById("msg_input_area");
						  elmnt.scrollIntoView();	
	});



}else{


_('convo_area').style.display = 'block';
_('message_area').style.display = 'none';

}









/*


var mybutton = document.getElementById("scrollupbtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = scrollFunction(event);

function scrollFunction(event) {

console.log('Select user  ' +event);

  if ( document.documentElement.scrollTop > 900 || document.getElementById("msg_title").scrollTop < 300) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}


function scroll_up_Func(){

document.getElementById('msg_input_area').scrollIntoView();


}



*/


		
			





	function share_video_func(){
	
	if (navigator.share) {
  navigator.share({
    title:  "HoodAwards Videos Coming Soon!",
    text: "Need Donations and Sponsorship",
    url: window.location.href
  })
  .then(() => count_share_func())
  .catch(error => console.log('Error sharing:', error));
}
	
	}
	

		function count_share_func(){
		var url = "Donations";
		var output = "Share, again";
			$(xxx).html(output);

console.log('Successful share  ' +url);
		/*
	$.post("/HoodAwards/Includes/main/shared.php",  {u:uIP,v:yyyy}, function(output) {
	$(xxx).html(output);
	});
	*/
	
	
	}



</script>



</html>