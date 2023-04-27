













	<section id='slideshow_container' class='insert_sec c_sec'>

<div class='mySlides fade '>
  <div class='text'>Wacth New Videos</div>
  <div id='ssv' class='slide_content vidSlide'>
  
  			 					<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/index/slideshow/videos.php";
   include($path);
   
   ?>		
  
 

  
  
  </div>
</div>
<div class='mySlides fade'>
  <div class='text'>Connect With Us</div>
  <div id='ssu' class='slide_content'>
    

  			 					<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/index/slideshow/users.php";
   include($path);
   
   ?>		
  
  </div>
</div>
<div class='mySlides fade'>
  <div class='text'>#HashTag Video and Comments</div>
    <div class='slide_content'>
    <div class='HashTag_content'>
	
	  			 					<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/index/slideshow/hashtags.php";
   include($path);
   
   ?>		
  
	
	</div>
	</div>
	
</div>

<div class='mySlides fade'>
  <div class='text' id="contactusFB"   onclick="window.location.href='/HoodAwards/contactus/'" >Give Us Feedback</div>
</div>
<a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
<a class='next' onclick='plusSlides(1)'>&#10095;</a>      


</section>


