<?php
session_start();
header('content-type: text/html; charset=utf-8');

require(__DIR__ . "/pluginconfig.php");

$tmpusername = strip_tags($_POST["username"]);
$tmpusername = htmlspecialchars($tmpusername, ENT_QUOTES);
$tmppassword = md5($_POST['password']);

if ($tmpusername == $username and $password == $tmppassword) {
    $_SESSION['username'] = $tmpusername;
    header("Location: imgbrowser.php");
} else {
    echo '
        <script>
        alert("No user found, incorrect password or username!");
        history.back();
        </script>
    ';
}

