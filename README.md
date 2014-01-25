## Использование

```php
use mihaildev\ckeditor\Widget as CKEditor;
use yii\helpers\Html;

echo Html::textarea('my_textarea', '', ['id' => 'my_textarea_id'])

CKEditor::widget([
    'id' => 'my_textarea_id',
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standart, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ]
]);

//или так

echo CKEditor::textarea('my_textarea', '', [
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standart, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
    'inputOptions' => ['class' => 'someclass']
]);

//или c ActiveForm

echo $form->field($post, 'content')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standart, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
    'inputOptions' => ['class' => 'someclass']
]);
```

## Полезные ссылки

CKEditor Api - http://docs.ckeditor.com/
CKEditor Примеры - http://nightly.ckeditor.com/
Файл Менеджер ElFinder - https://github.com/MihailDev/yii2-elfinder