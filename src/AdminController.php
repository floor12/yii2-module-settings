<?php

namespace floor12\settings;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class AdminController extends Controller
{
    public function init()
    {
        $this->layout = Yii::$app->getModule('settings')->adminLayout;
        parent::init();
    }

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => Yii::$app->getModule('settings')->administratorRole,
                    ]
                ]
            ],
        ];
    }

    public function actionIndex()
    {
        $settingsForm = new SettingsForm();
        if ($settingsForm->load(Yii::$app->request->post())) {
            $settingsForm->save();
        }
        return $this->render('@vendor/floor12/yii2-module-settings/views/index');
    }
}