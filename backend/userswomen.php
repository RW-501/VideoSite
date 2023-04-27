<?php


//$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   


$z = 51;
while($z <= 199) {

// 17 34 51 78 102 119 136 153 170 187 200

//https://www.blackpeoplemarketplace.com/HoodAwards/backend/users.php
//https://randomuser.me/api/portraits/men/79.jpg

$ranNum = substr( md5(rand()), 0, 5);

//$pathx = $_SERVER['DOCUMENT_ROOT'];
   $pathx .= "/HoodAwards/user/users/pics/$x$ranNum.jpg";


$url =  "https://randomuser.me/api/portraits/women/$z.jpg";
file_put_contents($pathx, file_get_contents($url));
$photoUrl  = "https://www.BlackPeopleMarketplace.com/HoodAwards/user/users/pics/$x$ranNum.jpg";



$a=array("Thotiana","Crystal","Meagan","LaKisha","Olivia","Patricia","Barbara","Jennifer","Susan","Patricia","Elizabeth","Charlotte","Emma","Sophia","Amelia","Mia","Mary");
$random_keys=array_rand($a,16);

$x = rand(0,16);
$u= $a[$random_keys[$x]];
$gender= "F";

$b=array("Illinois","Florida","Connecticut","Arizona","Texas","Pennsylvania","Florida","Washington","New York","Texas","Arkansas","Nevada","Arizona","California","Mississippi","Louisiana ","Arkansas");
$random_keys2=array_rand($b,17);

$x = rand(0,17);
$currentRegionName=  $b[$random_keys2[$x]];
//$currentCity= "";

 $ranNum = str_pad($p_hash,  1, "0",STR_PAD_LEFT);           

	$userBio = "StreetzWatchin.com Check out my videos";
	$e= "$u@StreetzWatchin.com";

$userPasscode= $ranNum."321321";
		
		//$userNameNum =  substr($f_name,0,4);
		// $userName = $userNameNum.$newRanNum;
			
	  // $u= $userName;
			
		$sql1 = "INSERT INTO UsersInfoTable (userName, userEmail, userPhotoPath, userFB_aToken, userIPaddress, userSignupDate, userLastLogin, userNotesCheck, userState, userCity, userBrowserType, userGender, userLastName, userFirstName, userFB_expiresIn, userPasscode,userFBverified,userFB_ID,userEmailVerified,userActivated,userRegion,userBio,userReal,userCountry )       
  VALUES('$u','$e','$photoUrl','$accessToken','$ip',now(),now(),now(),'$currentRegionName', '$currentCity','$browserType','$gender','$l_name','$f_name','$expiresIn','$fuID','YES','$fuID','YES','1','$currentRegionName','$userBio','FAKE','United States')";
		$query1 = mysqli_query($db_conx, $sql1); 
		$id = mysqli_insert_id($db_conx);
		
		//echo $sql1;
   
	if($query1){

		
		echo $sql1;

}













  echo "The number is: $url $x <br>";
  $z++;
}






?>