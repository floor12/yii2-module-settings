<?php
/**
 * @var $this View
 */

use floor12\settings\Settings;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

?>

<h2><?= Yii::t('app', 'Site settings') ?></h2>


<?php $form = ActiveForm::begin([
    'id' => 'settings-form',
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]) ?>

<div class="row">
    <div class="col-md-4">
        <div class="setting-row">
            <label><?= Yii::t('app', 'Enable selling:') ?></label>
            <?= Html::checkbox('SettingsForm[values][' . Settings::ENABLE_SELLING . ']',
                Settings::get(Settings::ENABLE_SELLING)) ?>
        </div>
    </div>
</div>

<div class="settings-control-block">
    <a href="/admin/settings/index" type="reset" class="btn btn-primary">reset</a>
    <button type="submit" class="btn btn-primary" disabled>
        <?= Yii::t('app', 'Save') ?>
    </button>
</div>

<?php ActiveForm::end() ?>
