CKEditor for Yii2 with file manager & upload

**Install with composer:** 

    "bajadev/yii2-ckeditor": "*"
or

    composer require bajadev/yii2-ckeditor "*"

**Controller:**

    public function actions()
    {
    
        return [
            'browse-images' => [
                'class' => 'bajadev\ckeditor\actions\BrowseAction',
                'quality' => 80,
                'maxWidth' => 800,
                'maxHeight' => 800,
                'useHash' => true,
                'url' => '@web/contents/',
                'path' => '@frontend/web/contents/',
            ],
            'upload-images' => [
                'class' => 'bajadev\ckeditor\actions\UploadAction',
                'quality' => 80,
                'maxWidth' => 800,
                'maxHeight' => 800,
                'useHash' => true,
                'url' => '@web/contents/',
                'path' => '@frontend/web/contents/',
            ],
        ];
    }

**View:**

        <?php echo $form->field($model, 'content')->widget(CKEditor::className(), [
            'editorOptions' => [
                'preset' => 'full', /* basic, standard, full
                'inline' => false,
                'filebrowserBrowseUrl' => 'browse-images',
                'filebrowserUploadUrl' => 'upload-images',
                'extraPlugins' => 'imageuploader',
            ],
        ]); ?>
