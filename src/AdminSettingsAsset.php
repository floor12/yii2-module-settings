<?php

namespace floor12\settings;

use yii\web\AssetBundle;

class TextCounterWidgetAsset extends AssetBundle
{
    public $sourcePath = '@vendor/floor12/yii2-module-settings/assets';
    public $css = [
        'f12-settings.css',
    ];
    public $js = [
        'f12-settings.js',
    ];
}