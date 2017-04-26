<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('bajadev/ckeditor', 'Browse images');
?>
<div id="header">
    <span class="base-btn close-btn" onclick="Cookies.remove('qEditMode');window.close();">
        <i class="glyphicon glyphicon-remove"></i> <?=Yii::t('bajadev/ckeditor', 'Close');?>
    </span>
    <span class="base-btn upload-btn" onclick="uploadImg();">
        <i class="glyphicon glyphicon-cloud-upload"></i> <?=Yii::t('bajadev/ckeditor', 'Upload');?>
    </span>
</div>
<div id="editbar">
    <div id="editbarView" class="editbarDiv">
        <p class="editbarText">
            <i class="glyphicon glyphicon-picture"></i> <?=Yii::t('bajadev/ckeditor', 'View');?>
        </p>
    </div>
    <a href="#" id="editbarDownload" download>
        <div class="editbarDiv">
            <p class="editbarText">
               <i class="glyphicon glyphicon-hdd"></i> <?=Yii::t('bajadev/ckeditor', 'Download');?>
            </p>
        </div>
    </a>
    <div id="editbarUse" class="editbarDiv">
        <p class="editbarText">
            <i class="glyphicon glyphicon-paperclip"></i> <?=Yii::t('bajadev/ckeditor', 'Use image');?>
        </p>
    </div>
    <?php $form = ActiveForm::begin(['options' => ['id' => 'deleteImageForm']]); ?>
    <div id="editbarDelete" class="editbarDiv">
        <?=Html::hiddenInput('file', '', ['id' => 'hiddenFileInput']);?>
        <?=Html::hiddenInput('method', 'delete');?>
        <?php ActiveForm::end(); ?>
        <p class="editbarText">
            <i class="glyphicon glyphicon-trash"></i> <?=Yii::t('bajadev/ckeditor', 'Delete');?>
        </p>
    </div>
    <div onclick="hideEditBar();" class="pull-right">
        <i class="glyphicon glyphicon-remove"></i>
    </div>
</div>
<div id="files" class="row">
    <?= $this->render('load-images', ['url' => $url, 'images' => $images]); ?>
</div>

<div id="imageFullSreen" class="lightbox popout">
    <div class="buttonBar">
        <button id="imageFullSreenClose" class="headerBtn"
                onclick="$('#imageFullSreen').hide(); $('#background').slideUp(250, 'swing');">
            <i class="glyphicon glyphicon-remove"></i>
        </button>
        <a href="#" id="imgActionDownload" download>
            <button class="headerBtn"><i class="glyphicon glyphicon-hdd"></i>
            </button>
        </a>
        <button class="headerBtn greenBtn" id="imgActionUse" class="imgActionP">
            <i class="glyphicon glyphicon-paperclip"></i> <?=Yii::t('bajadev/ckeditor', 'Use image');?>
        </button>
    </div>
    <br><br>
    <img id="imageFSimg" src="#" style="#"><br>
</div>

<div id="uploadImgDiv" class="lightbox popout">
    <div class="buttonBar">
        <button class="headerBtn" onclick="$('#uploadImgDiv').hide(); $('#background2').slideUp(250, 'swing');">
            <i class="glyphicon glyphicon-remove"></i>
        </button>
        <button class="headerBtn greenBtn" name="submit" onclick="$('#uploadImgForm').submit();">
            <i class="glyphicon glyphicon-cloud-upload"></i> <?=Yii::t('bajadev/ckeditor', 'Upload');?>
        </button>
    </div>
    <br><br><br>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'uploadImgForm']]); ?>
    <p class="uploadP"><i class="glyphicon glyphicon-picture"></i> <?=Yii::t('bajadev/ckeditor', 'Please choose image');?>:</p>
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
