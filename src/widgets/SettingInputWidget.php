<?php

namespace floor12\settings\widgets;

use floor12\files\components\FileInputWidget;
use floor12\files\models\File;
use floor12\settings\models\Settings;
use floor12\settings\models\SettingType;
use yii\base\Widget;
use yii\helpers\Html;

class SettingInputWidget extends Widget
{
    public $form;
    public $name;
    public $type;

    public function run()
    {
        $input = $class = 'col-md-6';
        $label = Html::label($this->name, $this->name);
        match ($this->type) {
            SettingType::STRING => $input = Html::input('text', $this->getName($this->name), Settings::get($this->name), ['class' => 'form-control']),
            SettingType::TEXT => $input = Html::textarea($this->getName($this->name), Settings::get($this->name), ['class' => 'form-control']),
            SettingType::DROPDOWN => $input = Html::dropDownList($this->getName($this->name), Settings::get($this->name), \Yii::$app->getModule('settings')->lists[$this->name] ?? [], ['class' => ' form-control']),
            SettingType::COLOR => $input = Html::input('text', $this->getName($this->name), Settings::get($this->name), ['class' => ' form-control', 'type' => 'color']),
            SettingType::FILE => $input = FileInputWidget::widget([
                'name' => $this->getName($this->name),
                'model' => new Settings(),
                'attribute' => 'value',
                'value' => File::findOne((int)Settings::get($this->name))
            ])
        };
        match ($this->type) {
            SettingType::DROPDOWN => $class = 'col-md-6',
            SettingType::STRING => $class = 'col-md-6',
            SettingType::TEXT => $class = 'col-md-6',
            SettingType::COLOR => $class = 'col-md-3',
            SettingType::FILE => $class = 'col-md-3'
        };;
        $data = Html::tag('div', $label . $input, ['class' => 'form-group']);
        return Html::tag('div', $data, ['class' => $class]);
    }

    private function getName(string $name)
    {
        return "SettingsForm[values][$name]";
    }

}