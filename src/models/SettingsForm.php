<?php

namespace floor12\settings\models;

use floor12\files\models\File;
use yii\base\Model;

class SettingsForm extends Model
{

    public array $values = [];

    public function rules(): array
    {
        return [
            ['values', 'required'],
            ['values', 'each', 'rule' => ['string']],
        ];
    }

    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        foreach ($this->values as $key => $value) {
            Settings::set($key, $value);
        }

        $this->cleanEmptyFiles();

        return true;
    }

    private function cleanEmptyFiles()
    {
        foreach (File::find()->where([
            'class' => Settings::class,
            'object_id' => '0'
        ])->all() as $file) {
            $file->delete();
        }
    }
}