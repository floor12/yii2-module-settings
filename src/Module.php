<?php

namespace floor12\settings;


class Module extends \yii\base\Module
{

    public $controllerNamespace = 'floor12\settings';

    /**
     * @var string Layout alias to use it admin controller
     */
    public string $adminLayout = '@app/views/layouts/main';
    public string $settingsMainView = '@app/views/settings/_index';

    /**
     * @var string Role to access admin controller
     */
    public array $administratorRole = ['@'];
}
