<?php

namespace floor12\settings\models;

use yii2mod\enum\helpers\BaseEnum;

class SettingType extends BaseEnum
{
    const STRING = 'string';
    const TEXT = 'text';
    const INTEGER = 'integer';
    const BOOLEAN = 'boolean';
    const COLOR = 'color';
    const FILE = 'file';
    const DROPDOWN = 'dropdown';
}