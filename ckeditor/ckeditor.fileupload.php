<?php
//Coypright 2013 Jeremy R Perry.  All rights reserved.  Please view the readme.txt file for full copyright information.
$error = false;
$msg = "";
$allowed_ext = array('jpg', 'gif', 'png', 'tif', 'jpeg', 'tiff');//This array ensures only images can be uploaded.
if(isset($_POST['is_upload'])){//Checks to see if the post is set.
	$directory = "uploads/";
	$file_count = count($_FILES['upload']['name']);
	//The code will loop through each upload and move it to the proper directory.  Please feel free to modify the directory path.  It is a webmaster's responsibility to ensure the upload directory has proper security settings.
	for($i=0; $i<$file_count; $i++){
		$file_name = str_replace(" ", "_",  $_FILES['upload']["name"][$i]);
		$extension = end(explode(".", $_FILES['file_send']['name'][$i]));
		$new_file = $directory.$file_name;
		$nf_count = 1;
		$change_file_name = "";
		while(file_exists($new_file)){//This section will rename a file if it already exists
			$change_file_name = "v" . $nf_count . "_". $file_name;
			$new_file = $directory.$change_file_name;
			$nf_count++;
		}
		if($change_file_name != ""){
			$file_name = $change_file_name;
		}
		if((!in_array($extension, $allowed_ext)){
			$error = true;
			$msg = "Only images may be uploaded";
		}
		move_uploaded_file($_FILES['upload']['tmp_name'][$i], $new_file) or $error = true;
	}
	if(!$error){
		$msg = "File(s) uploaded.";
	}
	else{
		if($msg == ""){
			$msg = "There was a problem with uploading your file(s).  Please try again.  If the problem persists, notify an administrator.";
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>HTML5 Uploader</title>
<!--jQuery is required for the code to work.  You can always use jQuery's CDN or those provided by Google or Microsoft.  At this time, there is no styling, but please feel free to add in any inline, page level or external styling as you see fit.-->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(document).ready(function(){//The function for closing the popup window.
	$("#close_window").click(function(){
		self.close();
	});
});
<?php 
//Prints out a JavaScript alert regarding the upload status.
if($msg != "") {
	print 'alert("'.$msg.'");';
}
?>
</script>
</head>

<body>



<h1>Upload File(s)</h1>

<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="is_upload" id="is_upload" value="true" />
<!--The HTML5 uploader will not work on IE8 and below, but those versions will still allow a single file upload-->
<p><label for="upload">File(s):</label><input type="file" name="upload[]" multiple="multiple" /><br />
<input type="submit" class="btn clickable" value="Submit" /><br />
</form>
<input class="btn clickable" type="button" name="close_window" id="close_window" value="Close Window" /></p>

</body>
</html>