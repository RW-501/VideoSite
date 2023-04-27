
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


@import url("/HoodAwards/backend/viewusers/indexCSS.css");



-->

</style>

	
</head>

<body>


 <?php
 
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
 
 
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);
   ?>
 <div id="page_container">
		
		<div id="left_side_container">		</div>
		
				<div id="center_container">		




			
				<section id='slideshow_container' class='insert_sec'>

			
			
			
			<?php //WHERE userReal='FAKE' AND userDeleteBOOL is null , userServerUpdateDate desc
	 //$query0 =  "SELECT * FROM videoInfoTable  WHERE videoDeletedBOOL ='NO'  order by videoUploadDate desc, videoViews asc  LIMIT 20"; 

			$query99 = "SELECT * FROM UsersInfoTable WHERE userReal='FAKE' AND userActivated='1' order by userID desc LIMIT 25";


			$result0 = mysqli_query($db_conx, $query99);
	$numrows0 = mysqli_num_rows($result0);
if($numrows0 > 0){
		while ($numrows0 = mysqli_fetch_array($result0, MYSQLI_ASSOC)) {
	 	$uN = $numrows0["userName"];
	$uID = $numrows0["userID"];
	$userBio = $numrows0["userBio"];
	$country = $numrows0["userCountry"];
		$currentState = $numrows0["userRegion"];
	$userPhotoPath = $numrows0["userPhotoPath"];
	$x++;
			
					 echo "	
					 $x
<div class='mySlides fade'>
  <div class='text'>Username: $uN  <div>UserID: <input type='text' value='$uID' id='removeuID' maxlength='10'></div> Notes: <input type='text' value='Review' id='notes$uID' maxlength='20'></div>
  <div id='ssv' class='slide_content'>
					 
					 
					 
					 
					 
					 
					 <div id='f$uID' class='userArea'>
			
			<div class='userInfoArea'>
			<img class='u_photos' src='$userPhotoPath'   alt='$fuN' onclick=window.location.href='/HoodAwards/user/index.php?u=$uID';>
			<div class='userName'>$uN</div>
			<div class='userName'>$currentState</div>
			<div class='userName'>$country</div>

			</div>
			
			<div class='deteteBtnArea'>
						<div class='text'>Bio:<div id='$userIDBio'> $userBio</div></div>

			<button class='deletebtn'  onclick=deleteVideoFunc($uID); >Remove User</button>
			<button class='deletebtn'  onclick=addVideoFunc($uID); >Add User</button>
			<button class='deletebtn'  onclick=sendNoteFunc($uID); >Enter Note</button>
			<button class='deletebtn'  onclick=userRaceFunc($uID); >user urban?</button>
			
			</div>
			
			
			
			</div>
			
			
  
  </div>
</div>

			";
			
				}
}
			
			?>
			
			
			
			


 

  




<a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
<a class='next' onclick='plusSlides(1)'>&#10095;</a>      

</section>




<div id='user_videos'>

<?php

$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/backend/viewusers/get_user_videos.php";
   include($path);
?>

</div>

				
				</div>
				
				
				
				<div id="right_side_container">

				
				
						</div>
				
				
				</div>


		
</body>
<script>
				
					function _(id){ return document.getElementById(id); }



var CuserID; 

var slideIndex = 1;
showSlides(slideIndex);



function plusSlides(n) {

  showSlides(slideIndex += n);
}

function currentSlide(n) {



  showSlides(slideIndex = n);
  

}

function showSlides(n) {

  console.log("slideIndex  "+n);

  if(n > 25){
  
  if (confirm("Refresh?")) {
  
  location.reload();

  
} 
  
  }
var currentID; 
  var ss;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1;}    
  if (n < 1) {slideIndex = slides.length;}
  for (ss = 0; ss < slides.length; ss++) {
      slides[ss].style.display = "none";  
  }
  switchUpPageFunc();
	 currentID = _('removeuID').value;

  slides[slideIndex-1].style.display = "block";  
}






	 function switchUpPageFunc(){

	 currentID = _('removeuID').value;
	 	  console.log("switchUpPageFunc  "+currentID);

	$.post("/HoodAwards/backend/viewusers/get_user_videos.php",  {ID:currentID}, function(output) {

_('user_videos').innerHTML = output;

	});
	
	}


 function deleteVideoFunc(removeuID){
 


 // if (confirm("Are You Sure you Would like to Remove User "+ removeuID+"  ?")) {


	$.post("/HoodAwards/backend/viewusers/remove.php",  {zzzzzzz:removeuID}, function(output) {
//xxx.innerHTML = output;
//console.log("output  "+output);
console.log("output  "+output)
if(output == "DONE"){

plusSlides(1);
}

	});

//}


}







 function userRaceFunc(removeuID){

	$.post("/HoodAwards/backend/viewusers/userRace.php",  {zzzzzzz:removeuID}, function(output) {
//xxx.innerHTML = output;
//console.log("output  "+output);
console.log("output  "+output)


	});

//}


}









 function sendNoteFunc(removeuID){
 
 var id = 'notes'+removeuID;
 //console.log(removeuID+"   xxx 1 "+id +"  ");

 var note = _(id).value;

 // if (confirm("Are You Sure you Would like to Remove User "+ removeuID+"  ?")) {
 //console.log(removeuID+"   xxx 2 "+note +"  ");

	$.post("/HoodAwards/backend/viewusers/update.php",  {zzzzzzz:removeuID,note:note}, function(output) {
//xxx.innerHTML = output;
//console.log("output  "+output);
console.log("output  "+output)
if(output == "DONE"){

plusSlides(1);
}

	});

//}


}

 function addVideoFunc(removeuID){
 


 // if (confirm("Are You Sure you Would like to Add User "+ removeuID+"  ?")) {


	$.post("/HoodAwards/backend/viewusers/add.php",  {zzzzzzz:removeuID}, function(output) {
//xxx.innerHTML = output;
//console.log("output  "+output);
console.log("output  "+output)
if(output == "DONE"){

plusSlides(1);
}

	});

//}


}
</script>



</html>