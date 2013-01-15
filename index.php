<!--This PHP file is a demonstration of how my CKEditor customization works.  Please feel free to set it up in a server environment and play around with it.  Coypright 2013 Jeremy R Perry.  All rights reserved.  Please view the readme.txt file for full copyright information.-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>HTML5 Uploader Demonstration</title>
<!--Both jQuery and CKEditor required for the code to work.  You can always use jQuery's CDN or those provided by Google or Microsoft-->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/cke_enable.js"></script>

</head>

<body>
<h1>HTML5 Uploader Demonstration</h1>
<--You may put the form class in, but it is not required.-->
<form action="" method="post">
<--The textarea class of ckeditor must be included at a minimum.  It is recommended to also include an element name and id.-->
<p><textarea class="ckeditor"></textarea></p>
<p><input type="submit" value="Submit" /></p>
</form>
</p>


<?php
//This PHP snippet gives the ability to demonstrate a CKEditor submission as well as an extra ability to insert the HTML directly into the CKEditor instance.  Please feel free to play around with it.
if(isset($_POST)){
	$post_count = 1;
	foreach($_POST as $key=>$val){
		print '<div class="cke_wrapper"><h2>Previous Submission</h2><div id="cke_results_'.$post_count.'">'.stripslashes($_POST[$key]).'</div><input type="button" class="cke_add" name="cke_add_'.$post_count.'" id="cke_add_'.$post_count.'" value="Add to CKEditor" /></div>';
		$post_count++;
	};
}
?>
</div>
</div>

</body>
</html>