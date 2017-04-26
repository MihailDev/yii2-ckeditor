<?php
/**
 * Date: 17.01.14
 * Time: 1:06
 */

namespace bajadev\ckeditor;

use yii\web\AssetBundle;

class BrowseAssets extends AssetBundle
{
    public $sourcePath = '@vendor/bajadev/yii2-ckeditor/editor';

    public $js = [
        'assets/jquery.lazyload.min.js',
        'assets/js.cookie-2.0.3.min.js',
        'assets/function.js'
    ];

    public $css = [
        'assets/styles.css',
        'assets/ckeditor.css'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}