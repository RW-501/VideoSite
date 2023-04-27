<?php
//include_once("../Includes/db_Conx/index.php");
//include_once("../../db_Conx/index.php");

// Set your timezone!!
date_default_timezone_set('America/Chicago');



if($uName == null){
	$user_ip = getenv('REMOTE_ADDR');
$user_platform    =   $_SERVER['HTTP_USER_AGENT'];

if($user_ip == null){
	
	
}else{
	
	$geoPlugin = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));

	if($geoPlugin == null){
		
		    $ipApi = unserialize(file_get_contents('http://ip-api.com/php/'.$user_ip));

		
$currentRegionCode = $ipApi["region"];
$currentCity = $ipApi["city"];
$currentZipCode = $ipApi["zip"];
$currentLatitude = $ipApi["lat"];
$currentLongitude = $ipApi["lon"];
$currentCountry = $ipApi["country"];
$currentRegionName = $ipApi["regionName"];
$currentISP = $ipApi["isp"];
$currentISpOrg = $ipApi["org"];
$currentISpAS = $ipApi["as"];

		/*
		echo"
$currentRegionCode region<br>
$currentCity  city<br>
$currentZipCode  zip<br>
$currentLatitude lat<br>
$currentLongitude lon<br>
$currentCountry  country<br>
$currentRegionName  regionName<br>
$currentISP  isp<br>
$currentISpOrg  org<br>
$currentISpAS  as<br>
		";*/
			
	}else{
		
		$currentRegionName = $geoPlugin["geoplugin_regionName"];
$currentCity = $geoPlugin["geoplugin_city"];
$currentCountry = $geoPlugin["geoplugin_countryName"];
$currentLatitude = $geoPlugin["geoplugin_latitude"];
$currentLongitude = $geoPlugin["geoplugin_longitude"];
$currentRegionCodeName = $geoPlugin["geoplugin_region"];
$currentRegionCode = $geoPlugin["geoplugin_regionCode"];
$currentAreaCode = $geoPlugin["geoplugin_areaCode"];
$currentDMA = $geoPlugin["geoplugin_dmaCode"];
$currentCountryCode = $geoPlugin["geoplugin_countryCode"];
$currentCurrencySymbol = $geoPlugin["geoplugin_currencySymbol"];
$currentCurrencyCode = $geoPlugin["geoplugin_currencyCode"];
$currentCurrencyConverter = $geoPlugin["geoplugin_currencyConverter"];
$currentCurrencySymbolUTF8 = $geoPlugin["geoplugin_currencySymbol_UTF8"];
		


			    $ipApi = unserialize(file_get_contents('http://ip-api.com/php/'.$user_ip));

		

$currentZipCode = $ipApi["zip"];

	}
	
	
	
			$sql = "SELECT * FROM GeoTable WHERE geoCity='$currentCity' AND geoRegionName='$currentRegionName' LIMIT 1";
$query = mysqli_query($db_conx, $sql);
$numrows = mysqli_num_rows($query);
	
	if($numrows == null ){
			$sql = "INSERT INTO GeoTable
        			(geoRegionName, geoCity, geoCountryName, geoLatitude, geoLongitude,
        			geoRegionCodeName, geoRegionCode, geoAreaCode, geoDmaCode,
        			geoCountryCode, geoCurrencySymbol, geoCurrencyCode, geoCurrencyConverter, geoZipCode, geoCurrencySymbolUTF8 ) VALUES
        			('$currentRegionName','$currentCity','$currentCountry','$currentLatitude','$currentLongitude','$currentRegionCodeName','$currentRegionCode','$currentAreaCode','$currentDMA',
        			'$currentCountryCode', '$currentCurrencySymbol', '$currentCurrencyCode', '$currentCurrencyConverter', '$currentZipCode', '$currentCurrencySymbolUTF8' )";
        			

		
			$query = mysqli_query($db_conx, $sql);
		
	}
	


}

		

}

/*
		echo"
$currentRegionName = geoplugin_regionName<br>
$currentCity =  geoplugin_city<br>
$currentCountry =  geoplugin_countryName<br>
$currentLatitude =  geoplugin_latitude<br>
$currentLongitude =  geoplugin_longitude<br>
$currentRegionCodeName =  geoplugin_region<br>
$currentRegionCode =  geoplugin_regionCode<br>
$currentAreaCode =  geoplugin_areaCode<br>
$currentDMA =  geoplugin_dmaCode<br>
$currentCountryCode =  geoplugin_countryCode<br>
$currentCurrencySymbol =  geoplugin_currencySymbol<br>
$currentCurrencyCode =  geoplugin_currencyCode<br>
$currentCurrencyConverter =  geoplugin_currencyConverter<br>$currentZipCode = zip
";	
	
	*/

// http://thespot.club/geoInfo/get_geo_info.php
   
    ?>
    
	  
