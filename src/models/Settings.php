<?php

namespace floor12\settings\models;

use floor12\files\components\FileBehaviour;
use floor12\files\models\File;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $value
 */
class Settings extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'settings';
    }

    public static function get(string $key): ?string
    {
        if ($model = self::findOne($key)) {
            return $model->value;
        }
        return null;
    }

    public static function set(string $key, string $value): bool
    {
        if (!($model = self::findOne($key))) {
            $model = new Settings();
            $model->id = $key;
        }
        self::checkFileAndUpdate($key, $value, $model->value);
        $model->value = $value;
        return $model->save();
    }

    public static function fieldName(string $key): string
    {
        return 'SettingsForm[values][' . $key . ']';
    }

    public function behaviors()
    {
        return [
            'files' => [
                'class' => FileBehaviour::class,
                'attributes' => ['value']
            ]
        ];
    }

    private static function checkFileAndUpdate($key, $value, $oldValue)
    {
        foreach (\Yii::$app->getModule('settings')->settings as $group) {
            foreach ($group as $settingKey => $settingType) {
                if ($settingKey == $key && $settingType == SettingType::FILE && $value) {
                    $file = File::findOne(['id' => (int)$value]);
                    $file->object_id = $value;
                    $file->save();
                }
                if ($value != $oldValue && $settingKey == $key && $settingType == SettingType::FILE && $oldValue) {
                    $file = File::findOne(['id' => (int)$oldValue]);
                    $file->delete();
                }
            }
        }
    }
}
