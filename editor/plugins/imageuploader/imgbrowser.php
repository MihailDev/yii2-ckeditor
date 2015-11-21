<?php
session_start();
?>

<!-- Copyright (c) 2015, Fujana Solutions - Moritz Maleck. All rights reserved. -->
<!-- For licensing, see LICENSE.md -->

<?php
session_start();
// Don't remove the following two rows
$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$root = "http://$_SERVER[HTTP_HOST]";

// Including the plugin config file, don't delete the following row!
require(__DIR__ . '/pluginconfig.php');
// Including the functions file, don't delete the following row!
require(__DIR__ . '/function.php');
// Including the check_permission file, don't delete the following row!
require(__DIR__ . '/check_permission.php');

?>

<!DOCTYPE html>
<html lang="en"
      ondragover="toggleDropzone('show')"
      ondragleave="toggleDropzone('hide')">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Fájl feltöltő</title>
    <meta name="author" content="Moritz Maleck">
    <link rel="icon" href="img/cd-ico-browser.ico">

    <link rel="stylesheet" href="styles.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://ibm.bplaced.com/imageuploader/plugininfo.js"></script>
    <script src="dist/jquery.lazyload.min.js"></script>
    <script src="dist/js.cookie-2.0.3.min.js"></script>

    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

    <script src="function.js"></script>

    <script>
        // Plugin version
        var currentpluginver = "<?php echo $currentpluginver; ?>";
    </script>

</head>
<body ontouchstart="">

<div id="header">
    <img onclick="Cookies.remove('qEditMode');window.close();" src="img/cd-icon-close-grey.png"
         class="headerIconRight iconHover">
    <img onclick="reloadImages();" src="img/cd-icon-refresh.png" class="headerIconRight iconHover">
    <img onclick="uploadImg();" src="img/cd-icon-upload-grey.png" class="headerIconCenter iconHover">
    <!--<img onclick="pluginSettings();" src="img/cd-icon-settings.png" class="headerIconRight iconHover">-->
</div>

<div id="editbar">
    <div id="editbarView" onclick="#" class="editbarDiv"><img src="img/cd-icon-images.png"
                                                              class="editbarIcon editbarIconLeft">

        <p class="editbarText">Megtekintés</p></div>
    <a href="#" id="editbarDownload" download>
        <div class="editbarDiv"><img src="img/cd-icon-download.png" class="editbarIcon editbarIconLeft">

            <p class="editbarText">Letöltés</p></div>
    </a>

    <div id="editbarUse" onclick="#" class="editbarDiv"><img src="img/cd-icon-use.png"
                                                             class="editbarIcon editbarIconLeft">

        <p class="editbarText">Használat</p></div>
    <div id="editbarDelete" onclick="#" class="editbarDiv"><img src="img/cd-icon-qtrash.png"
                                                                class="editbarIcon editbarIconLeft">

        <p class="editbarText">Törlés</p></div>
    <img onclick="hideEditBar();" src="img/cd-icon-close-black.png" class="editbarIcon editbarIconRight">
</div>

<div id="updates" class="popout"></div>

<div id="dropzone" class="dropzone"
     ondragenter="return false;"
     ondragover="return false;"
     ondrop="drop(event)">
    <p>
        <img src="img/cd-icon-upload-big.png"><br>
        Húzza be a képet erre a területre.
    </p>
</div>

<p class="folderInfo">Összesen: <span id="finalcount"></span> Kép - <span id="finalsize"></span>
    <?php if ($file_style == "block") { ?>
        <img title="List" src="img/cd-icon-list.png" class="headerIcon floatRight"
             onclick="window.location.href = 'pluginconfig.php?file_style=list';">
    <?php } elseif ($file_style == "list") { ?>
        <img title="Block" src="img/cd-icon-block.png" class="headerIcon floatRight"
             onclick="window.location.href = 'pluginconfig.php?file_style=block';">
        <img title="Quick Edit" id="qEditBtnOpen" src="img/cd-icon-qedit.png" class="headerIcon floatRight"
             onclick="toogleQEditMode();">
        <img title="Quick Edit" id="qEditBtnDone" src="img/cd-icon-done.png" class="headerIcon floatRight"
             onclick="toogleQEditMode();">
    <?php } ?>
</p>

<div id="files">
    <?php
    loadImages();
    ?>
</div>

<div id="imageFullSreen" class="lightbox popout">
    <div class="buttonBar">
        <button id="imageFullSreenClose" class="headerBtn"
                onclick="$('#imageFullSreen').hide(); $('#background').slideUp(250, 'swing');"><img
                src="img/cd-icon-close.png" class="headerIcon"></button>
        <button class="headerBtn" id="imgActionDelete"><img src="img/cd-icon-delete.png" class="headerIcon"></button>
        <a href="#" id="imgActionDownload" download>
            <button class="headerBtn"><img src="img/cd-icon-download.png" class="headerIcon"></button>
        </a>
        <button class="headerBtn greenBtn" id="imgActionUse" onclick="#" class="imgActionP"><img
                src="img/cd-icon-use.png" class="headerIcon"> Használat
        </button>
    </div>
    <br><br>
    <img id="imageFSimg" src="#" style="#"><br>
</div>

<div id="uploadImgDiv" class="lightbox popout">
    <div class="buttonBar">
        <button class="headerBtn" onclick="$('#uploadImgDiv').hide(); $('#background2').slideUp(250, 'swing');"><img
                src="img/cd-icon-close.png" class="headerIcon"></button>
        <button class="headerBtn greenBtn" name="submit" onclick="$('#uploadImgForm').submit();"><img
                src="img/cd-icon-upload.png" class="headerIcon"> Feltöltés
        </button>
    </div>
    <br><br><br>

    <form action="imgupload.php" method="post" enctype="multipart/form-data" id="uploadImgForm"
          onsubmit="return checkUpload();">
        <p class="uploadP"><img src="img/cd-icon-select.png" class="headerIcon"> Kérem válasszon képet:</p>
        <input type="file" name="upload" id="upload">
        <br>
        <br>
    </form>
</div>

<div id="background" class="background" onclick="$('#imageFullSreenClose').trigger('click');"></div>
<div id="background2" class="background"
     onclick="$('#uploadImgDiv').hide(); $('#background2').slideUp(250, 'swing');"></div>
<div id="background3" class="background"
     onclick="$('#settingsDiv').hide(); $('#background3').slideUp(250, 'swing');"></div>

</body>
</html>