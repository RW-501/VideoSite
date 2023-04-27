
<?php

	if(isset($_POST['r'])){
			$recv_uIDs = $_POST['r'];
			$uID = $_POST['uID'];

			$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
 
   
		//	$query0 = "SELECT  * FROM MsgTable WHERE msg_receiverID ='0' And msgConvoID = '8888' order by msg_updateDate desc ";
		
			$query2 = "SELECT  * FROM MsgTable Left JOIN UsersInfoTable  on MsgTable.msg_senderID = UsersInfoTable.userID WHERE  MsgTable.msg_receiverID = '$recv_uIDs' and MsgTable.msg_senderID = '$uID' or  MsgTable.msg_receiverID = '$uID' and MsgTable.msg_senderID = '$recv_uIDs' order by MsgTable.msg_updateDate asc limit 1";

			$result2 = mysqli_query($db_conx, $query2);
	$row = mysqli_num_rows($result2);

if($row > 0){
		while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

		$msgConvoID =  $row['msgConvoID'];

}}

		$query0 = "SELECT  * FROM MsgTable Left JOIN UsersInfoTable  on MsgTable.msg_senderID = UsersInfoTable.userID WHERE  MsgTable.msgConvoID = '$msgConvoID' order by MsgTable.msg_updateDate asc limit 50";
$title_header = 'Convo';


$title_header = 'Sender';

   }else{
	if(isset($_POST['c'])){
			$msgConvoID = $_POST['c'];
			$uID = $_POST['uID'];
			
			$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);

			
			
}
			$query0 = "SELECT  * FROM MsgTable Left JOIN UsersInfoTable  on MsgTable.msg_senderID = UsersInfoTable.userID WHERE  MsgTable.msgConvoID = '$msgConvoID' order by MsgTable.msg_updateDate asc limit 50";
$title_header = 'Convo';

   //$query0 = "SELECT  * FROM MsgTable WHERE msgConvoID = '$msgConvoID' order by msg_updateDate desc ";
   }

echo" <h1 style='color:red;text-align:center'>$title_header </h1>  ";
 


// Left JOIN userInfoTable  on CommentsTable.commentSenderID = userInfoTable.userID 
	 
	 
	// echo $query0;

			$result2 = mysqli_query($db_conx, $query0);
	$row = mysqli_num_rows($result2);

if($row > 0){
		while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

		$msgID =  $row['msgID'];
		$msg_updateDate =  $row['msg_updateDate'];
		$msgConvoID =  $row['msgConvoID'];
		$msg_senderID	 =  $row['msg_senderID'];
		$msg_receiverID	 =  $row['msg_receiverID'];
		$msq_text =  $row['msq_text'];
		$msg_read_BOOL =  $row['msg_read_BOOL'];
		
		$msg_Date =  $row['msg_updateDate'];
		$userPhotoPath_msg =  $row['userPhotoPath'];
		$userName =  $row['userName'];
			
$msq_text = preg_replace("/(@\w+)/", "<a href='/user/?u=$0'>$0</a>", $msq_text);

$result = str_replace(' ', '&nbsp;', $msq_text);
$msq_text = nl2br($result);
		//	$msq_text = htmlspecialchars($msq_text);
			//<a href='/user/index.php?u="+xx+"'>@"+uName+"</a>
			
			
			if($uID == $msg_senderID){
			$direction = "rtl";
			}else{
			$direction = "ltr";
			}
			
			
		/*	<div class='c_u_pic_area' onclick="window.location.href='/HoodAwards/user/?u=<?php echo $msg_senderID; ?>'"><img class='user_comment_photo'  src='<?php echo $userPhotoPath_msg; ?>'    ></div>
			*/
			
					$msg_Date = time_elapsed_string($msg_Date);
	?>
					
			<div class='msg_box <?php echo $direction; ?>'>
				
				<div class='c_u_comment_un'  onclick="window.location.href='/HoodAwards/user/?u=<?php echo $msg_senderID; ?>'"><?php echo "$userName"; ?></div>
				<div class='c_u_comment_area'>
					
				
<?php echo $msq_text;   //echo htmlspecialchars($commentMsg); ?>					</div>
			
					<div class='c_u_tool_area'>
					
					<div  class='comment_bt' ><?php echo "$msg_Date"; ?></div>  
				
						<div  class='comment_bt' >|</div>
						
					<div class='comment_bt' id='reply_button' onclick=reply_comment_func("<?php  ?>");>Seen</div>
						<div  class='comment_bt' >|</div>
						
						<div   class='comment_bt'  id='flag_comment_button' onclick='flag_func(<?php echo "$commentID"; ?>);'>delete</div>
					</div>					

				</div>

				
							<?php
		}


}
?>
					