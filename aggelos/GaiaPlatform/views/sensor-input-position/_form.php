<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SensorInputPosition $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sensor-input-position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sensor_id')->textInput() ?>

    <?= $form->field($model, 'input_position_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
