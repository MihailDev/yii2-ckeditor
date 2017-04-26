<?php
use bajadev\ckeditor\helpers\File;

?>

<?php $count = 1;?>
<?php foreach($images as $image):?>
    <div class="fileDiv col-xs-6 col-md-3"
            onclick="showEditBar('<?= $url; ?><?= File::getName($image); ?>','<?= File::getHeight($image); ?>','<?= $count; ?>');"
            ondblclick="showImage('<?php echo $url; ?><?= File::getName($image); ?>','<?= File::getHeight($image); ?>');"
            data-imgid="<?php echo $count; ?>">
        <div class="imgDiv">
            <img class="fileImg lazy" data-original="<?php echo  $url; ?><?= File::getName($image); ?>">
        </div>
        <p class="fileDescription">
            <span class="fileMime"><?= File::getName($image); ?>
        </p>
        <p class="fileTime"><?= File::getCreatedDate($image) ?></p>
        <p class="fileTime"><?= File::getSize($image); ?></p>
    </div>
    <?php $count++;?>
<?php endforeach; ?>