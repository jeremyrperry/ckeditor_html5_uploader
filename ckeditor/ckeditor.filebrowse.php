<?php
//Coypright 2013 Jeremy R Perry.  All rights reserved.  Please view the readme.txt file for full copyright information.  This filebrowser is currently set to only display images, though this may change in the future.
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>CKEditor File Browser</title>
<!--jQuery is required for the code to work.  You can always use jQuery's CDN or those provided by Google or Microsoft-->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<!--I only included very basic styling for the filebrowser to work.  Please feel free to modify as you see fit.-->
<style type="text/css">
	#upload_images{
		width: 600px;
		margin-left: auto;
		margin-right: auto;
	}
	#upload_images .image_container{
		display: inline-block;
		vertical-align: top;
		margin-right: 10px;
		width: 175px;
		margin-right: 20px;
		overflow-x:auto;
	}
	.image_info{
		display: none;
		padding-top: 110px;
	}
	.image_box{
		height: 100px;
		margin-bottom: 10px;
		background-color: white;
	}
</style>
</head>

<body>
<h1>Uploaded Images</h1>


<div id="upload_images">
<?php
//This function allow for a file size to be printed out in kilobytes.
function show_kilobytes($val){
	return round(filesize($val)/ 1024, 2)." KB";
}

$dont_show = array('.', '..');//This array catches any blank files on the server.
$directory = 'uploads/';//The file directory setting.  Please feel free to change up.
$show_dir = scandir($directory);//Reads the file directory

$count = 1;
foreach($show_dir as $s){//Loops through each file and prints out if they are actual images
	if(!in_array($s, $dont_show)){
		print '<div class="image_container">';
		print '<div class="image_box"><img id="img_'.$count.'" src="'.$directory.$s.'" /></div>';
		print '<span class="image_info">'.$s.'<br/ >'.date('m/d/y H:i:s', filemtime($directory . $s)).'<br />'.show_kilobytes($directory . $s).'</span>';
		print '<br /><input type="button" class="use btn clickable" name="use_'.$count.'" id="use_'.$count.'" value="Use" />';
		print '</div>';
		$count++;
	}
}
?>
</div>
<script>
$(document).ready(function(){
	//This jQuery section resizes each photo to a thumbnail size and gives a reading of the height and width, something that PHP can't efficiently do.
	$(".image_container").each(function(){
		var height = "";
		var width = "";
		$(this).find("img").each(function(){
			height = $(this).height();
			width = $(this).width();
			if(height > 100){
				var differential = height / width;
				$(this).height(100);
				var new_width = 100 / differential;
				$(this).width(new_width);
			}
		});
		$(this).find(".image_info").each(function(){
			$(this).append("<br />" + height + "x" + width);
			$(this).show();
		});
	});

	//This command selects the associated image with the use button, and closes the window.
	$(".use").click(function(){
		var img_id = $(this).attr("id").replace("use_", "img_");
		window.opener.CKEDITOR.tools.callFunction(<?=$_GET['CKEditorFuncNum'];?>, "ckeditor/"+ $("#"+img_id).attr("src"));
		self.close();
	})
});
</script>
</body>
</html>