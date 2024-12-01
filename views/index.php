<?php
/**
 * @var $this View
 */

use floor12\settings\assets\AdminSettingsAsset;
use floor12\settings\widgets\SettingInputWidget;
use yii\web\View;
use yii\widgets\ActiveForm;

AdminSettingsAsset::register($this);

$this->title = 'Настройки';
?>

<h1><?=$this->title?></h1>

<br>

<?php $form = ActiveForm::begin([
    'id' => 'f12-settings-form',
    'enableClientValidation' => false,
    'enableAjaxValidation' => false,
]) ?>

<?php foreach ($settings as $settingGroup => $setting) { ?>
    <fieldset>
        <label><h3><?= $settingGroup ?></h3></label>
        <div class="row">
            <?php foreach ($setting as $name => $type)
                echo SettingInputWidget::widget([
                    'form' => $form,
                    'name' => $name,
                    'type' => $type,
                ]); ?>
        </div>
    </fieldset>
<?php } ?>

<div class="f12-setting-submit-block">
    <a href="" type="reset" class="btn btn-primary">Сбросить</a>
    <button type="submit" class="btn btn-primary">
        <?= Yii::t('app', 'Сохранить') ?>
    </button>
</div>

<?php ActiveForm::end() ?>
