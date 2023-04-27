// JavaScript Document





var slideIndex = 1;

//showSlides(slideIndex);


 function plusSlides(n) {
  showSlides(slideIndex += n);
}

 function currentSlide(n) {
  showSlides(slideIndex = n);
}

 function showSlides(n) {
  var ss;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1;}    
  if (n < 1) {slideIndex = slides.length;}
  for (ss = 0; ss < slides.length; ss++) {
      slides[ss].style.display = "none";  
  }

  slides[slideIndex-1].style.display = "block";  
}

var timer = 0;
var timer1 , timer2;

function timerN1() {
timer1 = setTimeout( timerN2 ,10000);
timer += 1;
//console.log("timerN1  "+timer);
switchUpPageFunc();

}


function timerN2() {
timer2 = setTimeout( timerN1 ,10000);
timer += 1 ;
//console.log("timerN2  "+timer);
plusSlides(1);
}
/* stop timers after 2 mins*/
//showSlides(slideIndex);

var sec_count = document.getElementsByTagName("section").length;
 console.log(sec_count+"   sec_count STOPPED???????????? ");
if(sec_count > 3){
timerN2();
 setTimeout(myStopFunction,70000);

}

function myStopFunction() {
  clearTimeout(timer1);
  clearTimeout(timer2);
 // console.log("timerS STOPPED???????????? ");

}


	 function switchUpPageFunc(){
console.log("switchUpPageFunc ???????????? ");
	
	}
	
	
	
	