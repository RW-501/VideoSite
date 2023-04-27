
 <?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);
   ?>
<style type="text/css" media="all">
	    
body {



}
	
	
#page_container{
	width: 100%;

	height: 100%;
	 margin: 60px auto  auto ;

		min-width: 980px;
  position: absolute;
	left: 0; right: 0; bottom: 0; top: 0;
				margin-top: 60px;

}
	#block{
		    padding: 5%;
    padding-bottom: 25%;
		
	}
.email  a {


    font:bold;

    text-decoration: none;
		color: black;

	}
	
	</style>

<body>
	
	<div id='page_container'>
		<div id='block'>
<?php
$message = "";
$msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
if($msg == "activation_failure"){
	$message = '<h2>Activation Error</h2> Sorry there seems to have been an issue activating your account at this time. We have already notified ourselves of this issue and we will contact you via email when we have identified the issue.';
} else if($msg == "activation_success"){
	$message = "<h1>Activation Success</h1> Your account is now activated.<br><div class='email' style='color:#000000; font-size:20px; margin: auto; margin-top: 25%; width: 400px;  text-align: center;border-style: solid;
	border-radius: 5px;
	border-color: rgba(183,187,191,1.00);  
	background-color:rgba(227,231,232,1.00);
	width:250px;
	height: 75px;
	color: black;
  line-height:130%;
font-size: 50px;
    text-align:center;
	font:bold;
	    text-decoration: none;
    display: block;
    padding: 25%
	border-width: 2px; '> <a href='../Login/index.php'>Login</a></div>";
} else {
	$message = $msg;
}
?>

<div  style='color:white; font-size:20px; margin: auto; margin-top: 25%; width: 400px;  text-align: center; '><?php echo $message; ?></div>

	</div>	
		

	
		</div>
	</body>
	
