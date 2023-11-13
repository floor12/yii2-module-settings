<?php

namespace floor12\settings;

use yii\filters\AccessControl;
use yii\web\Controller;

class SettingsController extends Controller
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
                        'roles' => [Role::ADMIN],
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
        return $this->render('index');
    }
}