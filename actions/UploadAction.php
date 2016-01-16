<?php

namespace bajadev\ckeditor\actions;

use Yii;
use yii\web\ViewAction;
use yii\helpers\Inflector;
use Imagine\Image\Box;
use yii\imagine\Image;

/**
 * Class BrowseAction
 * @package bajadev\ckeditor\actions
 */
class UploadAction extends ViewAction
{
    /**
     * @var Base Url
     */
    public $url;
    /**
     * @var Base Path
     */
    public $path;
    /**
     * @var int Max Width
     */
    public $maxWidth = 800;
    /**
     * @var int Max Height
     */
    public $maxHeight = 800;
    /**
     * @var bool Use Hash for filename
     */
    public $useHash = true;

    public function init()
    {
        parent::init();
        Yii::$app->controller->enableCsrfValidation = false;
        $this->registerTranslations();
    }

    /**
     * Register widget translations.
     */
    public function registerTranslations()
    {
        if (!isset(Yii::$app->i18n->translations['bajadev/ckeditor']) && !isset(Yii::$app->i18n->translations['bajadev/ckeditor/*'])) {
            Yii::$app->i18n->translations['bajadev/ckeditor'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@vendor/bajadev/yii2-ckeditor/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'bajadev/ckeditor' => 'ckeditor.php'
                ]
            ];
        }
    }


    /**
     * @inheritdoc
     */
    public function run()
    {

        if (Yii::$app->request->isPost) {
            $image = \yii\web\UploadedFile::getInstanceByName('upload');
            $imageFileType = strtolower(pathinfo($image->name, PATHINFO_EXTENSION));
            $allowed = ['png', 'jpg', 'gif', 'jpeg'];
            if (!empty($image) and in_array($imageFileType, $allowed)) {
                $fileName = $this->getFileName($image);
                $image->saveAs($this->getPath() . $fileName);
                $imagine = Image::getImagine();
                $photo = $imagine->open($this->getPath() . $fileName);
                $photo->thumbnail(new Box($this->maxWidth, $this->maxHeight))
                    ->save($this->getPath() . $fileName, ['quality' => 90]);
                if (isset($_GET['CKEditorFuncNum'])) {
                    $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
                    $ckfile = $this->getUrl() . $fileName;
                    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$ckfile', '');</script>";
                    exit;
                }
            } else {
                echo "<script type='text/javascript'>alert('".Yii::t('bajadev/ckeditor', 'File upload stopped by extension')."');</script>";
                exit;
            }

        }

    }

    private function getFileName($image) {

        $imageFileType = strtolower(pathinfo($image->name, PATHINFO_EXTENSION));
        $fileName = Inflector::slug(str_replace($imageFileType, '', $image->name), '_');

        if($this->useHash) {
            $fileName = hash('md5', Yii::getAlias($fileName));
            $rand = rand(10000, 99999);
            return $rand . '_' . $fileName . '.' . $imageFileType;
        } else {
            return $fileName.'.'.$imageFileType;
        }
    }

    /**
     * @return string
     */
    private function getUrl()
    {
        return Yii::getAlias($this->url);
    }

    /**
     * @return string
     */
    private function getPath()
    {
        return Yii::getAlias($this->path);
    }
}
