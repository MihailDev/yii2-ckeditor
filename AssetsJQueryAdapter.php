<?php
/**
 * Date: 18.01.14
 * Time: 22:16
 */

namespace mihaildev\widget;

use yii\web\AssetBundle;


class AssetsJQueryAdapter extends AssetBundle{

    public $js = [
        'adapters/jquery.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'mihaildev\ckeditor\Assets'
    ];

    public function init()
    {
        $this->sourcePath = __DIR__."/assets";
        parent::init();
    }

} 