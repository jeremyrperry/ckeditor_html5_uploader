//Coypright 2013 Jeremy R Perry.  All rights reserved.  Please view the readme.txt file for full copyright information.

//This section defines the plugin resoruces for the HTML5 uploader
CKEDITOR.plugins.add('html5uploader',
{
    init: function (editor) {
        var pluginName = 'html5uploader';
        editor.ui.addButton('html5uploader',
            {
                label: 'HTML5 Uploader',
                command: 'OpenWindow',
                icon: CKEDITOR.plugins.getPath('html5uploader') + 'arrow_up_2.png',
                toolbar: 'insert,0'//The plugin will be set to the first insert toolbar button by default, but please feel free to change this.
            });
        var cmd = editor.addCommand('OpenWindow', { exec: show_html5_uploader });
    }
});
//This function calls up the file uploader when the HTML5 button is clicked.
function show_html5_uploader(e) {
   window.open('ckeditor/ckeditor.fileupload.php', 'CKEditor File Upload', 'width=450,height=250');
}