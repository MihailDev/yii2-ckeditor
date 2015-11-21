<?php
$filenames = array(
    "imgbrowser.php",
    "imgdelete.php",
    "imgupload.php",
    "pluginconfig.php",
    "uploads/",
);
if ($username == "" and $password == "") {
    $filenames[] = "create.php";
}
foreach ($filenames as $filename) {
    if (!is_writable($filename)) {
        $check_permission = false;
    } else {
        $check_permission = true;
    }
}
if (!$check_permission):
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>Image Browser for CKEditor :: Fujana Solutions</title>
        <meta name="author" content="Moritz Maleck">
        <link rel="icon" href="img/cd-ico-browser.ico">
        <link rel="stylesheet" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://ibm.bplaced.com/imageuploader/plugininfo.js"></script>
        <script src="dist/jquery.lazyload.min.js"></script>
        <script src="function.js"></script>
        <style>
            #folderError a {
                color: #55ACEE;
            }
        </style>
    </head>
    <body ontouchstart="">

    <div id="header">
        <a class="headerA" href="http://imageuploaderforckeditor.altervista.org/" target="_blank"><b>Image Browser</b>
            for CKEditor</a><br>
    </div>

    <div id="folderError">
        <b>Thanks for choosing Image Uploader and Browser for CKEditor!</b><br><br>
        To use this plugin you need to set <b>CHMOD writable permission (0777)</b> to the <i>imageuploader</i> folder on
        your server. <a href="http://ow.ly/RE7wC" target="_blank">How to Change File Permissions Using FileZilla
            (external link)</a><br><br>
        Check out the <a href="http://imageuploaderforckeditor.altervista.org/" target="_blank">Documentation</a> or the
        <a href="http://imageuploaderforckeditor.altervista.org/support/" target="_blank">Plugin FAQ</a> for more help.
    </div>

    </body>
    </html>
    <?php
    exit;
endif;
?>