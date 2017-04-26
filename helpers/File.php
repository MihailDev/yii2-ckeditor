<?php

namespace bajadev\ckeditor\helpers;

use Yii;
use yii\i18n\Formatter;

/**
 * Class File
 * @package bajadev\ckeditor\helpers
 * @author Bajadev <info@bajadev.hu>
 * @link http://bajadev.hu
 */
class File
{
    /**
     * Method: getName
     * @param $path
     * @return string
     * @author Bajadev <info@bajadev.hu>
     * @link http://bajadev.hu
     */
    public static function getName($path)
    {
        return basename($path);
    }

    /**
     * Method: getHeight
     * @param $path
     * @return mixed
     * @author Bajadev <info@bajadev.hu>
     * @link http://bajadev.hu
     */
    public static function getHeight($path)
    {
        $data = getimagesize($path);
        return $data[1];
    }

    /**
     * Method: getWidth
     * @param $path
     * @return mixed
     * @author Bajadev <info@bajadev.hu>
     * @link http://bajadev.hu
     */
    public static function getWidth($path)
    {
        $data = getimagesize($path);
        return $data[0];
    }

    /**
     * Method: getSize
     * @param $path
     * @return string
     * @author Bajadev <info@bajadev.hu>
     * @link http://bajadev.hu
     */
    public static function getSize($path)
    {

        $formatter = new Formatter();
        $formatter->sizeFormatBase = 1000;

        return $formatter->asShortSize(filesize($path), 0);
    }

    public static function getCreatedDate($path)
    {

        $date = filemtime($path);
        $formatter = new Formatter();
        $date = $formatter->asDate($date, 'yy.MMMM dd. HH:mm');

        return $date;
    }

}