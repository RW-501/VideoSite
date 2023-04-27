// JavaScript Document







function save_video_func(xxx, yyyy){
	$.post("/HoodAwards/Includes/main/save.php",  {u:uID,v:yyyy}, function(output) {
	
		output = output.trim();

	if(output == 'SAVED'){
 _(xxx.id).innerHTML = "<i class='fa fa-bookmark'></i> saved";
 _(xxx.id).style.color = "#fff35d";
}

	if(output == 'Unsave'){
_(xxx.id).innerHTML = "<i class='fa fa-bookmark-o'></i> save";
 _(xxx.id).style.color = "#756f6f";
}
	});

}







function vote_video_func(xxx, yyyy,zzz){
	$.post("/HoodAwards/Includes/main/vote.php",  {u:uID,v:yyyy,type:zzz}, function(output) {
	//console.log("output  "+output);
	
	output = output.trim();

	if(output == 'DOWN'){
xxx.innerHTML = "<i class='fa fa-thumbs-down'></i>";
xxx.style.color = "#ff0000";
}

	if(output == 'UP'){
xxx.innerHTML = "<i class='fa fa-thumbs-up'></i>";
xxx.style.color = "#0400ff";
}
	});
}

function views_video_func(yyyy){
	$.post("/HoodAwards/Includes/main/viewed.php",  {u:uID,v:yyyy}, function(output) {
	//console.log("output  "+output);	
	});
}



var full_bool = "NO";
function fullscreen_video_func(xxx){
var elem = _("cv"+xxx);



if (elem.requestFullscreen) {
  elem.requestFullscreen();
} else if (elem.mozRequestFullScreen) {
  elem.mozRequestFullScreen();
} else if (elem.webkitRequestFullscreen) {
  elem.webkitRequestFullscreen();
} else if (elem.msRequestFullscreen) { 
  elem.msRequestFullscreen();
} else if (full_bool === "NO")  { 
  expandScreenFunc(xxx);
   full_bool = "YES";
}else if (full_bool === "YES")  { 
closeScreenFunc(xxx);
full_bool = "NO";
}


}



function report_video_func(xxx){

if (confirm("Report Video?")) {
$.post("/HoodAwards/Includes/main/report.php",  {u:uID,v:xxx}, function(output) {
//console.log("output  "+output);
var myobj = _("sec"+xxx);
myobj.remove();
	});
} 

}

var vid;
function clicked_video_func(xxx){
vid = _(xxx);
}

function play_video_func(btn, xxx,zzz){
//alert("Report "+xxx);
vid = document.getElementById(xxx);


if(vid.paused){
vid.play();
btn.innerHTML = "<i class='fa fa-pause'></i>";
console.log("Pause");

}else{
vid.pause();
btn.innerHTML = "<i class='fa fa-play'></i>";
console.log("Play");
}


}


function volume_video_func(btn, xxx){

vid = document.getElementById(xxx);


if(vid.muted == true){
vid.muted = false;
btn.innerHTML = "<i class='fa fa-volume-up'></i>";
}else{
vid.muted = true;
btn.innerHTML = "<i class='fa fa-volume-off'></i>";
}
}
  
  
  //For Firefox we have to handle it in JavaScript 
var vids = $("video"); 
$.each(vids, function(){
       this.controls = false; 
}); 
//Loop though all Video tags and set Controls as false

$("video").click(function() {
  if (this.paused){
    this.play();
  } else {
    this.pause();
	    _('pl'+current_Video).innerHTML = "<i class='fa fa-play'></i>";
  }
});

function get_vid_info_Func(xxx){
	current_Video = xxx;
	views_video_func(xxx);
	console.log(current_Video+"      current_Video"); 

	var vid = _('cv'+current_Video);
	if (vid.paused){
    _('pl'+current_Video).innerHTML = "<i class='fa fa-play'></i>";

	}else {
    _('pl'+current_Video).innerHTML = "<i class='fa fa-pause'></i>";

	}
	//	console.log("video id  "+xxx);

}
		
		
		
$(".video_player").click(function() {
  closeBtnsFunc(current_Video);
});

$(".vOverlay").click(function() {
  closeBtnsFunc(current_Video);
});

function closeBtnsFunc(xxx){
	if(xxx){
var x = document.getElementById("sec"+xxx);
var y = x.getElementsByClassName("vOverlay");
var i;
for (i = 0; i < y.length; i++) {
  y[i].style.transitionDuration = "500ms";
  y[i].style.transitionTimingFunction = "ease-in-out";
  y[i].style.opacity  = "1";
}

setTimeout(function(){ 
var x = document.getElementById("sec"+xxx);
var y = x.getElementsByClassName("vOverlay");
var i;
	for (i = 0; i < y.length; i++) {
  
    y[i].style.transitionDuration = "500ms";
    y[i].style.transitionTimingFunction = "ease-in-out";
    y[i].style.opacity  = "0";
	}
}, 2000);
	
	}
	
	}









	function live_func(xxx, yyyy){
	$.post("/HoodAwards/Includes/main/comments.php",  {v:yyyy}, function(output) {
alert("Live Comments coming soon");
	});
	}







/// SHARE AND ADD TO VIDEO SHARE COUNT

		function share_video_func(zzz,yyyy){
		document.querySelectorAll('video').forEach(vid => vid.pause());


var yyyy =decodeURIComponent(yyyy);
//var aaaa =decodeURIComponent(aaa);

	var URL = "https://www.BlackPeopleMarketplace.com/HoodAwards/video/?v=" + zzz;
	
	if (navigator.share) {
  navigator.share({
    title:  "StreetzWatching.com",
    text: yyyy,
    url: URL
  })
  .then(() => count_share_func(zzz))
  .catch(error => console.log('Error sharing:', error));
}

}	
	
	

		function count_share_func(zzz){
	$.post("/HoodAwards/Includes/main/shared.php",  {u:uID,v:zzz}, function(output) {
	//$(xxx).html("Share, again");
	});
	}
	



	function view_video_func(xxx){
	document.querySelectorAll('video').forEach(vid => vid.pause());
	window.location.href = "https://www.BlackPeopleMarketplace.com/HoodAwards/video/?v=" + xxx;

	}
	



	
	
	










main_container = _('feed_container');


async function loadVideosFunc(){
//alert("load ");
console.log("loadVideosFunc  ??");

document.querySelectorAll('video').forEach(vid => vid.pause());
if(!current_Video === null){
    _('pl'+current_Video).innerHTML = "<i class='fa fa-play'></i>";
}

 	$.post("/HoodAwards/Includes/main/videofeed.php",  {u:uIP,i:uID}, function(output) {
	//console.log("output  "+output);
	main_container.innerHTML += output;
	});

}
//loadVideosFunc();


  function percentage(num, bigNum)
{
  return (num/bigNum);
}	// Full height, including the scroll part

window.addEventListener('scroll', ()=> {
//console.log("reeady");
//var elements = document.getElementsByClassName('video_player')[0];
//var id = elements.id;
//_(id).pause();
//console.log("windows   "+window.scrollY );
//console.log("windows2   "+window.innerHeight );
//console.log("document   "+document.documentElement.scrollHeight);
//console.log("main_container   "+main_container.scrollHeight);

//var elements = document.getElementsByClassName('video_player')[0];
//var id = elements.id;
//_(id).pause();

		document.querySelectorAll('video').forEach(vid => vid.pause());

var current_loc = window.scrollY;
		if(current_Video){
    _('pl'+current_Video).innerHTML = "<i class='fa fa-play'></i>";
}

var perc = percentage(main_container.scrollHeight, current_loc);

if(perc <= 1.5){

loadVideosFunc();
}

});






window.addEventListener('scroll', ()=> {

		if(!current_Video === null){
    _('pl'+current_Video).innerHTML = "<i class='fa fa-play'></i>";
}
});
		






















function clicked_video_func(xxx){
var vid = _(xxx);


}



function play_video_func(btn, xxx,zzz){
//alert("Report "+xxx);


var vid = document.getElementById(xxx);


if(vid.paused){
vid.play();
btn.innerHTML = "<i class='fa fa-pause'></i>";
console.log("Pause");

}else{
vid.pause();
btn.innerHTML = "<i class='fa fa-play'></i>";
console.log("Play");

}

}













const slider = document.querySelector('html');


slider.addEventListener('wheel', event => {


    var y = event.deltaY;

//console.log("section  1"+y);

window.scrollBy(0, y);



});







slider.addEventListener('ontouchmove', event => {

y = event.touches[0].clientY;
    var y = event.deltaY;

//console.log(x+"   section   "+y);

window.scrollBy(0, y);



});











/////////////////////////////////////////////////////////////////









/// LAZY LOAD VIDEOS

document.addEventListener("DOMContentLoaded", function() {
  var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

  if ("IntersectionObserver" in window) {
    var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(video) {
        if (video.isIntersecting) {
          for (var source in video.target.children) {
            var videoSource = video.target.children[source];
            if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
              videoSource.src = videoSource.dataset.src;
            }
          }

          video.target.load();
          video.target.classList.remove("lazy");
          lazyVideoObserver.unobserve(video.target);
        }
      });
    });

    lazyVideos.forEach(function(lazyVideo) {
      lazyVideoObserver.observe(lazyVideo);
    });
  }
});











	 function insertAfter(referenceNode, newNode) {	  
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
	
	
}

var newNode2 = document.createElement("span");

 function donationSecFunc() {
  var x, i;
  x = document.querySelectorAll(".c_sec:nth-child(6)");
  
  
  //console.log("output  x" + x[0].id);

if(x.length < 1 ){
	console.log("output  x  " + x.length);
	}else{
  for (i = 0; i < x.length; i++) {
  var secN =  x[i];
	}
 newNode2.innerHTML = "<div class='new_sponsors'  onclick=window.location.href='/HoodAwards/donations/index.php'><div>We Need Donations</div><div> to go <span class='live'>live</span>... </div></div>";
  insertAfter(secN, newNode2);
}
  
}

 donationSecFunc();

//  setTimeout( donationSecFunc ,9000);
	



















///  CHECK FOR VIDEO VOTE

window.onload = (event) => {
//console.log("???????????????  yyyy  ");

let n=0; /* Total number of articles viewed */
let count = document.querySelector('.video_vote_btn');
let observer = new IntersectionObserver((entries, observer) => { 
  entries.forEach(entry => {
    if(entry.isIntersecting){
     // count.textContent= `articles fully viewed - ${++n}`; 
     observer.unobserve(entry.target);
	  
	  var dataAttribute = entry.target.getAttribute('load_v');
var x = eval(dataAttribute);
    }
  });
}, {threshold: 0.6});

document.querySelectorAll('button').forEach(p => { observer.observe(p) });

};	




function check_for_vote(xxx, yyyy ,zzz, aaa, bbb){		
//console.log("  ?/bbb  "+bbb);
//console.log(xxx+"  yyyy  "+yyyy+"  zzz  "+zzz+' aaa '+aaa );
 	$.post("/HoodAwards/Includes/main/check_vote.php",  {cu:yyyy,vi:zzz,v:aaa}, function(output) {
	output = output.trim();
if(output == ''){
 	//console.log(xxx+"  ?/output  "+output);
}
var ccc;
		ccc = bbb;
		if(output == 'DOWN'){
 _(xxx).innerHTML = ccc+" <i class='fa fa-thumbs-down'></i>";
 _(xxx).style.color = "#ff0000";
}

	if(output == 'UP'){
 _(xxx).innerHTML = ccc+" <i class='fa fa-thumbs-up'></i>";
 _(xxx).style.color = "#0400ff";
}
//_(xxx).innerHTML = output;
	});
	
						}




/// CHECK AND SAVE VIDEO TO LIST

window.onload = (event) => {

let n=0; /* Total number of articles viewed */
let count = document.querySelector('.save_vid');
let observer = new IntersectionObserver((entries, observer) => { 
  entries.forEach(entry => {
    if(entry.isIntersecting){
     // count.textContent= `articles fully viewed - ${++n}`; 
     observer.unobserve(entry.target);
	  
	  var dataAttribute = entry.target.getAttribute('load_s');
var x = eval(dataAttribute);
    }
  });
}, {threshold: 0.6});

document.querySelectorAll('button').forEach(p => { observer.observe(p) });

};	

function check_for_save(xxx, yyyy ,zzz){		
//console.log(yyyy+"    ?/bbb  "+zzz);
				
							//console.log(xxx+"  yyyy  eyyyy+"  zzz  "+zzz+' aaa '+aaa );
 	$.post("/HoodAwards/Includes/main/check_save.php",  {cu:yyyy,v:zzz}, function(output) {
	output = output.trim();
console.log(yyyy+"    ?/bbb  "+zzz+"     output  "+output);
	if(output == 'SAVED'){
 _(xxx).innerHTML = "<i class='fa fa-bookmark'></i> saved";
 _(xxx).style.color = "#fff35d";
}

	if(output == 'Unsave'){
 _(xxx).innerHTML = "<i class='fa fa-bookmark-o'></i> save";
 _(xxx).style.color = "#756f6f";
}
//_(xxx).innerHTML = output;
	});
	
						}
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				

				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				