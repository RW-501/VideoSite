<?php




// Left JOIN userInfoTable  on CommentsTable.commentSenderID = userInfoTable.userID 
	 
	 
			$query0 = "SELECT * FROM CommentsTable WHERE CommentsTable.commentVideoID ='$videoID' And CommentsTable.commentDeleteBool = 'NO' order by CommentsTable.commentServerDate desc ";
	// echo $query0;

			$result2 = mysqli_query($db_conx, $query0);
	$numrows = mysqli_num_rows($result2);

if($numrows > 0){
		while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {

		$commentID =  $row['commentID'];
		$commentServerDate =  $row['commentServerDate'];
		$commentMsg =  $row['commentMsg'];
		$commentSenderID =  $row['commentSenderID'];
		$commentVideoID	 =  $row['commentVideoID'];
		$commentReplytoUserID =  $row['commentReplytoUserID'];
		$commentDate =  $row['commentDate'];
		$userIDComment =  $row['userID'];
		$unComment =  $row['userName'];
		$userPhotoPathComment =  $row['userPhotoPath'];
			
$commentMsg = preg_replace("/(@\w+)/", "<a href='/user/?u=$0'>$0</a>", $commentMsg);
			
			//<a href='/user/index.php?u="+xx+"'>@"+uName+"</a>
			
			
			
			
					$commentDate = time_elapsed_string($commentDate);
 echo $ccc; ?>

			<div class='comment_box'>
				<div class='c_u_pic_area' onclick="window.location.href='/user/?u=<?php echo $userIDComment; ?>'"><img class='user_comment_photo'   ></div>
				<div class='c_u_comment_body_area'>
				<div class='c_u_comment_area'>
					<div class='c_u_comment_un'  onclick="window.location.href='/user/?u=<?php echo $userIDComment; ?>'"><?php echo "$unComment"; ?></div>
					
<?php echo $commentMsg;   //echo htmlspecialchars($commentMsg); ?>					</div>
			
					<div class='c_u_tool_area'>
					
					<div  class='comment_bt' ><?php echo "$commentDate"; ?></div>  
				
						<div  class='comment_bt' >|</div>
						
					<div class='comment_bt' id='reply_button' onclick=reply_comment_func("<?php echo $commentMsg; ?>");>Reply</div>
						<div  class='comment_bt' >|</div>
						
						<div   class='comment_bt'  id='flag_comment_button' onclick='flag_func(<?php echo "$commentID"; ?>);'>Flag</div>
					</div>					
				</div>				
				</div>

				
							<?php
		}


}
?>
					