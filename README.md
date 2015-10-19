# yii2-json-editor
Yii2 wrapper for jdorn/json-editor

## Example

    $form->field($model, 'example_field')->widget(JsonEditorWidget::className(), [
        'schema' => $example_schema,
        'clientOptions' => [
            'theme' => 'bootstrap3',
            'disable_collapse' => true,
            'disable_edit_json' => true,
            'disable_properties' => true,
            'no_additional_properties' => true,
        ],
    ]);