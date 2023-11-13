<?php

namespace floor12\settings;


class Module extends \yii\base\Module
{

    public string $controllerNamespace = 'floor12\settings';

    /**
     * @var string Layout alias to use it admin controller
     */
    public string $adminLayout = '@vendor/floor12/yii2-module-settings/views/index';

    /**
     * @var string Role to access admin controller
     */
    public string $administratorRole = '@';
}
