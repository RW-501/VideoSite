<?php 

  // 	echo "cheeeee 111111111111111111";

$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 

if(isset($_POST["filename"])   ){
	$videoTitle  = $_POST['videoTitle'];
	$filenameX  = $_POST['filename'];
	$fileSize  = $_POST['fileSize'];
	$username  = $_POST['username'];
	
	$public  = $_POST['public'];
	$SFW  = $_POST['SFW'];
	$IP  = $_POST['IP'];
	$ID  = $_POST['ID'];
	
	$NSFW = clean_Input($db_conx,$NSFW);
	$public = clean_Input($db_conx,$public);

	$videoTitle = clean_Input($db_conx,$videoTitle);
	$username = clean_Input($db_conx,$username);
	//$filenameX = clean_Input($db_conx,$filenameX);
	$IP = clean_Input($db_conx,$IP);
	$userID = clean_Input($db_conx,$ID);
	
				$fileNameB = basename($filenameX);
			$fileName = preg_replace('/\s+/', '_', $filenameX);

$FileExtension = pathinfo($filenameX, PATHINFO_EXTENSION);
			
			
						$fileName = preg_replace('/\s+/', '_', $filenameX);

$FileExtension = pathinfo($filenameX, PATHINFO_EXTENSION);
			
			
			$path_parts = pathinfo($filenameX);
				$fileNameB = $userID. "_" . $path_parts['filename'];
			$catagoyID = "1111";
			
			

/*
			echo"1 $FileExtension   2 $fileNameB     3 $FileExtension    4 $fileName 5 $filenameX";

			  $newUserID = str_pad("$userID",  3, "0",STR_PAD_LEFT);           
		$newFileName = substr( md5(rand()), 0, 6);
		  $newFileName  .= $newUserID;
		  $newFileName = str_pad($newFileName, 10, $newFileName, STR_PAD_LEFT); 
	
$pathX = $_SERVER['DOCUMENT_ROOT'];
  $old = $pathX .= "/HoodAwards/Videos/$filenameX";
  $new = $pathX .= "/HoodAwards/Videos/$newFileName.$FileExtension";
	
 	rename($old, $new);
*/

		$sql = "SELECT * FROM videoInfoTable WHERE videoFileName = $fileNameB  LIMIT 1";
				$query = mysqli_query($db_conx, $sql);
	$f_check = mysqli_num_rows($query);
			//	echo($sql);

if($f_check < 1){
	
	echo "cheeeee ";
	
$filenameX = $userID."_".$filenameX;
	
		$tNpathfile = $_SERVER['DOCUMENT_ROOT'];
   $tNpathfile .= "/HoodAwards/Videos/TN/TN$fileNameB.png";
		
		$pathfile = $_SERVER['DOCUMENT_ROOT'];

   $pathfile .= "/HoodAwards/Videos/$filenameX";
		


			$tNpathDB = "https://www.BlackPeopleMarketplace.com/HoodAwards/Videos/TN/TN$fileNameB.png";

			$mMpathDB = "https://www.BlackPeopleMarketplace.com/HoodAwards/Videos/$filenameX";

$fileSize= str_replace(".","","$fileSize");	
	$sqlX = "INSERT INTO videoInfoTable (userName, userIP,videoUserID, videoCategoryID, videoPath,
	 videoFileExtension, videoFileName , videoDeletedBOOL , videoTNpath, videoFileSize, videoTitle, SFW_bool, publicbool ) VALUES
       ('$username' ,'$IP' ,'$userID' ,'$catagoyID' ,'$mMpathDB' ,'$FileExtension' ,'$fileNameB','NO','$tNpathDB', '$fileSize', '$videoTitle', '$SFW','$public' )";

			$queryX = mysqli_query($db_conx, $sqlX);
		if($queryX){
		echo "success";
		
		
			$dataURL  = $_POST["dataURL"];
	
$dataURL =  substr($dataURL,strpos($dataURL,",")+1);

$encodedData = str_replace(' ','+',$dataURL);
$decodedData = base64_decode($encodedData);

// Path where the image is going to be saved
$filePath = $tNpathfile;
// Write $imgData into the image file
$fileZ = fopen($filePath, 'w');
fwrite($fileZ, $decodedData);
fclose($fileZ);



/*

		$tNpathfile = $_SERVER['DOCUMENT_ROOT'];
   $tNpathfile .= "/HoodAwards/Videos/TN/TN$newFileName.png";
   
   			  $save =  $tNpathfile;
			  $file = $pathfileP;


          //thumbnail image making part
       //   $save = "images/thumb/" . $imagepath; //This is the new file you saving
         // $file = "images/" . $imagepath; //This is the original file   
          list($width, $height) = getimagesize($file) ;
          $modwidth = 150;
          $diff = $width / $modwidth;
          $modheight = $height / $diff;
          $tn = imagecreatetruecolor($modwidth, $modheight) ;
		
		$image = imageCreateFromAny($file);
      //    $image = imagecreatefromjpeg($file) ;
          imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;
      //  echo "Thumbnail: <img src='images/sml_".$imagepath."'>";
          imagejpeg($tn, $save, 100) ;
			*/

	} else {
        echo  "Sorry, there was an error <BR> $sqlX";
			echo($fileSize);


	}
	



	}
		  	 echo  " code 1";     

		} 
   exit();
?>