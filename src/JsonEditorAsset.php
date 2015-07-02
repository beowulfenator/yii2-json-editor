<?php

namespace beowulfenator\JsonEditor;

use yii\web\AssetBundle;

class JsonEditorAsset extends AssetBundle {

    public $sourcePath = '@bower/json-editor/dist';

    public function registerAssetFiles($view)
    {
        if (YII_ENV_DEV) {
            $this->js[] = 'jsoneditor.js';
        } else {
            $this->js[] = 'jsoneditor.min.js';
        }
        parent::registerAssetFiles($view);
    }
}