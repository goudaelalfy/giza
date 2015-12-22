<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="js/elfinder.min.js"></script>

		<!-- elFinder translation (OPTIONAL) -->
		<script type="text/javascript" src="js/i18n/elfinder.ru.js"></script>

		<script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce_popup.js"></script>

		<script type="text/javascript">
            var FileBrowserDialogue = {
                init : function () {
                    // Here goes your code for setting your custom things onLoad.
                },
                mySubmit : function (URL) {
                    
                    var win = tinyMCEPopup.getWindowArg("window");

                    // insert information now
                    win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;

                    // are we an image browser
                    if (typeof(win.ImageDialog) != "undefined") {
                        // we are, so update image dimensions...
                        if (win.ImageDialog.getImageData)
                            win.ImageDialog.getImageData();

                        // ... and preview if necessary
                        if (win.ImageDialog.showPreviewImage)
                            win.ImageDialog.showPreviewImage(URL);
                    }

                    // close popup window
                    tinyMCEPopup.close();
                }
            }

            tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);
            $().ready(function() {
                var elf = $('#elfinder').elfinder({
                    // lang: 'ru',             // language (OPTIONAL)
                    url : 'php/connector.php?type=<?php echo $_GET['type']; ?>',  // connector URL (REQUIRED)
                    getfile : {
                        onlyURL : true,
                        multiple : false,
                        folders : false
                    },
                    getFileCallback : function(url) {
						//By Gouda, Commented to sove problem (undefined).
                        //path = url.path;
                        //path = url.url;
                        FileBrowserDialogue.mySubmit(url);
                    }                     
                }).elfinder('instance');            
            });
        </script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
		<div id="elfinder"></div>

	</body>
</html>
