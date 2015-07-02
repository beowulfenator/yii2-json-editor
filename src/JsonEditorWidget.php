<?php

namespace beowulfenator\JsonEditor;

use yii\base\InvalidConfigException;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;

class JsonEditorWidget extends InputWidget{
    public $schema = null;
    public $formId = null;

    public function init(){
        if (!$this->hasModel()) {
            throw new InvalidConfigException("You must specify 'model' and 'attribute' properties.");
        }
        if (null === $this->schema) {
            throw new InvalidConfigException("You must specify 'schema' property.");
        }
        if (null === $this->formId) {
            throw new InvalidConfigException("You must specify 'formId' property.");
        }
        parent::init();
        JsonEditorAsset::register($this->getView());
    }

    public function run()
    {
        //prepare data
        $view = $this->getView();
        $formId = $this->formId;
        $widgetId = $this->id;
        $elementId = $this->options['id'];
        $schema = Json::encode($this->schema);

        if (empty($this->model->{$this->attribute})) {
            $startVal = new \yii\web\JsExpression('null');
        } else {
            $startVal = $this->model->{$this->attribute};
        }

        //placeholder
        echo Html::activeHiddenInput($this->model, $this->attribute);
        echo Html::tag('div', '', ['id' => $elementId.'-editor']);

        //register js code
        $view->registerJs(
<<<JS
var {$widgetId} = new JSONEditor(document.getElementById('{$elementId}-editor'),{
    "schema": {$schema},
    "theme": "bootstrap3",
    "disable_collapse": true,
    "disable_edit_json": true,
    "disable_properties": true,
    "no_additional_properties": true,
    "startval": {$startVal}
});
document.getElementById('{$formId}').addEventListener('submit',function() {
    document.getElementById('{$elementId}').value = JSON.stringify({$widgetId}.getValue());
});
JS
, $view::POS_END);
        parent::run();
    }
}
?>
