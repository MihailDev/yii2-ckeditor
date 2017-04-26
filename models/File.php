<?php

namespace bajadev\ckeditor\models;

use Yii;
use yii\base\Model;

/**
 * Class File
 * @package bajadev\ckeditor\models
 * @author Bajadev <info@bajadev.hu>
 * @link http://bajadev.hu
 */
class File extends Model
{
    /**
     * @var File attribute
     */
    public $file;

    /**
     * Method: rules
     * @return array
     * @author Bajadev <info@bajadev.hu>
     * @link http://bajadev.hu
     */
    public function rules()
    {
        return [
            [['file'], 'required'],
            [
                ['file'],
                'file',
                'extensions' => 'jpg,bmp,gif,png,jpeg',
            ],
        ];
    }

    /**
     * Method: attributeLabels
     * @return array
     * @author Bajadev <info@bajadev.hu>
     * @link http://bajadev.hu
     */
    public function attributeLabels()
    {
        return [
            'file' => 'File',
        ];
    }
}