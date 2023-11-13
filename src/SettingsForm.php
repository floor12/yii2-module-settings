<?php

namespace floor12\settings;

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

        return true;
    }
}