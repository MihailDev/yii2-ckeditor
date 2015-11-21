<?php
/**
 * Date: 17.01.14
 * Time: 1:06
 */

namespace bajadev\ckeditor;

use yii\web\AssetBundle;

class Assets extends AssetBundle{
	public $sourcePath = '@vendor/bajadev/yii2-ckeditor/editor';

    public $js = [
        'ckeditor.js',
		'js.js',
    ];

	public $depends = [
		'yii\web\YiiAsset',
	];
}