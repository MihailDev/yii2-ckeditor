<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>

<?php

if (file_exists($data['path'])) {

    $filesizefinal = 0;
    $count = 0;

    $dir = $data['path'];
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
        ?>

            <div class="fileDiv col-xs-6 col-md-3"
                 onclick="showEditBar('<?php echo $data['url']; ?><?php echo $image_filename; ?>.<?php echo $image_extension; ?>','<?php echo $image_height; ?>','<?php echo $count; ?>');"
                 ondblclick="showImage('<?php echo $data['url']; ?><?php echo $image_filename; ?>.<?php echo $image_extension; ?>','<?php echo $image_height; ?>');"
                 data-imgid="<?php echo $count; ?>">
                <div class="imgDiv"><img class="fileImg lazy"
                                         data-original="<?php echo $data['url']; ?><?php echo $image_filename; ?>.<?php echo $image_extension; ?>">
                </div>
                <p class="fileDescription"><span
                        class="fileMime"><?php echo $image_extension; ?></span> <?php echo $image_filename; ?><?php if ($data['ext'] == "yes") {
                        echo ".$image_extension";
                    } ?></p>

                <p class="fileTime"><?php echo date("F d Y H:i", filemtime($image)); ?></p>

                <p class="fileTime"><?php echo $filesizetemp; ?> KB</p>
            </div>
        <?php endfor ?>
<?php
} else {
    echo '<div id="folderError">The folder <b>' . $data['path'] . '</b> could not be found.</div>';
}