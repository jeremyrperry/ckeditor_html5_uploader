//Copyright 2013 Jeremy R Perry.  All rights reserved.  Please view the readme.txt file for full copyright information.

$(document).ready(function(){
	var	texteditor_count = 1;//This number is in the case that an element name and id need to be programatically assigned.
	//This function goes through each textarea and transforms it as needed into a CKEditor instance.  It is robust enough to handle multiple textareas and forms if need be.
	$("textarea").each(function(){
		if($(this).hasClass("ckeditor")){//The textarea must have the ckeditor class to work.  The class name can be changed at will though.
			var texteditor_id = "";
			var texteditor_name = "";
			if($(this).attr("name") != undefined){
				//Grabs the textarea name if its defined.
				texteditor_name = $(this).attr("name");
			}
			if($(this).attr("id") != undefined){
			//Grabs the textarea id if its defined.
				texteditor_id = $(this).attr("id");
			}
			else{
			//This section will programatically assign the textarea name and/or id if not already assigned.
				texteditor_id = "ckeditor_" + texteditor_count;
				if(texteditor_name == ""){
					texteditor_name = texteditor_id;
					$(this).attr("name", texteditor_name);
				}
				$(this).attr("id", texteditor_id);
				texteditor_count++;
			}
			//This section adds the has_cke class to the form if its not already there.
			if(!$(this).closest("form").hasClass("has_cke")){
				$(this).closest("form").addClass("has_cke");
			}
			//This section takes the texteditor_id and transforms it into a CKEditor instance.  Please note that these current settings are necessary for my customizations to work properly.
			CKEDITOR.replace(texteditor_id,{
				filebrowserImageBrowseUrl: 'ckeditor/ckeditor.filebrowse.php?type=Images',
				filebrowserImageWindowWidth: '640',
    			filebrowserImageWindowHeight: '480',
    			removeDialogTabs: 'link:upload;image:Upload',
				extraPlugins: 'html5uploader',
			});
		}
	});
	
	//This function ensures the CKEditor returns the data to the original textarea for form submission.
	$(".has_cke").submit(function(){
		for ( instance in CKEDITOR.instances ){
			CKEDITOR.instances[instance].updateElement();
		}
	});
	
	//This is a function that demonstrates how to dynamically add in HTML into a CKEditor instance.  Please feel free to use it as you see fit, though some code modification may be necessary.
	$(".cke_add").click(function(){
		var get_id = $(this).attr("id").replace("add", "results");
		var get_html = $("#"+get_id).html();
		$("#"+get_id).remove();
		for ( instance in CKEDITOR.instances ){
			CKEDITOR.instances[instance].insertHtml(get_html);
		}
		$(this).remove();
		if($(".cke_wrapper div").length < 1){
			$(".cke_wrapper").remove();
		}
	});

});

