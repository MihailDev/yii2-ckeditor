<?php
namespace bajadev\ckeditor;

use yii\web\AssetBundle;

class Assets extends AssetBundle{
	public $sourcePath = '@vendor/bajadev/yii2-ckeditor/editor';

    public $js = [
        'ckeditor.js',
		'assets/js.js',
    ];
	public $depends = [
		'yii\web\YiiAsset'
	];
}