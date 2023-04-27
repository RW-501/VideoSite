<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- saved from url=(0033)https://www.BlackPeopleMarketplace.com -->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />

<title>Hood Awards | Submit Video</title>
	
<meta name="description" content="Hood Awards">
	
<meta name="keywords" content="Hood Awards ">

<meta name="Distribution" content="Global" />

<meta name="Rating" content="General" />

<meta name="Robots" content="INDEX,FOLLOW" />

<meta name="Revisit-after" content="1 Day" />

<style type="text/css" media="all">

<!--




@import url("/HoodAwards/addvideo/indexCSS.css");


-->

</style>

</head>

<body>
	
 					<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/db_Conx/index.php";
   include($path);
   
 


?>



<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/HoodAwards/Includes/header/header.php";
   include($path);
   ?>


	

<div id="page_container">
	<div id="left_side_container">		</div>
	

		
				<div id="center_container">	
						<div id="spacer_container">		</div>
		<div id='ul_button_wrap1'>
		
			  <div id='mainbtn'>
			  <div id='screen'  onclick="getFileFunc()">
			  <div id='tt'>StreetzWatching.com<br /> Coming Soon</div>
			   </div>
			  
			 
			  </div>
			 		</div> 

		<div id='main_area_wrap'>
<div id='playertext'>Stop Seek Bar For Video Cover</div> 
<video  controls playsinline='playsinline' autoplay src="" id="videoPreview">
    Your browser does not support HTML5 video.</video>
		</div>
		
		
		  <div id="upload-btn-wrapper"> 
			  
					<div id='ul_button_wrap'>
			  <button  class="btn" ><i class="fa fa-file-video-o"></i> Add Video</button>
	<input type='file' id="imgInp" name="file" required accept="video/*" />
			 		</div>  
	
				<div id='video_setup'>
			 	<input type="text" id="videoTitle" placeholder='Title' onkeyup="checktitlefunc()" required maxlength="99" />
				
				 <div id='video_info'>
				 <div>
			  		 <input type="checkbox" class='raidobtn' id="publicbool" name="publicbool" checked value="YES"/>
  <label for="publicbool">Public?</label>
  </div>
  
  <div>
  			  		 <input type="checkbox" class='raidobtn' id="SFW_bool" name="SFW_bool"  value="NO"/>
  <label for="NSFW_bool">Not Safe For Work? "NSFW" 18+</label>
  </div>
  
  
  </div>
				</div>
		  </div>
<!-- UPLOAD FORM 
<div id="container">
  <span id="pickfiles">[Upload files]</span>
</div>

-->




		

		
		
 	<div id='up_bt_under_text'>Only Video Clips under 4 mins can be added for now.<br />StreetzWatching.com doesn't allow content that encourages dangerous or illegal activities that risk serious physical harm or death. </div>

	<button class="btn" id='upload_btn' onclick="sendVideo()">
			<i class="fa fa-upload"></i> Upload Video</button>
			<br />
			<br />	
			</div>
	
				
				
				
				<div id="right_side_container">

				
				
				</div>
		
		
		
			</div>
		
		
		
		
		<canvas id="canvas"></canvas> 

<!-- UPLOAD FILE LIST 


-->





<script>


/*

window.BlobBuilder = window.MozBlobBuilder || window.WebKitBlobBuilder || window.BlobBuilder;
var blob;
var start;
var end;
var part;
var SIZE;
var BYTES_PER_CHUNK;
var xhr;
var chunk;

 function sendRequest() {

         blob = document.getElementById('imgInp').files[0];
      //  var file = document.getElementById('fileToUpload').files[0];

        BYTES_PER_CHUNK = 1048576; // 1MB chunk sizes.
        SIZE = blob.size;
        start = 0;                
        part = 0;
        end = BYTES_PER_CHUNK;

    chunk = blob.slice(start, end);
    uploadFile(chunk,part);
    start = end;
    end = start + BYTES_PER_CHUNK;
    part = part + 1;



    }

//------------------------------------------------------------------------------------------------------------------------------------

function fileSelected() {
    var file = document.getElementById('imgInp').files[0];
            if (file) {
                var fileSize = 0;
                if (file.size > 1024 * 1024)
                    fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
                else
                    fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';

               // document.getElementById('fileName').innerHTML = 'Name: ' + file.name;
                //document.getElementById('fileSize').innerHTML = 'Size: ' + fileSize;
                //document.getElementById('fileType').innerHTML = 'Type: ' + file.type;
            }
};
//------------------------------------------------------------------------------------------------------------------------------------

function uploadFile(blobFile,part) {
            var file = document.getElementById('imgInp').files[0];  
            var fd = new FormData();
            fd.append("fileToUpload", blobFile);

            var xhr = new XMLHttpRequest();
       xhr.addEventListener("load", uploadComplete, false);
            xhr.addEventListener("error", uploadFailed, false);
            xhr.addEventListener("abort", uploadCanceled, false);
		xhr.upload.addEventListener("progress", progressHandler, false);
	xhr.addEventListener("load", completeHandler, false);	
	xhr.addEventListener("error", errorHandler, false);
	xhr.addEventListener("abort", abortHandler, false);


            var php_file =  "/HoodAwards/addvideo/addVideo.php";

            xhr.open("POST", php_file +"?"+"file="+file.name+"&num=" + parseInt(part) );
            xhr.onload = function(e) {
              //alert("loaded!");
              };

            xhr.setRequestHeader('Cache-Control','no-cache');
            xhr.send(fd);
            return;

};
//------------------------------------------------------------------------------------------------------------------------------------

function uploadProgress(evt) {
            if (evt.lengthComputable) {
                var percentComplete = Math.round(evt.loaded * 100 / evt.total);
                document.getElementById('progressNumber').innerHTML = percentComplete.toString() + "%";
            }
            else {
                document.getElementById('progressNumber').innerHTML = 'unable to compute';
            }
    };
//------------------------------------------------------------------------------------------------------------------------------------

function uploadComplete(evt) {
            // This event is raised when the server send back a response 
            //alert(evt.target.responseText);

		console.log("1 ajax.responseText   "+evt);
		console.log("start  .SIZE   "+start+"   "+   SIZE);

    if( start < SIZE ) {
            chunk = blob.slice(start, end);

            uploadFile(chunk,part);

            start = end;
            end = start + BYTES_PER_CHUNK;
            part = part + 1;
            }
   
};
//------------------------------------------------------------------------------------------------------------------------------------


function uploadFailed(evt) {
            alert("There was an error attempting to upload the file.");
};
//------------------------------------------------------------------------------------------------------------------------------------

function uploadCanceled(evt) {
            xhr.abort();
            xhr = null;
            alert("The upload has been canceled by the user or the browser dropped the connection.");
};













*/
		function _(id){ return document.getElementById(id); }
		
				var videoTitle;

		function checktitlefunc(){
		
		videoTitle = _('videoTitle').value.length;
		
		if(videoTitle > 2){

		_('upload_btn').style.display = 'block';
		
		}else{
		
				_('upload_btn').style.display = 'none';
		}
		
			console.log("???? ");

		}
		

//1,048,576; // 1MB chunk sizes.
//	var ChunkSize = 700000;
	var ChunkSize = 500000;
	var FileSize;
	var SizeRemaining;
	var TheFile;
	var Chunk = new Blob();
	//function StatusBar
	 var reader = new FileReader();
	 var filename;
	 var filenameX;
	 var uID = _('uID').value;



	var fileX = document.getElementById('imgInp');



function NextByteChunk() {
	//StatusBar(FileSize,SizeRemaining);
	

	if (SizeRemaining > 0) {
	if (SizeRemaining <= ChunkSize) {
	Chunk = TheFile.slice((FileSize-SizeRemaining));
		console.log("SizeRemaining "+ SizeRemaining);

	SizeRemaining = 0;
		

	} else {
	Chunk = TheFile.slice((FileSize-SizeRemaining),((FileSize-SizeRemaining)+ChunkSize));
	SizeRemaining = (SizeRemaining-ChunkSize);
	}
	reader.readAsDataURL(Chunk);
	}else{
	setTimeout(uploadinfoFunc, 2000);

	
	}
	}
	
		
		
		var xhr;
var w;

function sendVideo(){
				_('upload_btn').style.disabled  = 'true';
		videoTitle = _('videoTitle').value.length;

filenameX  = fileX.files[0].name.replace(/[^a-zA-Z0-9_.]/g, "").trim();



	if (fileX.files[0].size > 0 && videoTitle > 2 ) {
	console.log("send ");

		FileSize = fileX.files[0].size;
		SizeRemaining = FileSize;
		TheFile = fileX.files[0];
	
		Chunk = new Blob();

		NextByteChunk();
		
		//reader.readAsDataURL(fileX.files[0]);
		reader.onload = (function(evt = fileX) {

		
 			var b64Text = evt.target.result.substring((evt.target.result.indexOf(",")+1),(evt.target.result.length));

			b64Text = b64Text.replace(/&/g,"["+"AMP"+"]");
        	b64Text = b64Text.replace(/\+/g,"["+"PLUS"+"]");

 filename = fileX.files[0].name.replace(/[^a-zA-Z0-9_.]/g, "").trim();
		console.log("filename   "+filename);
		 console.log("filenameX   "+filenameX);

					var formdata = new FormData();
		formdata.append("dataURL", b64Text);
		w++;

	//formdata.append( "SizeRemaining", SizeRemaining );
	//formdata.append( "FileSize", FileSize );
	formdata.append("type", "upload");
	formdata.append("uid", uID);
	formdata.append( "filename", filename );
	formdata.append( "fs", FileSize );
	formdata.append( "count", w );

			 xhr = new XMLHttpRequest();
	xhr.upload.addEventListener("progress", progressHandlerX, false);
	xhr.addEventListener("load", completeHandlerX, false);	
	xhr.addEventListener("error", errorHandlerX, false);
	xhr.addEventListener("abort", abortHandlerX, false);						
				xhr.onload = function() {
				//	console.log("Chunking 1");

			//	NextByteChunk();
			};
			xhr.open("POST","/HoodAwards/addvideo/addVideo.php",true);
          xhr.setRequestHeader('Cache-Control','no-cache');
			//xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4 && xhr.status == 200) {
						
					console.log("Chunking 2");

		}
	}


		console.log("formdata  "+formdata);

		xhr.send(formdata);

		});
		
	} 
    
}
		
		
		function completeHandlerX(event){
	//_("message_area_status").innerHTML = event.target.responseText;
	//_("progressBar").value = 0;
	
		//console.log(event);
	//console.log("fileX " + fileX.files[0].name);
	//console.log("filenameX " + filenameX);
	
	//console.log("respons;e text     "+event.target.responseText);
	var str = event.target.responseText;
	
	console.log("str " + str);
	var responseX= str.split('xxxx').pop();
	var sizeRemainingX = responseX.split(" ")[0];
	if(FileSize > sizeRemainingX){
	SizeRemaining = sizeRemainingX;
	
		NextByteChunk();
		console.log("RESTART     x "+SizeRemaining);

	}else{
	NextByteChunk();
		console.log("NexXXXXXXt     x ");
	}
	console.log(SizeRemaining + "    sizeRemainingX  " + sizeRemainingX);
	
}

var uploadedSize;
		function errorHandlerX(event){
	//_("percent_status").innerHTML = "Upload Failed";
          //  xhr.setRequestHeader('Cache-Control','no-cache');
	console.log('1      '+event.target.responseText);
//console.log('2    '+event);
	SizeRemaining =  SizeRemaining + ChunkSize;
 uploadedSize =	FileSize -  SizeRemaining ;
	//FileSize
	
	
	console.log("uploadedSize " + uploadedSize);
	console.log("ChunkSize " + ChunkSize);
	console.log("SizeRemaining " + SizeRemaining);
	//console.log("errorHandlerX xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");

		//setTimeout(NextByteChunk, 40000);
}
function abortHandlerX(event){
	//_("percent_status").innerHTML = "Upload Aborted";
	console.log("Upload Aborted");
}
		
function progressHandlerX(event){
//	var percent = (event.loaded / event.total) * 100;
	var percent = (FileSize / SizeRemaining)* 10 ;
	
	//console.log('3      '+event.target.responseText);

		_("upload_btn").innerHTML = Math.round(percent)+"% uploaded";
		
		if(percent > 99){
				_("upload_btn").innerHTML ="processing";
				_("upload_btn").innerHTML ="processing.";
				_("upload_btn").innerHTML ="processing..";
				_("upload_btn").innerHTML ="processing...";
				_("upload_btn").innerHTML ="processing....";

		
		
		}

//	console.log("event text     "+event);

	
}
		
		
		
		
		
		

		 var fileUpload;
		
		 var file1; 
		function getFileFunc(){
				document.getElementById('imgInp').click();
}
		
		
		
		
  var vPreview = _("videoPreview");

  $(function(){
             $("#imgInp").change(function(){
				 
				     file1 = _("imgInp");

				 
vPreview = _("videoPreview");


  var $source = $('#videoPreview');
  $source[0].src = URL.createObjectURL(file1.files[0]);
  
  	console.log("  $source[0].src      "+$source[0].src);

   $source.parent()[0];
			
         });
		     });
		
				
			    $("#imgInp").change(function(){

		  
//alert("vPreview.readyState  "+ vPreview.readyState);	<button   class="btn" onclick="get_info()">get info</button>


   _('video_setup').style.display = 'block';
  				   _('ul_button_wrap').style.display = 'none';
  				   _('ul_button_wrap1').style.display = 'none';
  				   _('main_area_wrap').style.display = 'grid';
				  // capture_func();
				      _('videoPreview').style.display = 'grid';
					  
					  
setTimeout(capture_func, 1000);
	   //alert("Video must be original");

				 
    });
	var dataURL;
function capture_func(){
	console.log("  vPreview src     "+vPreview.src);
	console.log("  vPreview      "+vPreview);



var fileSizeInBytes = file1.files[0].size;



	console.log(" raw width src     "+vPreview.width);
	console.log(" raw height src     "+vPreview.height);
	console.log("  fileSizeInBytes      "+fileSizeInBytes);

if(fileSizeInBytes > '200000'){


var picSize;

if(fileSizeInBytes >= '1000000'){
picSize = 3;
}
if(fileSizeInBytes < '1000000' && fileSizeInBytes >= '500000'){
picSize = 1.5;

}
if(fileSizeInBytes < '500000'){
picSize = 1.1;

}
 	console.log(" smaller ??????????????????     ");


}else{
picSize = 1;

	console.log("  same size  ?????????????????????      ");
}






    var canvas = document.getElementById('canvas');
	canvas.width = vPreview.videoWidth  /picSize ;
	canvas.height = vPreview.videoHeight /picSize;

    canvas.getContext('2d').drawImage(vPreview, 0, 0, vPreview.videoWidth /picSize , vPreview.videoHeight /picSize  );

  
 dataURL = canvas.toDataURL();
console.log("  dataURL      "+dataURL);
}	

vPreview.addEventListener('seeking', (event) => {
  console.log('Video is seeking a new position.');
  capture_func();
});

 
				
			
					
		


			var url = '/HoodAwards/addvideo/add_video.php';

function uploadinfoFunc(){
	
//	_("upload_btn").disabled = true;
	_("upload_btn").innerHTML = "uploding...";
var uIP = _('uIP').value;
var publicbool = _('publicbool').value;
var SFW_bool = _('SFW_bool').value;

 vid = document.getElementById("imgInp");

					   var fileUrl = vid.files[0];

					var formdataX = new FormData();
	formdataX.append("dataURL", dataURL);
	formdataX.append("filename", filenameX);
	formdataX.append("fileSize", FileSize);
	formdataX.append("public", publicbool);
	formdataX.append("SFW", SFW_bool);
	formdataX.append("IP", uIP);
	formdataX.append("ID", uID);
	formdataX.append( "videoTitle", _("videoTitle").value );
	//formdata.append( "ext", mimeType2 );

				//	formdata.append( "itemID", itemID );
									//	alert('?????  2');


	var ajax = new XMLHttpRequest(); 

	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandlerXXX, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
													//	alert('?????  3');


	ajax.open( "POST", url ,true);
	//ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            ajax.setRequestHeader('Cache-Control','no-cache');
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
						

		}
	}
	ajax.send( formdataX );
			
					
					console.log(" Done");

				
			}
				
			
	//	var percent;
function progressHandler(event){
	//var percent = (event.loaded / event.total) * 100;

	//	_("upload_btn").innerHTML = Math.round(percent)+"% uploaded";

	console.log(event);

	
}
function completeHandlerXXX(event){
	//_("message_area_status").innerHTML = event.target.responseText;
	//_("progressBar").value = 0;
	
		console.log(event);

	
		_("upload_btn").innerHTML = "Upload Done";
	console.log(event.target.responseText);
	
			//window.location.href = "https://www.BlackPeopleMarketplace.com/HoodAwards/";

}
function errorHandler(event){
	//_("percent_status").innerHTML = "Upload Failed";
	console.log(event);
	//console.log("Upload Failed");
}
function abortHandler(event){
	//_("percent_status").innerHTML = "Upload Aborted";
	//console.log("Upload Aborted");
}
	
			

		
</script>
  		
	
</body>



</html>
