<?php
/**
 * Date: 18.01.14
 * Time: 22:16
 */

namespace bajadev\widget;

use yii\web\AssetBundle;


class AssetsJQueryAdapter extends AssetBundle{

	public $sourcePath = '@bajadev/ckeditor/editor/adapters';

    public $js = [
        'jquery.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'bajadev\ckeditor\Assets'
    ];
}