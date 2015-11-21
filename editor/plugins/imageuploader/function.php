<?php

if (isset($_GET["f"])) {
    $f = $_GET["f"];
    if ($f = "loadImages") {
        loadImages();
    }
}

function loadImages()
{
    require(__DIR__ . '/pluginconfig.php');
    if (file_exists($useruploadpath)) {

        $filesizefinal = 0;
        $count = 0;

        $dir = $useruploadpath;
        $files = glob("$dir*.{jpg,jpeg,png,gif,ico}", GLOB_BRACE);
        usort($files, create_function('$a,$b', 'return filemtime($a) - filemtime($b);'));
        for ($i = count($files) - 1; $i >= 0; $i--):
            $image = $files[$i];
            $image_pathinfo = pathinfo($image);
            $image_extension = $image_pathinfo['extension'];
            $image_filename = $image_pathinfo['filename'];
            $size = getimagesize($image);
            $image_height = $size[0];
            $file_size_byte = filesize($image);
            $file_size_kilobyte = ($file_size_byte / 1024);
            $file_size_kilobyte_rounded = round($file_size_kilobyte, 1);
            $filesizetemp = $file_size_kilobyte_rounded;
            $filesizefinal = round($filesizefinal + $filesizetemp) . " KB";
            $calcsize = round($filesizefinal + $filesizetemp);
            $count = ++$count;

            if ($file_style == "block") { ?>
                <div class="fileDiv"
                     onclick="showEditBar('<?php echo $url; ?><?php echo $image_filename; ?>.<?php echo $image_extension; ?>','<?php echo $image_height; ?>','<?php echo $count; ?>');"
                     ondblclick="showImage('<?php echo $url; ?><?php echo $image_filename; ?>.<?php echo $image_extension; ?>','<?php echo $image_height; ?>');"
                     data-imgid="<?php echo $count; ?>">
                    <div class="imgDiv"><img class="fileImg lazy"
                                             data-original="<?php echo $url; ?><?php echo $image_filename; ?>.<?php echo $image_extension; ?>">
                    </div>
                    <p class="fileDescription"><span
                            class="fileMime"><?php echo $image_extension; ?></span> <?php echo $image_filename; ?><?php if ($file_extens == "yes") {
                            echo ".$image_extension";
                        } ?></p>

                    <p class="fileTime"><?php echo date("F d Y H:i", filemtime($image)); ?></p>

                    <p class="fileTime"><?php echo $filesizetemp; ?> KB</p>
                </div>
            <?php } elseif ($file_style == "list") { ?>
                <div class="fullWidthFileDiv"
                     onclick="showEditBar('<?php echo $image; ?>','<?php echo $image_height; ?>','<?php echo $count; ?>');"
                     ondblclick="showImage('<?php echo $image; ?>','<?php echo $image_height; ?>');"
                     data-imgid="<?php echo $count; ?>">
                    <div class="fullWidthimgDiv"><img class="fullWidthfileImg lazy"
                                                      data-original="<?php echo $image; ?>"></div>
                    <p class="fullWidthfileDescription"><?php echo $image_filename; ?><?php if ($file_extens == "yes") {
                            echo ".$image_extension";
                        } ?></p>

                    <div class="qEditIconsDiv">
                        <img title="Delete File" src="img/cd-icon-qtrash.png" class="qEditIconsImg"
                             onclick="window.location.href = 'imgdelete.php?img=<?php echo $image; ?>'">
                    </div>

                    <p class="fullWidthfileTime fullWidthfileMime fullWidthlastChild"><?php echo $image_extension; ?></p>

                    <p class="fullWidthfileTime"><?php echo $filesizetemp; ?> KB</p>

                    <p class="fullWidthfileTime fullWidth30percent"><?php echo date("F d Y H:i",
                            filemtime($image)); ?></p>
                </div>
            <?php }

        endfor;
        if ($count == 0) {
            $calcsize = 0;
        }
        if ($calcsize == 0) {
            $filesizefinal = "0 KB";
        }
        if ($calcsize >= 1024) {
            $filesizefinal = round($filesizefinal / 1024, 1) . " MB";
        }
        echo "
        <script>
            $( '#finalsize' ).html('$filesizefinal');
            $( '#finalcount' ).html('$count');
        </script>
        ";
    } else {
        echo '<div id="folderError">The folder <b>' . $useruploadfolder . '</b> could not be found. Please choose another folder in the settings or <button class="headerBtn" onclick="window.location.href = \'pluginconfig.php?newfoldername=' . $useruploadfolder . '\';">create the folder <b>' . $useruploadfolder . '</b></button>.</div>';
    }
}

function pathHistory()
{
    require(__DIR__ . '/pluginconfig.php');
    $latestpathes = array_slice($foldershistory, -3);
    $latestpathes = array_reverse($latestpathes);
    foreach ($latestpathes as $folder) {
        echo '<p class="pathHistory" onclick="useHistoryPath(\'' . $folder . '\');">' . $folder . '</p>';
    }
}