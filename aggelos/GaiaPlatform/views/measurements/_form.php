<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Measurements $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="measurements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'sensor_id')->textInput() ?>

    <?= $form->field($model, 'value')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
