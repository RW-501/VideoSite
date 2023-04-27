<meta name="google-signin-client_id" content="813104056774-7ihnudes37sid8adf7l9f0n4sfvutg54.apps.googleusercontent.com">


<style type="text/css" media="all">

<!--

@import url("/HoodAwards/gateway/gateway_element/indexCSS.css");




-->

</style>

<div id='popover_pagecover'>
<div id='gateway_container'>
<div id='gateway_exit'>
<div id='gateway_exit_btn' onclick="closegatewayFunc()">X</div>
</div>
<div id='login_container' class="gateway_containers">




<div class='main_reg_text'>Welcome Back!</div>

			<div class='input_titles'>Username or Email</div>
    <input class="gateway_inputs" type="text" id="email" placeholder="Ex. johndoe@myemail.com" onfocus="emptyElement('status')" maxlength="88">
	  
	  
	  <div class='input_titles'>Password  <helper id='p_helper' onclick='show_hide_password_func()';>Show</helper></div>	  
    <input  class="gateway_inputs" type="password" id="password" placeholder="********" onfocus="emptyElement('status')" maxlength="100">
	  
	  
<div class="lterms"> By Loging In, you agree to the 
			 <a href="../../backend/gateway/Docs/privacypolicy.php">Privacy Policy,   </a> <a href="../../backend/gateway/Docs/terms.php">Terms</a></div>
	  
    <button id="loginbtn" class="gatwaymainbtns" onclick="login()">Login</button> 
	
			<div class='option_text' onclick=gatewayTypeFunc('login_options_container');>or login in with</div>
			<div class="gatwayOptionContainer">
			<div 
  scope="public_profile,email" class="fb-login-button"
  onlogin="checkLoginState();"
				  data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true" data-width="" 
				 >Facebook login</div>
				 <!--


GOOGLE LOGIN


-->	

<div class="g-signin2 google_login" onclick="ClickLogin()" data-onsuccess="onSignIn">Google login</div>


				 
			</div>
			<div class='reg_text' onclick=gatewayTypeFunc('login_options_container');>Don't have an Account? <d>Sign up</d></div>
</div>
<div id='login_options_container' class="gateway_containers">
other Logins coming soon
<div class='reg_text' onclick=gatewayTypeFunc('login_container');>Already have an account? <d>Login</d></div>
<div class='reg_text' onclick=gatewayTypeFunc('signup_container');>Don't have an Account? <d>Sign up</d></div>
</div>
<div id='signup_container' class="gateway_containers">


<div class='main_reg_text'>Create New Account</div>


	

			<div class='input_titles'>Email</div>
		<input  class="gateway_inputs" id="userEmail" placeholder="Ex. johndoe@myemail.com" type="text"  onfocus="emptyElement('status')" onKeyUp="restrict('userEmail')" maxlength="100">

		
			<div class='input_titles'>Username <span id="unamestatus"></span></div>
    <input class="gateway_inputs"  id="userName" type="text" placeholder="Username" onBlur="checkusername()" onKeyUp="restrict('userName')" maxlength="16">
		 
		
		
			<div class='input_titles'>Password </div>
		<input class="gateway_inputs"  id="pass1" placeholder="Password" type="password"  onfocus="emptyElement('status')" maxlength="100">

			<div class='input_titles'>Confirm Password </div>
			<input class="gateway_inputs"  id="pass2" type="password" placeholder="Retype Password" onfocus="emptyElement('status')" maxlength="100">

       			
          <div class="lterms"> By Create Account, you agree to the 
<a href="../../backend/gateway/docs/privacypolicy.php">Privacy Policy,   </a> 
			  <a href="../../backend/gateway/docs/terms.php">Terms</a></div>
			  
				 <button id="signupbtn" class="gatwaymainbtns" onclick="signup()">Create</button>	
				 
			<div class='option_text' onclick=gatewayTypeFunc('signup_options_container');>or login in with</div>
			<div class="gatwayOptionContainer">
			
<div 
  scope="public_profile,email" class="fb-login-button"
  onlogin="checkLoginState();"
				  data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="true" data-width="" 
				 >Facebook login</div>			
<!--


GOOGLE LOGIN


-->			 
				 
<div class="g-signin2 google_login" onclick="ClickLogin()" data-onsuccess="onSignIn">Google login</div>

				 
			</div>
			<div class='reg_text' onclick=gatewayTypeFunc('login_container');>Already have an account? <d>Login</d></div>
</div>
<div id='signup_options_container' class="gateway_containers">
signup_options_container
<div class='reg_text' onclick=gatewayTypeFunc('login_container');>Already have an account? <d>Login</d></div>
<div class='reg_text' onclick=gatewayTypeFunc('signup_container');>Don't have an Account? <d>Sign up</d></div>
</div>
</div>
 		<div id="status"></div>
</div>

<script>



function gatewayTypeFunc(xxx) {
//console.log("output  "+xxx+"     ");
  var i;
  var gateway_containers = document.getElementsByClassName("gateway_containers");
  for (i = 0; i < gateway_containers.length; i++) {
      gateway_containers[i].style.display = "none";  
  }

  $('body').css({'overflow':'hidden'});
  $(document).bind('scroll',function () { 
       window.scrollTo(0,0); 
  });
  _(xxx).style.display = "block"; 
  _('popover_pagecover').style.display = "block";  
}
async function opengatewayFunc() {

gatewayTypeFunc('signup_container');
}
var gatwaytimer;

function closegatewayFunc() {
  _('popover_pagecover').style.display = "none";  
 $(document).unbind('scroll'); 
  $('body').css({'overflow':'visible'});
}

</script>
<script>
		function show_hide_password_func()
	{
var input_type =	_("password");
		
if(input_type.type == 'password'){
	input_type.type = 'text';
	_("p_helper").innerHTML = "Hide";
}else{
	input_type.type = 'password';
	_("p_helper").innerHTML = "Show";

} 
	
	}
		

		
		$('#userEmail').keypress(function(event) {
    if (event.keyCode == 13 || event.which == 13) {
        $('#userName').focus();
        event.preventDefault();
    }
});
		
		
		
		$('#userName').keypress(function(event) {
    if (event.keyCode == 13 || event.which == 13) {
        $('#pass1').focus();
        event.preventDefault();
    }
});
		
		
		
		$('#pass1').keypress(function(event) {
    if (event.keyCode == 13 || event.which == 13) {
        $('#pass2').focus();
        event.preventDefault();
    }
});
		
		
		
		$('#pass2').keypress(function(event) {
    if (event.keyCode == 13 || event.which == 13) {
        $('#signupbtn').focus();
        event.preventDefault();
    }
});
		
		//_________________________________________________-
		
				$('#email').keypress(function(event) {
    if (event.keyCode == 13 || event.which == 13) {
        $('#password').focus();
        event.preventDefault();
    }
});
		
		
		
		$('#password').keypress(function(event) {
    if (event.keyCode == 13 || event.which == 13) {
        $('#loginbtn').focus();
        event.preventDefault();
    }
});
		
		


</script>











<script src="https://apis.google.com/js/platform.js" async defer></script>


<script>
	function _(x){
	return document.getElementById(x);
}

	function ajaxObj( meth, url ) {
	var x = new XMLHttpRequest();
	x.open( meth, url, true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	return x;
}
function ajaxReturn(x){
	if(x.readyState == 4 && x.status == 200){
	    return true;	
	}
}
function restrict(elem){

	var tf = _(elem);
	var rx = new RegExp;
	if(elem == "userEmail"){
		rx = /[' "]/gi;
	} else if(elem == "userName"){
		rx = /[^a-z 0-9]/gi;
	}
	tf.value = tf.value.replace(rx, "");

}
function emptyElement(x){
	_(x).innerHTML = "";

}
	
			var ux; var ex; var p1x; 	var userInfo;

	
	
	
function checkusername(){
	var u = _("userName").value;
	if(u != ""){
		
		_("unamestatus").innerHTML = 'checking ...';
		var ajax = ajaxObj("POST", "/HoodAwards/gateway/Signup/backend/index.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            _("unamestatus").innerHTML = ajax.responseText;
	        }
        }
        ajax.send("usernamecheck="+u);
	}
}
function signup(){
	var u = _("userName").value;
	var e = _("userEmail").value;
	var p1 = _("pass1").value;
	var p2 = _("pass2").value;
	var status = _("status");
	if(u == "" || e == "" || p1 == "" || p2 == ""){
		status.innerHTML = "Fill out all of the form data";
	} else if(p1 != p2){
		status.innerHTML = "Your password fields do not match";
	} else {
		_("signupbtn").style.display = "none";
		status.innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "/HoodAwards/gateway/Signup/backend/index.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
				
	           // status.innerHTML = ajax.responseText;
				
	            if(ajax.responseText = "signup_success"){
					status.innerHTML = ajax.responseText;
					_("signupbtn").style.display = "none";
					
					//window.location = "../user/index.php?u="+u;

					window.scrollTo(0,0);
				_("signup_container").innerHTML = "<div style='color:#000000; font-size:20px; margin: auto; margin-top: 25%; width: 90%;  text-align: center; '>Welcome "+u+", check your email inbox and junk mail box at <u>"+e+"</u> in a moment to complete   your Email verification and activate your account.</p><p>You will not be able to do Sign In until you successfully activate your account. Thanks!</p><p><div id='return_msg'></div></p><p><input type='text' id='c1' autocomplete='off' maxlength='1'><input type='text' id='c2' autocomplete='off'  maxlength='1'><input type='text' id='c3' autocomplete='off'  maxlength='1'><input type='text' id='c4' autocomplete='off'  maxlength='1'></p><p><div id='submit_button' onclick='checkCode()'; >Submit</div></p></div>";
		
					 ux= u;  ex =e ;  p1x = p1;

					
				} else {
						status.innerHTML = "<strong style='color:#F00; text-align: center; '>Something Went Wrong Try Again</strong>";
		}
	        }
        }
        ajax.send("u="+u+"&e="+e+"&p="+p1);
	}
}
	
	
	
	
	
	
var secondPart;

	function checkCode(){

			var c1 = _("c1").value;
			var c2 = _("c2").value;
			var c3 = _("c3").value;
			var c4 = _("c4").value;
		var code;
		code = c1+''+c2+''+c3+''+c4;

		if(code){
		
	//	alert(code+"  code   ");
			
			
		_("return_msg").innerHTML = 'checking ...';
		var ajax = ajaxObj("POST", "/HoodAwards/gateway/Signup/backend/checkCode.php");
        ajax.onreadystatechange = function() {
			
	
	        if(ajaxReturn(ajax) == true) {
				
				
								//	_("return_msg").innerHTML = ajax.responseText;


				var returnT = ajax.responseText;

				var fields = returnT.split('/');
var firstPart = fields[0];
 secondPart = fields[1];
					
firstPart = firstPart.replace(/\s/g, '');
				secondPart = secondPart.replace(/\s/g, '');

			//	alert("u="+ux+'&c='+code+"&e="+ex+'&p='+p1x);

					      if(firstPart == "YES"){					  
		window.location.replace("https://www.blackpeoplemarketplace.com/HoodAwards/gateway/Signup/backend/login.php?u="+secondPart);

				
						  }      
					      if(firstPart == "NO"){
_("return_msg").innerHTML = "Nope, Wrong Code Cap Sensitive";
	        }
			
				
			}
        }
        ajax.send("u="+ux+'&c='+code+"&e="+ex+'&p='+p1x);
		}
}
	
						
	
	function test_func(){
				window.location.replace("https://www.blackpeoplemarketplace.com/HoodAwards/gateway/Signup/backend/login.php?u="+secondPart);
	}
	
	
</script>

	
<script>

	////////////// FACEBOOK LOGIN START


 window.fbAsyncInit = function() {
    FB.init({
      appId      : '776440066284570',
      cookie     : true,
      xfbml      : true,
      version    : 'v12.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


 function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

}














	
	 function statusChangeCallback(response){	
	
	  console.log('response' + response);
	  console.log(response.status);
		
	if(response.status == 'not_authorized'|| response.status == 'unknown'){
		
	//	alert("Please Login to Facebook first");
			
	}
	if(response.status == 'connected'  ){
		


		
		console.log(response.authResponse.userID+"  ex  "+response.authResponse.expiresIn+" dd  "+response.authResponse.signedRequest);
		
		var xxx = response.authResponse.accessToken;
		
			getFbUserData(xxx);

	}
		 
		

		
		
            
	 }
	

	
	
	// Fetch the user profile data from facebook
function getFbUserData(responseX){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture.width(200).height(200)'},
    function (response) {
		var at = responseX

		var ppu = response.picture.data.url;
		var fn = response.first_name;
	
		var ln =	response.last_name;
		var e = response.email;
		var ui = response.id;
		var g = response.gender;
	//	var l = response.link;
	//	var bg = response.CoverPhoto;
		
				 //   console.log('CoverPhoto   ' + bg);

			   /* make the API call */
				$.post("/HoodAwards/gateway/Signup/backend/fbSignup.php",  {ppu:ppu,at:at,ui:ui,fn:fn,ln:ln,e:e}, function(output) {
	  //console.log('output' + output);
var url1 ="https://www.blackpeoplemarketplace.com/HoodAwards/gateway/Signup/backend/login.php?u="+output;
	document.location.href=url1;
 });
    });
}
	
	////////////// google LOGIN START



var clicked=false;//Global Variable
function ClickLogin()
{
    clicked=true;
}

       



function onSignIn(googleUser) {
    if (clicked) {
  var profile = googleUser.getBasicProfile();
  
  
  
 // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  //console.log('Name: ' + profile.getName());
  //console.log('Image URL: ' + profile.getImageUrl());
 // console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
 
 //console.log('google...: ' + profile);
 
  		var ppu = profile.getImageUrl();
		var fn = profile.getName();
		var e = profile.getEmail();
		var i = profile.getId();

			   /* make the API call  */
//,ip:ip,up:up,bt:b

				$.post("/HoodAwards/gateway/Signup/backend/googleSignin.php",  {ppu:ppu,fn:fn,e:e,i:i}, function(output) {
	  //console.log('output' + output);
var url1 ="https://www.blackpeoplemarketplace.com/HoodAwards/gateway/Signup/backend/glogin.php?u="+output;
document.location.href=url1;

    });
	
    }
};


	
	
	
	
	

	function ajaxObj( meth, url ) {
	var x = new XMLHttpRequest();
	x.open( meth, url, true );
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	return x;
}
function ajaxReturn(x){
	if(x.readyState == 4 && x.status == 200){
	    return true;	
	}
}
function emptyElement(x){
	_(x).innerHTML = "";
		var pwf = document.getElementById('password');
	var unf = document.getElementById('email');
									pwf.style.borderColor = "rgba(255,255,255,1.00)";
					unf.style.borderColor = "rgba(255,255,255,1.00)";		
}
function login(){
	var pwf = document.getElementById('password');
	var unf = document.getElementById('email');
	var e = _("email").value;
	var p = _("password").value;
				
	if(e == "" || p == ""){
		_("status").innerHTML = "Fill out all of the form data";
							pwf.style.borderColor = "rgba(255,0,0,0.81)";
					unf.style.borderColor = "rgba(255,0,0,0.81)";
	} else {
		_("loginbtn").style.display = "none";

		_("status").innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "/HoodAwards/gateway/Login/index.php");
        ajax.onreadystatechange = function() {
	
	        if(ajaxReturn(ajax) == true) {
	          var str =  ajax.responseText;
				var l = "loginfailed";
				
				//alert(str);
				var ns = (str.trim());
  //  var ns = ns.replace(" ", "_");

			//alert(ns);
				
			//	console.log(ns);
				
	            if(ns == l){
				//window.location = "index.php";
					_("loginbtn").style.display = "block";
					pwf.style.borderColor = "rgba(255,0,0,0.81)";
					unf.style.borderColor = "rgba(255,0,0,0.81)";
					_("status").innerHTML = "Login unsuccessful, please try again.";

				}else{
								pwf.style.borderColor = "rgba(255,255,255,1.00)";
					unf.style.borderColor = "rgba(255,255,255,1.00)";
					window.location = "/HoodAwards/user/index.php?u="+ns;
			//alert(ns);

						

				
		//_("status").innerHTML = 'Ready...';
				}

						//document.write(s);
				}
	        	

        }
        ajax.send("e="+e+"&p="+p);

	}
}
</script>


<script>
/*
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '776440066284570',
      cookie     : true,
      xfbml      : true,
      version    : 'v12.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

	
	
async function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

}

	
	 function statusChangeCallback(response){	
	
	  console.log('response' + response);
	  console.log(response.status);
		
	if(response.status == 'not_authorized'|| response.status == 'unknown'){
		
		//alert("Please Login to Facebook first");
			
	}
	if(response.status == 'connected'  ){
		


		
		console.log(response.authResponse.userID+"  ex  "+response.authResponse.expiresIn+" dd  "+response.authResponse.signedRequest);
		
		var xxx = response.authResponse.accessToken;
		
			getFbUserData(xxx);

	}
		 
		

		
		
            
	 }
	
	  
	
	// Fetch the user profile data from facebook
function getFbUserData(responseX){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture.width(200).height(200)'},
    function (response) {
		var at = responseX

		var ppu = response.picture.data.url;
		var fn = response.first_name;
	
		var ln =	response.last_name;
		var e = response.email;
		var ui = response.id;
		


					$.post("/HoodAwards/gateway/Signup/backend/fbSignup.php",  {ppu:ppu,at:at,ui:ui,fn:fn,ln:ln,e:e}, function(output) {
						
	  console.log('output' + output);
	var url1 ="https://www.blackpeoplemarketplace.com/HoodAwards/gateway/Signup/backend/login.php?u="+output;
	document.location.href=url1;



});


		
    });
}
	
	
	
	
	
	
	
	
	
	 */
	
	
	
	
	
	
	
	/*
	
			
	
	*/
	
	
	</script>
	
	
	










