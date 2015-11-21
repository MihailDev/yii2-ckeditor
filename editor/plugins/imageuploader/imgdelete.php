<?php
session_start();

// Including the plugin config file, don't delete the following row!
require(__DIR__ . '/pluginconfig.php');

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Image Browser :: Delete</title>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>

<?php

if (isset($_SESSION['username'])) {

    $imgSrc = $_GET["img"];

    // ckeck if file exists
    if (file_exists($imgSrc)) {
        // check if file is available to delete
        if (is_writable($imgSrc)) {
            // check if file is a sytem file
            $imgBasepath = pathinfo($imgSrc);
            $imgBasename = $imgBasepath['basename'];
            if (!in_array($imgBasename, $sy_icons)) {
                // check if the selected file is in the upload folder
                $imgDirname = $imgBasepath['dirname'];
                $preExamplePath = "$useruploadpath/test.txt";
                $tmpUserUPath = pathinfo($preExamplePath);
                $useruploadpathDirname = $tmpUserUPath['dirname'];
                if ($imgDirname == $useruploadpathDirname) {
                    // check if file is an image
                    $a = getimagesize($imgSrc);
                    $image_type = $a[2];
                    if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_ICO))) {
                        unlink($imgSrc);
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    } else {
                        echo '
                            <script>
                            swal({
                              title: "An error occurred.",
                              text: "You can only delete images. Please try again or delete another image.",
                              type: "error",
                              closeOnConfirm: false
                            },
                            function(){
                              history.back();
                            });
                            </script>
                        ';
                    }
                } else {
                    echo '
                        <script>
                        swal({
                          title: "An error occurred.",
                          text: "The file you want to delete is not in the selected upload folder.",
                          type: "error",
                          closeOnConfirm: false
                        },
                        function(){
                          history.back();
                        });
                        </script>
                    ';
                }
            } else {
                echo '
                    <script>
                    swal({
                      title: "An error occurred.",
                      text: "You cannot delete sytem files. Please try again or choose another image.",
                      type: "error",
                      closeOnConfirm: false
                    },
                    function(){
                      history.back();
                    });
                    </script>
                ';
            }
        } else {
            echo '
                <script>
                swal({
                  title: "An error occurred.",
                  text: "The selected file cannot be deleted. Please try again or choose another image. Note: Don not forget to set CHMOD writable permission (0777) to the imageuploader folder on your server.",
                  type: "error",
                  closeOnConfirm: false
                },
                function(){
                  history.back();
                });
                </script>
            ';
        }
    } else {
        echo '
            <script>
            swal({
              title: "An error occurred.",
              text: "The file you want to delete does not exist. Please try again or choose another image.",
              type: "error",
              closeOnConfirm: false
            },
            function(){
              history.back();
            });
            </script>
        ';
    }

}

?>

</body>
</html>
