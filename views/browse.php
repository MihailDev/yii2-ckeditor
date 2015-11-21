<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div id="header">
    <img onclick="Cookies.remove('qEditMode');window.close();" src="<?= Url::home(); ?>/img/icon/cd-icon-close-grey.png"
         class="headerIconRight iconHover">
    <img onclick="reloadImages();" src="<?= Url::home(); ?>/img/icon/cd-icon-refresh.png"
         class="headerIconRight iconHover">
    <img onclick="uploadImg();" src="<?= Url::home(); ?>/img/icon/cd-icon-upload-grey.png"
         class="headerIconCenter iconHover">
    <!--<img onclick="pluginSettings();" src=<?= Url::home(); ?>/img/icon/d-icon-settings.png" class="headerIconRight iconHover">-->
</div>

<div id="editbar">
    <div id="editbarView" onclick="#" class="editbarDiv"><img src="<?= Url::home(); ?>/img/icon/cd-icon-images.png"
                                                              class="editbarIcon editbarIconLeft">

        <p class="editbarText">Megtekintés</p></div>
    <a href="#" id="editbarDownload" download>
        <div class="editbarDiv"><img src="<?= Url::home(); ?>/img/icon/cd-icon-download.png"
                                     class="editbarIcon editbarIconLeft">

            <p class="editbarText">Letöltés</p></div>
    </a>

    <div id="editbarUse" onclick="#" class="editbarDiv"><img src="<?= Url::home(); ?>/img/icon/cd-icon-use.png"
                                                             class="editbarIcon editbarIconLeft">

        <p class="editbarText">Használat</p></div>
    <?php $form = ActiveForm::begin(['options' => ['id' => 'deleteImageForm']]); ?>
    <div id="editbarDelete" onclick="#" class="editbarDiv"><img src="<?= Url::home(); ?>/img/icon/cd-icon-qtrash.png"
                                                                class="editbarIcon editbarIconLeft">
        <?=Html::hiddenInput('file', '', ['id' => 'hiddenFileInput']);?>
        <?=Html::hiddenInput('method', 'delete');?>
        <?php ActiveForm::end(); ?>
        <p class="editbarText">Törlés</p></div>
         <img onclick="hideEditBar();" src="<?= Url::home(); ?>/img/icon/cd-icon-close-black.png"
         class="editbarIcon editbarIconRight">

</div>

<div id="updates" class="popout"></div>

<div id="dropzone" class="dropzone"
     ondragenter="return false;"
     ondragover="return false;"
     ondrop="drop(event)">
    <p>
        <img src="<?= Url::home(); ?>/img/icon/cd-icon-upload-big.png"><br>
        Húzza be a képet erre a területre.
    </p>
</div>

<p class="folderInfo">Összesen: <span id="finalcount"></span> Kép - <span id="finalsize"></span>
    <?php if ($file_style == "block") { ?>
        <img title="List" src="<?= Url::home(); ?>/img/icon/cd-icon-list.png" class="headerIcon floatRight">
    <?php } elseif ($file_style == "list") { ?>
        <img title="Block" src="<?= Url::home(); ?>/img/icon/cd-icon-block.png" class="headerIcon floatRight">
        <img title="Quick Edit" id="qEditBtnOpen" src="<?= Url::home(); ?>/img/icon/cd-icon-qedit.png"
             class="headerIcon floatRight"
             onclick="toogleQEditMode();">
        <img title="Quick Edit" id="qEditBtnDone" src="<?= Url::home(); ?>/img/icon/cd-icon-done.png"
             class="headerIcon floatRight"
             onclick="toogleQEditMode();">
    <?php } ?>
</p>

<div id="files">
    <?php
    echo $images;
    ?>
</div>

<div id="imageFullSreen" class="lightbox popout">
    <div class="buttonBar">
        <button id="imageFullSreenClose" class="headerBtn"
                onclick="$('#imageFullSreen').hide(); $('#background').slideUp(250, 'swing');"><img
                src="<?= Url::home(); ?>/img/icon/cd-icon-close.png" class="headerIcon"></button>
        <a href="#" id="imgActionDownload" download>
            <button class="headerBtn"><img src="<?= Url::home(); ?>/img/icon/cd-icon-download.png" class="headerIcon">
            </button>
        </a>
        <button class="headerBtn greenBtn" id="imgActionUse" onclick="#" class="imgActionP"><img
                src="<?= Url::home(); ?>/img/icon/cd-icon-use.png" class="headerIcon"> Használat
        </button>
    </div>
    <br><br>
    <img id="imageFSimg" src="#" style="#"><br>
</div>

<div id="uploadImgDiv" class="lightbox popout">
    <div class="buttonBar">
        <button class="headerBtn" onclick="$('#uploadImgDiv').hide(); $('#background2').slideUp(250, 'swing');"><img
                src="<?= Url::home(); ?>/img/icon/cd-icon-close.png" class="headerIcon"></button>
        <button class="headerBtn greenBtn" name="submit" onclick="$('#uploadImgForm').submit();"><img
                src="<?= Url::home(); ?>/img/icon/cd-icon-upload.png" class="headerIcon"> Feltöltés
        </button>
    </div>
    <br><br><br>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'uploadImgForm']]); ?>
    <p class="uploadP"><img src="<?= Url::home(); ?>/img/icon/cd-icon-select.png" class="headerIcon"> Kérem válasszon
        képet:</p>
    <input type="file" name="upload" id="upload">
    <br>
    <br>
    <?php ActiveForm::end(); ?>
</div>

<div id="background" class="background" onclick="$('#imageFullSreenClose').trigger('click');"></div>
<div id="background2" class="background"
     onclick="$('#uploadImgDiv').hide(); $('#background2').slideUp(250, 'swing');"></div>
<div id="background3" class="background"
     onclick="$('#settingsDiv').hide(); $('#background3').slideUp(250, 'swing');"></div>
