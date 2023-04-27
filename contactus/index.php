<style type="text/css" media="all">

<!--


@import url("/HoodAwards/contactus/indexCSS.css");



-->

</style>

	
</head>

<body>
 <?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);
   ?>
 <div id="page_container">
		
		<div id="left_side_container">		</div>
		
				<div id="center_container">		




			<div id='main_title_text'>
				
				<p>We'd love to hear from you. </p>
				<p>Feel free to write any suggestions, feature request or just tell us what
						you think and we'll respond as soon as possible.</p>
			</div>
<div id='main_wrap'>
			<div class='contact_wrap'>
			<div class='input_title'>Name:</div>
			<input type="text" autocomplete="on" id="name" class="contact_input">
			</div>
			<div class='contact_wrap'>
			<div class='input_title'>Email address:</div>
			<input type="text" autocomplete="on" id="email" class="contact_input">
			</div>
			
			<div class='contact_wrap'>
			<div class='input_title'>Subject:</div>
				
<select name="subject" id="subject"  class="contact_input">
  <option value="General Questions">General Question</option>
  <option value="Feedback">Feedback</option>
  <option value="Report Issue">Report Issue</option>
  <option value="Business Inquiry">Business Inquiry</option>
  <option value="Other">Other</option>
</select>				
			</div>
			
						<div class='contact_wrap'>
			<div class='input_title'>Please Rating the website: 5 Star is the best </div>
				
<select name="feedback" id="feedback"  class="contact_input">
  <option value="1">1 Star "Trash" Give up</option>
  <option value="2">2 Star</option>
  <option value="3">3 Star "Improvements"</option>
  <option value="4">4 Star</option>
  <option value="5">5 Star "Perfect" No Changes</option>
</select>				
			</div>
			
			<div class='contact_wrap' id="msg_wrap">
			<div class='input_title'>Message:</div>
				<textarea type="email"  id="contact_msg" class="contact_input"></textarea>
			</div>
			
			
			<div class='contact_wrap'>
			<div id='robot_checker_text'  class='input_title'>Are you Human?</div>
			<input type="checkbox" id="robot_checker" >
			</div>
			
			
			
			<div class='contact_wrap'>
			<div id='send_button'   onclick=send_msg_func();>Send</div>
		
			</div>
			</div>
							<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			
			
<input type="text" autocomplete="on" id="city" value="<?php echo $currentCity; ?>"  hidden="">
<input type="text" autocomplete="on" id="state" value="<?php echo $currentRegionName; ?>"  hidden="">
<input type="text" autocomplete="on" id="zip" value="<?php echo $currentZipCode; ?>"  hidden="">

		






				</div>
				
				
				
				
				<div id="right_side_container">

				
				
						</div>
				
				
				</div>


		
</body>









	<script>
		

		function nav_link_func(xxx){
				

			alert(xxx);
		}
	
	function send_msg_func(){
	var robot_checker =  _("robot_checker").checked ;

		 // if (checkBox.checked == true){

		
if(robot_checker == true){
								//	alert(robot_checker);

	var formdata = new FormData();
	//formdata.append( "u", _("uID").value );

	formdata.append( "name", _("name").value );
	formdata.append( "city", _("city").value );
	formdata.append( "state", _("state").value );
	formdata.append( "zip", _("zip").value );
	formdata.append( "subject", _("subject").value );
	formdata.append( "feedback", _("feedback").value );
	formdata.append( "contact_msg", _("contact_msg").value );
				
	formdata.append( "name", _("name").value );
	formdata.append( "email", _("email").value );





	var ajax = new XMLHttpRequest(); 
				

	ajax.open( "POST", "/HoodAwards/contactus/send_msg.php" );
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			
			
			var response = ajax.responseText;
		 response = response.replace(/\s+/g, '');
			
			//var checkString2;
//checkString2 = checkString.substring(0, 7);
								//alert('response  '+ response);

				//var itemID = checkString.substring(7);
			
			if(response == "success"){
				
		
	_("main_title_text").innerHTML = "<center><h1>Thank You for your Feedback,</h1><br> we are working everyday to make this site better than the day before!<center>";
	
	_('main_wrap').style.display = 'none';
	window.scrollTo(0, 0);
				/*
				 _("subject").value );
	 _("feedback").value 
	 _("contact_msg").value 
				
	_("name").value 
	 _("email").value 
	 */
			} else {

				
				_("main_title_text").innerHTML = ajax.responseText;

			}
		
		}
	}
	ajax.send( formdata );
	
}else{
				
	_("main_title_text").innerHTML = "Humans Only !";

	
}

			//	alert(formdata);
	}
	
		
		
		
		
		
		
	
	
	</script>









<script>
				
					function _(id){ return document.getElementById(id); }

			var uIP = _('uIP').value;





</script>



</html>