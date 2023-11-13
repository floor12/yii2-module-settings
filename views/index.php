<?php
/**
 * @var $this View
 */

use floor12\settings\AdminSettingsAsset;
use yii\web\View;
use yii\widgets\ActiveForm;

AdminSettingsAsset::register($this);

?>

<h2><?= Yii::t('app', 'Site settings') ?></h2>


<?php $form = ActiveForm::begin([
    'id' => 'f12-settings-form',
    'enableClientValidation' => false,
    'enableAjaxValidation' => false,
]) ?>

<?= $this->render(Yii::$app->getModule('settings')->settingsMainView, ['form' => $form]) ?>

<div class="f12-setting-submit-block">
    <a href="" type="reset" class="btn btn-primary">reset</a>
    <button type="submit" class="btn btn-primary">
        <?= Yii::t('app', 'Save') ?>
    </button>
</div>

<?php ActiveForm::end() ?>
