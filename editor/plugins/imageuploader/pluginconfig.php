<?php
if (isset($_POST["newpath"])) {
    $temppath = $_POST["newpath"];
    $newpath = strip_tags($temppath);
    $newpath = htmlspecialchars($newpath, ENT_QUOTES);
    $root = $_SERVER['DOCUMENT_ROOT'];
    $data = '
    $useruploadfolder = "' . $newpath . '";
    $useruploadpath = "../../../' . $newpath . '/";
    $foldershistory[] = "' . $newpath . '";
        ' . PHP_EOL;
    $fp = fopen(__DIR__ . '/pluginconfig.php', 'a');
    fwrite($fp, $data);
}

if (isset($_GET["newfoldername"])) {
    $newfoldername = strip_tags($_GET["newfoldername"]);
    $newfoldername = htmlspecialchars($newfoldername, ENT_QUOTES);
    mkdir('../../../' . $newfoldername . '', 0777, true);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST["extension"])) {
    $extension_setting = strip_tags($_POST["extension"]);
    $extension_setting = htmlspecialchars($extension_setting, ENT_QUOTES);
    if ($extension_setting == "no" or $extension_setting == "yes") {
        setcookie(
            "file_extens",
            $extension_setting,
            time() + (10 * 365 * 24 * 60 * 60)
        );
    } else {
        echo '
                <script>
                alert("An error occurred.\r\n\r\nPlease use the plugin settings to change the visibility or try again.");
                history.back();
                </script>
            ';
    }
}
if (isset($_GET["file_style"])) {
    $file_style = strip_tags($_GET["file_style"]);
    $file_style = htmlspecialchars($file_style, ENT_QUOTES);
    if ($file_style == "block" or $file_style == "list") {
        setcookie(
            "file_style",
            $file_style,
            time() + (10 * 365 * 24 * 60 * 60)
        );
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo '
                <script>
                alert("An error occurred.\r\n\r\nPlease use the image browser to change the file style or try again.");
                history.back();
                </script>
            ';
    }
}

// Version of the plugin
$currentpluginver = "4.1.3";

// username and password
$username = "";
$password = "";

// ststem icons
$sy_icons = array(
    "cd-ico-browser.ico",
    "cd-icon-browser.png",
    "cd-icon-bug.png",
    "cd-icon-close.png",
    "cd-icon-coffee.png",
    "cd-icon-credits.png",
    "cd-icon-delete.png",
    "cd-icon-disable.png",
    "cd-icon-download.png",
    "cd-icon-faq.png",
    "cd-icon-images.png",
    "cd-icon-logout.png",
    "cd-icon-password.png",
    "cd-icon-refresh.png",
    "cd-icon-select.png",
    "cd-icon-settings.png",
    "cd-icon-upload.png",
    "cd-icon-use.png",
    "cd-icon-version.png",
    "cd-icon-edit.png",
    "cd-icon-hideext.png",
    "cd-icon-showext.png" .
    "cd-icon-done.png",
    "cd-icon-qtrash.png",
    "cd-icon-qedit.png",
    "cd-icon-list.png",
    "cd-icon-block.png",
    "cd-icon-done.png",
);

// show/hide file extension
if (!isset($_COOKIE["file_extens"])) {
    $file_extens = "no";
} else {
    $file_extens = $_COOKIE["file_extens"];
}

// file_style
if (!isset($_COOKIE["file_style"])) {
    $file_style = "block";
} else {
    $file_style = $_COOKIE["file_style"];
}

// Path to the upload folder, please set the path using the Image Browser Settings menu.

$foldershistory = array();
$useruploadroot = "http://$_SERVER[HTTP_HOST]";

$useruploadpath = $_SESSION['uploadPath'] . '/';
$foldershistory[] = $useruploadfolder;
$url = $_SESSION['uploadUrl'];
        
