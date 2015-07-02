# yii2-json-editor
Yii2 wrapper for jdorn/json-editor

## Usage
    <?= JsonEditorWidget::widget([
            'model' => $yourModel,
            'attribute' => $yourAttribute,
            'formId' => $yourFormId,
            'schema' => $yourSchema
        ])
    ?>
