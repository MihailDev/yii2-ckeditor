<?php
/**
 * Date: 18.01.14
 * Time: 22:16
 */

namespace mihaildev\widget;

use yii\web\AssetBundle;


class AssetsJQueryAdapter extends AssetBundle{

	public $sourcePath = '@mihaildev/ckeditor/editor/adapters';

    public $js = [
        'jquery.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'mihaildev\ckeditor\Assets'
    ];
}