<?php 

//$pathy = $_SERVER['HTTP_HOST'];
   
 

$type = $_POST['type'];

if ($type == $type) {
//_POST
//_REQUEST
$filename = $_POST['filename'];
$userID = $_POST['uid'];
$fileTotalsize = $_POST['fs'];
$count = $_POST['count'];

	$data = $_POST["dataURL"];
	
   $pathX = $_SERVER['DOCUMENT_ROOT'];
   $target_path = $pathX .= "/HoodAwards/Videos/";

	//$filepath = $target_path . "NewFile.mp4";
	$filepath = $target_path . $userID."_".$filename;
	/*
function fwrite_stream($fp, $string) {
    for ($written = 0; $written < strlen($string); $written += $fwrite) {
        $fwrite = fwrite($fp, substr($string, $written));
        if ($fwrite === false) {
            return $written;
        }
    }
    return $written;
}
*/

//echo "***filepath    $filepath $type  $userID ***";


// Let's make sure the file exists and is writable first.
if (file_exists($filepath)) {      
$filesize = filesize($filepath);
 }



/*
// Let's make sure the file exists and is writable first.
if (file_exists($filepath)) {      
$filesize = filesize($filepath);
 }
  echo "zzzzzzzzzzzzzzz  $filesize ";

 //$size = (int) (strlen(rtrim($data, '=')) * 3 / 4);
       // echo "xxxx  ff $fileTotalsize   s $size  f $filesize";
		          exit;

//$newFilsize = $size + $filesize;
//if($fileTotalsize > $newFilsize){
if(10 < 5){
//$remainingSize = $fileTotalsize - $filesize;
  echo "zzzzzzzzzzzzzzz  $filesize ";

         exit;
/*/


if(count > 1){
$size = (int) (strlen(rtrim($data, '=')) * 3 / 4);

if($fileTotalsize > $size + $filesize){
$remainingSize = $fileTotalsize - $filesize;

         echo "xxxx$remainingSize  ";
         exit;
}
}else{

    // In our example we're opening $filename in append mode.
    // The file pointer is at the bottom of the file hence
    // that's where $somecontent will go when we fwrite() it.
    if (!$handle = fopen($filepath, 'a+')) {
         echo "Cannot open file ($filepath) or $type";
         exit;
    }
	
	$data = str_replace("["."AMP"."]","&",$data);
    $data = str_replace("["."PLUS"."]","+",$data);
	
    // Write $somecontent to our opened file.
    if (fwrite($handle, base64_decode($data)) === FALSE) {
        echo "Cannot write to file ($filepath) ";
        exit;
    }

    echo "Success, wrote ($size) of $fileTotalsize to file ($filepath)";

    fclose($handle);
	 exit;
}
} else {
    echo "The file $filepath is not writable";
	
	//	echo "***filepath    $filepath  ***";
		//echo "***fileName    $fileName  ***";
		/*
		$fp = fopen($filepath, 'w');
fwrite($fp, '1');
fclose($fp);
*/

}


    

	//$SizeRemaining = $_POST["SizeRemaining"];
	//$FileSize = $_POST["FileSize"];

	?>
	
	