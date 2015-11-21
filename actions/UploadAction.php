<?php

namespace bajadev\ckeditor\actions;

use Yii;
use yii\web\ViewAction;

/**
 * Class BrowseAction
 * @package bajadev\ckeditor\actions
 */
class UploadAction extends ViewAction
{

    public $url;
    public $path;

    public function init()
    {
        parent::init();
        Yii::$app->controller->enableCsrfValidation = false;
    }


    /**
     * @inheritdoc
     */
    public function run()
    {

        if(Yii::$app->request->isPost) {
            $image = \yii\web\UploadedFile::getInstanceByName('upload');
            $imageFileType = strtolower(pathinfo($image->name, PATHINFO_EXTENSION));
            $allowed = ['png', 'jpg', 'gif', 'jpeg'];
            if(!empty($image) and in_array($imageFileType, $allowed)) {
                $image->saveAs($this->getPath().$image->name);
                if (isset($_GET['CKEditorFuncNum'])) {
                    $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
                    $ckfile = $this->getUrl().$image->name;
                    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$ckfile', '');</script>";
                    exit;
                }
            }

        }

    }

    private function getUrl()
    {
        return Yii::getAlias($this->url);
    }

    private function getPath()
    {
        return Yii::getAlias($this->path);
    }
}
