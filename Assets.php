<?php
/**
 * Date: 17.01.14
 * Time: 1:06
 */

namespace mihaildev\ckeditor;

use yii\web\AssetBundle;

class Assets extends AssetBundle{

    public $js = [
        'ckeditor.js',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__."/assets";
        parent::init();
    }
} 