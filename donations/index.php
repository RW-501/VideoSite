
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />

<title>StreetzWatchin</title>
	
<meta name="description" content="Hood Awards">
	
<meta name="keywords" content="Hood Awards ">

<meta name="Distribution" content="Global" />

<meta name="Rating" content="General" />

<meta name="Robots" content="INDEX,FOLLOW" />

<meta name="Revisit-after" content="1 Day" />

<style type="text/css" media="all">

<!--


@import url("/HoodAwards/donations/indexCSS.css");



-->

</style>

	
</head>

<body>
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 


?>

	



<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);
   ?>

 <div id="page_container">
		
		<div id="left_side_container">		</div>
		
				<div id="center_container">		
						<div id='text'>
				<h1>Donations</h1>
				<div id='d_container'><form action="https://www.paypal.com/donate" method="post" target="_top">
<input type="hidden" name="hosted_button_id" value="SGJAB57BU4GXA" />
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
</form>
</div>
				<p>Will be used for...					</p>
				<p> Website Domain StreetzWatching.com, </p>
				<p>#1 Place to see what the streetz watching!</p>
				<p>&nbsp; </p>
				<p>Upgrade Web Server Service</p>
				<p>&quot;Basically More Users can be online without website crashing...&quot;</p>
				<p> Dedicated Server</p>
				<p> Dedicated IP Address</p>
				<p> Faster Website more processing power </p>
				<p>Apple Developers account
						to build an iPhone app for site</p>
				<p> To have a Android app made</p>
				<p> Website branding						</p>
				<p>Sponsoring for awards						</p>
				<p>And to keeping the lights on!</p>
				<p>Our Goal Is to Rasie $10,000 to get everything up and going </p>
				<p>Thanks see updates...</p>
				<button id="contactbtn"   onclick="window.location.href='/HoodAwards/contactus/'" >Contact Us</button>
				<button id="contactbtn"   onclick="window.location.href='/HoodAwards/updates/'" >Updates</button>
				<button id="contactbtn"   onclick="share_video_func()" >Share This</button>
				<p>&nbsp;</p>
				<p><em>Admin Ron  </em></p>
				<p>&copy;2021 TechNoob LLC </p>
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
				<p>&nbsp;</p>
						</div>
				
				</div>
				
				
				
				<div id="right_side_container">

				
				
						</div>
				
				
				</div>


		
</body>
<script>
				
					function _(id){ return document.getElementById(id); }

			var uIP = _('uIP').value;


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