<?php
/**
 * Date: 17.01.14
 * Time: 1:18
 */

namespace mihaildev\ckeditor;

use yii\base\Widget as BaseWidget;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Json;

class Widget extends BaseWidget{
    public $model;
    public $attribute;
    public $editorOptions = [];
    public $inputOptions = [];
    public $inlineOptions = [];
    private $_needRun = false;
    private $_inline = false;

    public function init()
    {
        if($this->getId(false) != null){
            $this->needRun();
        }

        if (!array_key_exists('id', $this->inputOptions)) {
            $this->inputOptions['id'] = $this->id;
        }else{
            $this->id = $this->inputOptions['id'];
        }

        if (array_key_exists('inline', $this->editorOptions)) {
            $this->_inline = $this->editorOptions['inline'];
            unset($this->editorOptions['inline']);
        }

        if (array_key_exists('preset', $this->editorOptions)) {
            if($this->editorOptions['preset'] == 'basic'){
                $this->presetBasic();
            }elseif($this->editorOptions['preset'] == 'standard'){
                $this->presetStandard();
            }elseif($this->editorOptions['preset'] == 'full'){
                $this->presetFull();
            }
            unset($this->editorOptions['preset']);
        }

        if(!empty($this->model) && !empty($this->attribute)){
            if($this->_inline){
                if (!array_key_exists('id', $this->inlineOptions))
                    $this->inlineOptions['id'] = $this->inputOptions['id'].'_inline';

                echo Html::tag('div',Html::activeTextarea($this->model, $this->attribute, $this->inputOptions),$this->inlineOptions);
            }else
                echo Html::activeTextarea($this->model, $this->attribute, $this->inputOptions);
            $this->needRun();
        }

    }

    private function presetBasic(){
        $options['height'] = 100;

        $options['toolbarGroups'] = [
            ['name' => 'undo'],
            ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
            ['name' => 'colors'],
            ['name' => 'links', 'groups' => ['links', 'insert']],
            ['name' => 'others','groups' => ['others', 'about']],
        ];
        $options['removeButtons'] = 'Subscript,Superscript,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe';
        $options['removePlugins'] = 'elementspath';
        $options['resize_enabled'] = false;


        $this->editorOptions = \yii\helpers\ArrayHelper::merge($options, $this->editorOptions);
    }

    private function presetStandard(){
        $options['height'] = 300;

        $options['toolbarGroups'] = [
            ['name' => 'clipboard', 'groups' => ['mode','undo', 'selection', 'clipboard','doctools']],
            ['name' => 'editing', 'groups' => ['tools', 'about']],
            '/',
            ['name' => 'paragraph', 'groups' => ['templates', 'list', 'indent', 'align']],
            ['name' => 'insert'],
            '/',
            ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup']],
            ['name' => 'colors'],
            ['name' => 'links'],
            ['name' => 'others'],
        ];

        $options['removeButtons'] = 'Smiley,Iframe';

        if($this->_inline){
            $options['extraPlugins'] = 'sourcedialog';
            $options['removePlugins'] = 'sourcearea';
        }

        $this->editorOptions = \yii\helpers\ArrayHelper::merge($options, $this->editorOptions);
    }



    private function presetFull(){
        $options['height'] = 400;

        $options['toolbarGroups'] = [
            ['name' => 'clipboard', 'groups' => ['mode','undo', 'selection', 'clipboard', 'doctools']],
            ['name' => 'editing', 'groups' => ['find', 'spellchecker', 'tools', 'about']],
            '/',
            ['name' => 'paragraph', 'groups' => ['templates', 'list', 'indent', 'align']],
            ['name' => 'forms'],
            '/',
            ['name' => 'styles'],
            ['name' => 'blocks'],
            '/',
            ['name' => 'basicstyles', 'groups' => ['basicstyles', 'colors','cleanup']],
            ['name' => 'links', 'groups' => ['links', 'insert']],
            ['name' => 'others'],
        ];

        if($this->_inline){
            $options['extraPlugins'] = 'sourcedialog';
            $options['removePlugins'] = 'sourcearea';
        }

        $this->editorOptions = \yii\helpers\ArrayHelper::merge($options, $this->editorOptions);
    }

    public function needRun(){
        $this->_needRun = true;
    }

    public static function textarea($name, $value = '', $options = []){
        $widget = static::begin($options);
        echo Html::textarea($name, $value, $widget->inputOptions);
        $widget->needRun();
        return $widget->end();
    }

    public static function jsInline($id, $options = []){
        $id = Json::encode($id);
        $options = empty($options) ? '' : ', '.Json::encode($options);
        return "CKEDITOR.inline(".$id.$options.");";
    }

    public static function jsReplace($id, $options = []){
        $id = Json::encode($id);
        $options = empty($options) ? '' : ', '.Json::encode($options);
        return "CKEDITOR.replace(".$id.$options.");";
    }

    public static function jsAppendTo($id, $options = []){
        $id = Json::encode($id);
        $options = empty($options) ? '' : ', '.Json::encode($options);
        return "CKEDITOR.appendTo(".$id.$options.");";
    }

    public static function jsReplaceAll($className){
        $className = Json::encode($className);
        return "CKEDITOR.replaceAll(".$className.");";
    }

    public static function jsInlineAll(){
        return "CKEDITOR.inlineAll();";
    }

    public static function jsAddCss($css = ""){
        return "CKEDITOR.addCss( ".Json::encode($css)." );";
    }

    public function inline($id, $options = []){
        $this->getView()->registerJs($this->jsInline($id, $options), View::POS_END);
    }

    public function inlineAll(){
        $this->getView()->registerJs($this->jsInlineAll(), View::POS_END);
    }

    public function replace($id, $options = []){
        $this->getView()->registerJs($this->jsReplace($id, $options), View::POS_END);
    }

    public function replaceAll($className){
        $this->getView()->registerJs($this->jsReplaceAll($className), View::POS_END);
    }

    public function appendTo($id, $options = []){
        $this->getView()->registerJs($this->jsAppendTo($id, $options), View::POS_END);
    }

    public function addCss($css = ""){
        $this->getView()->registerJs($this->jsAddCss($css), View::POS_HEAD);
    }

    public function run()
    {
        Assets::register($this->getView());

        if($this->_needRun){
            if($this->_inline){
                if(!isset($this->editorOptions['height']))
                    $this->editorOptions['height'] = 100;
                $this->inline($this->id, $this->editorOptions);
                $this->getView()->registerCss('#'.$this->inlineOptions['id'].', #'.$this->inlineOptions['id'].' .cke_textarea_inline{height: '.$this->editorOptions['height'].'px;}');
            }else{
                $this->replace($this->id, $this->editorOptions);
            }
        }
    }

} 