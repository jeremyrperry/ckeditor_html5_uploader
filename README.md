This code repository is a demonstration of using a custom HTML5 uploader in conjunction with CKEditor.  Instead of routing the upload through CKEditor's stock upload window, this demonstration disables the CKEditor window and utilizes a custom uploader with the HTML5 multiple tag to permit multiple uploads at once*.  Utilizing this method solves two issues.  First and most importantly, CKEditor's file settings require completely open file permissions in an Apache environment, which is a major security issue.  My uploader gets around this by utilizing an independent script and allows the site's webmaster to have full control over the upload directory's permission and security settings.  Second, the HTML5 uploader permits multiple files to be uploaded at once vice CKEditor's one.

A person with sufficient knowledge of HTML, JavaScript, and jQuery will be needed to properly configure this package.  Experience with PHP and use of CKEditor's API is recommended.  The tool makes use of PHP and will only run in a server environment.  It has been tested in a LAMP environment, and while it should work in an IIS environment, some code modifications to properly work with IIS may be necessary.  It was tested using the latest version of jQuery on jQuery.com's CDN, and either the latest version or the newest version possible for your site is recommended.  CKEditor 4 was used to develop this pacakge, and since CKEditor's API (mostly) hasn't changed from 3.x to 4.x, my customizations should be backwards compatible. A full demonstration of the code repository is included.

As of right now, the file browser is only set up to read images.  This might be changed in the future.

This code repository includes the following items that I developed:

1.  index.php - A basic PHP script that demonstrates the use of the custom code I developed for CKEditor.

2.  cke_enable.js - A fully featured JavaScript file that is capable of rendering the modified build of CKEditor with only a simple class reference to the original textarea.

3.  ckeditor.filebrowse.php - A custom PHP file browser for viewing all files in the upload folder.

4.  ckeditor.fileupload.php - A custom PHP file with an HTML5 multiple file uploader*.  Use of this uploader gives the user the power of an HTML5 upload and by bypassing CKEditor's potentially hazardous directory upload requirements, and permits webmasters to maintain tighter control over the upload directory permission settings.

5.  plugins/html5uploader/ - A full on CKEditor plugin that gives the custom file uploader a native button within CKEditor.  The button is an up arrow and it is programmed to appear as the first button in the insert toolbar.  

My portion of this code repository is open source source and free for use in all non-commercial settings.  It is not to be utilized to power paid content or sold in whole or in part without my express authorization, but there is no restriction on other software developers charging development and consulting time to properly set up the code.  You are free to modify the source code as as you see fit, but if any part of my original code is used, you must keep notation of me as either the author or that your work was based on my design.  It comes without any implied warranties and I will not provide unpaid tech support.  Because of security issues surrounding a file uploader exposed to the general public, I do not have a live demonstration of this tool on my website at this time.  The remainder of this code repository is a CKEditor4 distribution and its use is pursuant to CKEditor's copyright policy (http://ckeditor.com/about/license).  The up arrow used for the CKEditor plugin image is a public domain photo sourced from http://findicons.com/icon/260812/arrow_up_2.  The stock photos included in the ckeditor/uploads/ directory are public domain photos sourced from public-domain-images.com.  All public domain photos can be reused without restriction.

Instructions:

1.  Install the ckeditor directory on your server.  If you modify the directory names, directory structure, and/or place the directory in any other place than root folder of your website, you will need to modify the header reference code and other code sections accordingly.

2.  If your site doesn't have it already, you will need a jQuery reference.  You can host your own copy or use the CDN provided by jQuery, Google, Microsoft, or another trusted CDN source.  it must preceed any of my custom code.  You must also have a reference to CKEditor's JavaScript reference file before cke_enable.js, my custom code.  Below is an example of how the JavaScript code should look:  
<xmp>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/cke_enable.js"></script>
</xmp>

3.  In any textarea that is to become a CKEditor instance, you will need to have a class of ckeditor added to the element (you can modify the class designation from cke_enable.js).  Adding in the element name and id is optional since my code will dynamically do this if you don't, but it is recommended to do so in order to maintain tighter control of the form submission process.
-Example with no name or id element:  <xmp><textarea class="ckeditor"></textarea></xmp>
-Example with name and id element:  <xmp><textarea class="ckeditor" name="cke1" id="cke1" ></textarea></xmp>
--Either way works.--

4.  My code will detect the textarea's parent form element and add in a necessary class that ensures the CKEditor instance will properly save your content for submission, but if you want to do this yourself, add in the class of has_cke (you can modify the class designation from cke_enable.js).
-No-class Example:  <xmp><form action="" method="post"></xmp>
-Class example:  <xmp><form action="" method="post" class="has_cke"></xmp>

5.  Short of making more advanced changes to the code and file upload/storage structure (and please feel free to do so as necessary), you are set to go!  Additional advanced instructions are in each custom piece of code.

I hope you can put this tool to good use!

*The HTML5 multiple file upload capability is incompatible with Internet Explorer 8 and below, but will still allow single file uploads.

======================

Copyright 2013 Jeremy R Perry.  All rights reserved.


