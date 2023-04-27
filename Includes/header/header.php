

<style type="text/css" media="all">

<!-- 


@import url("/HoodAwards/Includes/header/headerCSS.css");

@import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");


-->

</style>



<?php
session_start();



// Set your timezone!!
date_default_timezone_set('America/Chicago');
	    $now =date('Y-m-d H:i:s');
	// GET USER IP ADDRESS
//$path = $_SERVER['DOCUMENT_ROOT'];
  // $path .= "/HoodAwards/Includes/plugin_stats/geoInfo/get_geo_info.php";
   //include($path); 	
	?>
	
<!-- CHECK https://cdnjs.com/libraries/plupload FOR LATEST VERSION -->
<!-- OFFICIAL WEBSITE: https://www.plupload.com/
<script src="https://cdnjs.cloudflare.com/ajax/libs/plupload/3.1.2/plupload.full.min.js"></script>
 -->
 
 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<script>



/*

function myFunction() {
  alert ("Hello World!");
}

.style.backgroundColor = "red";

  this.style.backgroundColor = "red";

window.addEventListener('click', (event) => {

xxx.style.color = "#0400ff;";;

 //console.log("event  1"+event);
 //console.log("event  1"+event);
});





*/

/*
window.addEventListener('touchstart ', (event) => {

lighton(event);
});


window.addEventListener('ontouchend', (event) => {

lightoff(event);

});

*/
var oldColor;
window.addEventListener('click', (event) => {
//var oldColor = _(event.target.id).style.backgroundColor;
//console.log("event.target.nodeName   "+event.target.nodeName);

if(event.target.nodeName == 'BUTTON'){
//console.log("target  BUTTON   ");
var nodeBGc = event.target.style.backgroundColor;

if(nodeBGc === null ){
_(event.target.id).style.backgroundColor = "#bfbebe8f";
_(event.target.id).style.transitionDuration = "200ms";
_(event.target.id).style.transitionTimingFunction = "ease-in-out";
setTimeout(function(){ 
_(event.target.id).style.backgroundColor  = "#ffffff00";
}, 200);

}else{
 //console.log("target  start   ");

_(event.target.id).style.backgroundColor = "#bfbebe8f";
_(event.target.id).style.transitionDuration = "200ms";
_(event.target.id).style.transitionTimingFunction = "ease-in-out";
setTimeout(function(){ 
_(event.target.id).style.backgroundColor  = nodeBGc;
// console.log("target  done   ");

}, 200);

}


 }



//console.log("event  click   "+event.target);


});



function moblieDevice(Question){

//var Question;
if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
Question = "YES";
}else{
Question = "NO";

}

return Question;

}
/*

var sss = moblieDevice();

alert("moblieDevice  "+sss + "  dv?   "+(navigator.userAgent));
*/








/*
$(document).ready(function() {
    $('.c_sec').on('touchstart touchend', function(e) {
        e.preventDefault();
        $(this).toggleClass('.vOverlay');
    });
});



function lighton(event) {
  alert(event.target.nodeName+"    lighton       ");

console.log("event  1"+event);
 // document.getElementById('myimage').src = "bulbon.gif";
}
function lightoff(event) {
  alert(event.target.nodeName+"    lightoff       ");

console.log("event  2"+event);
 // document.getElementById('myimage').src = "bulboff.gif";
}

*/







function expandScreenFunc(XXX){

  $('html').css({'overflow':'hidden'});
  $(document).bind('scroll',function () { 
       window.scrollTo(0,0); 
  });
  
  
console.log("XXX  "+XXX);
_("cv"+XXX).style.setProperty('max-height', 'fit-content', 'important');
_("cv"+XXX).style.setProperty('max-width', '100%', 'important');
_("cv"+XXX).style.setProperty('object-fit', 'contain', 'important');
_("cv"+XXX).style.zIndex = '10000';
_("cv"+XXX).style.backgroundColor = 'black';
_("cv"+XXX).style.margin = 'auto';
_("cv"+XXX).style.width = '100%';
_("cv"+XXX).style.height = '100%';
_("cv"+XXX).style.top = '0';
_("cv"+XXX).style.bottom = '0';
_("cv"+XXX).style.position = 'fixed';
_("f"+XXX).innerHTML = "<i class='fa fa-compress'></i>";


var x = document.getElementById("sec"+XXX);
var y = x.getElementsByClassName("vOverlay");
var i;
for (i = 0; i < y.length; i++) {
  y[i].style.zIndex = '10001';
  y[i].style.position = 'fixed';
 //console.log("y[i]  "+y[i].id);

}

}



function closeScreenFunc(XXX){

//console.log("XX???????????????X  "+XXX);


 $(document).unbind('scroll'); 
  $('html').css({'overflow':'visible'});
_("cv"+XXX).removeAttribute('style');

var x = document.getElementById("sec"+XXX);
var y = x.getElementsByClassName("vOverlay");
var i;
for (i = 0; i < y.length; i++) {
	//y[i].removeAttribute('style');
 
  y[i].style.zIndex = '5';
  y[i].style.position = 'absolute';
}
_("f"+XXX).innerHTML = "<i class='fa fa-expand'></i>";

}











	</script>

<?php
/*
//	<script src="https://unpkg.com/peerjs@1.3.1/dist/peerjs.min.js"></script>

	/ <script src='/Includes/plugin_scripts/js/2.1.4-jquery.min.js'></script>
/// main      <meta name='viewport' content='width=device-width, initial-scale=.0001'>
/// 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

/// include_once("../../db_Conx/db_Conx/index.php");

	//<script src='/HoodAwards/backend/js/peerjs.js'>//

/// folder
/// include_once("index.php");
		
		//$path = $_SERVER['DOCUMENT_ROOT'];
  // $path .= "/HoodAwards/Includes/header/header.php";
   //include($path);
  */ 
/*


<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);
   ?>
   */






				function viewTagsFunc($input){

$pattern ="/#\w+/";

if(preg_match_all($pattern, $input, $matches)) {
}
if($matches > 0){
foreach($matches as $x => $x_valuex) {
}
foreach($x_valuex as $yy => $Wordx) {
	$Word = ltrim($Wordx, '#');
$Tag = "<strong class='tags' onclick=window.location.href='/HoodAwards/tag/index.php?tag=$Word'>$Wordx</strong>";
		$videoTitle = str_replace($Wordx, $Tag, $input);		
		$input = $videoTitle;
}
return $input;
}
}


///$videoTitle = viewTagsFunc($videoTitle);


?>


<script>
function _(id){ return document.getElementById(id); }
var LoggedIn;
var User_ID;
</script>
<?php 

 $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/plugin_stats/check_login_status.php";
   include($path);




	if($user_ok == true){
	
$linkUserName = "$uN";

echo"<script> LoggedIn = 'YES'; </script>";
//$linkFunc ="add_video_func()";																																																																																																																																																																																																																																																																	
}else{

$linkUserName = "Login";


}
//'/HoodAwards/live/index.php'>
?>
	 <input id="uIP" value='<?php echo $uIP; ?>' hidden="YES">
	 <input id="uID" value='<?php echo $uID; ?>' hidden="YES">

  <script> User_ID = _('uID').value; </script>
<div id='header'>
					<div id='logo'><span class='websiteName' onclick=window.location.href='/HoodAwards'>Street<lv>z</lv>Watching</span></div>
<!-- Top Navigation Menu 
-->
  <div id='headerRight'>

    <button id='header_user_icon' onclick="loginFunc()"><?php echo $linkUserName; ?></button>

  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <button href="javascript:void(0);" id="header_icon" onclick="userlistFunc()" class="fa fa-bars"></button>
  </div>



</div>

<noscript>
<center>
<div class='alert'>
  <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
  Please Enable Javascript.
</div>
</center>
</noscript> 

<!-- Top Navigation Menu -->
<div id="bottomNav">
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
      <div class='fa fa-upload' onclick="add_video_func()"> Add Video</div>

  	<div class='fa fa-heartbeat' onclick=window.location.href='/HoodAwards/donations/index.php'> Donations</div>
<div class="fa fa-envelope" onclick="check_MSG_func();" > Messages</div>

  	<div class='fa fa-history' onclick=checkloginFunc('/HoodAwards/user_list/watched/index.php') > Watched</div>
  	<div class='fa fa-bookmark' onclick=checkloginFunc('/HoodAwards/user_list/saved/index.php')  > Saved</div>
	<div class='' onclick=window.location.href='/HoodAwards/live/index.php'> <lv>Live</lv></div>
	      <div class='center' onclick="userlistFunc()"> Close</div>

  </div>
  </div>
  
  
	<div id='main_loader'><div id="loader"></div></div>



<script>


function userlistFunc() {
  var x = document.getElementById("bottomNav");


  if (x.style.visibility === "visible") {

		x.style.transitionDuration = "200ms";
	x.style.transitionTimingFunction =  "ease-in-out";
					    x.style.opacity = "0";

	x.style.visibility = "hidden";
  } else {
	
		x.style.transitionDuration = "200ms";
	x.style.transitionTimingFunction =  "ease-in-out";
				    x.style.opacity = "1";
						x.style.visibility = "visible";


  }


}










	var main_loader = document.getElementById("main_loader");

	function loader_func(sec, func){
		main_loader.style.visibility = 'visible';
		 $('body').css({'overflow':'hidden'});
  $(document).bind('scroll',function () { 
       window.scrollTo(0,0); 
  });  
		var the_main = setTimeout(func, sec);						
	}
	// loader_func('3000', 'view_drafts_func');

//echo"User_ID = ".$uIP."; ";


 function loginFunc(){
 		//console.log("LoggedIn  "+LoggedIn);

 		if(LoggedIn == "YES"){
			document.querySelectorAll('video').forEach(vid => vid.pause());
	window.location.href = "/HoodAwards/user/index.php?u="+User_ID;

		}else{
		
			document.querySelectorAll('video').forEach(vid => vid.pause());

 opengatewayFunc();

		
		}
 
 }
 	
 function checkloginFunc(xxx){
 		if(LoggedIn == "YES"){
			document.querySelectorAll('video').forEach(vid => vid.pause());
	window.location.href = xxx;
		}else{
			document.querySelectorAll('video').forEach(vid => vid.pause());
 opengatewayFunc();
		}
 }	
	


function check_MSG_func(){
		if(LoggedIn == "YES"){
					document.querySelectorAll('video').forEach(vid => vid.pause());
	window.location.href = "https://www.BlackPeopleMarketplace.com/HoodAwards/messages/";
			}else{
				loginFunc();
		}

}

	
 	

		 function add_video_func(xxx){
		//console.log("LoggedIn  "+LoggedIn);
		if(LoggedIn == "YES"){
					document.querySelectorAll('video').forEach(vid => vid.pause());
	window.location.href = "https://www.BlackPeopleMarketplace.com/HoodAwards/addvideo/index.php";
			}else{
				loginFunc();
		}
	}
	
	
	
		var uID = document.getElementById("uID");
if(uID){  }else{

gatwaytimer = setTimeout(opengatewayFunc, 80000);
}


/*
function gatewayTypeFunc(xxx) {
//console.log("output  "+xxx+"     ");
console.log("gatewayTypeFunc 2 ");

  var i;
  var gateway_containers = document.getElementsByClassName("gateway_containers");
  for (i = 0; i < gateway_containers.length; i++) {
      gateway_containers[i].style.display = "none";  
  }

  _(xxx).style.display = "block"; 
  _('popover_pagecover').style.display = "block";  
}
async function opengatewayFunc() {
console.log("oopengatewayFunc 1 ");

$.post("/HoodAwards/gateway/gateway_element/index.php",  {}, function(output1) { //alert([output1]);
document.body.innerHTML = output1);
loader_func('3000', gatewayTypeFunc('signup_container'));

});



}
*/

						
</script>


	<?php	
		if($user_ok == false){

	$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/gateway/gateway_element/index.php";
   include($path);
   }
   ?>