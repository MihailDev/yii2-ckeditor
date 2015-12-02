CKEditor for Yii2 with file manager & upload

**Install with composer:** 

    "bajadev/yii2-ckeditor": "*"
or

    php composer.phar require --prefer-dist bajadev/yii2-ckeditor "*"

**Controller:**

    public function actions()
    {
    
        return [
            'browse-images' => [
                'class' => 'bajadev\ckeditor\actions\BrowseAction',
                'url' => '@web/contents/',
                'path' => '@frontend/web/contents/',
            ],
            'upload-images' => [
                'class' => 'bajadev\ckeditor\actions\UploadAction',
                'url' => '@web/contents/',
                'path' => '@frontend/web/contents/',
            ],
        ];
    }

**View:**

        <?php echo $form->field($model, 'content')->widget(CKEditor::className(), [
            'editorOptions' => [
                'preset' => 'full',
                'inline' => false,
                'filebrowserBrowseUrl' => 'browse-images',
                'filebrowserUploadUrl' => 'upload-images',
				'extraPlugins' => 'imageuploader',
            ],
        ]); ?>
