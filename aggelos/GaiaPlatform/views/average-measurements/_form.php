<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AverageMeasurements $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="average-measurements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'average_value')->textInput() ?>

    <?= $form->field($model, 'counter')->textInput() ?>

    <?= $form->field($model, 'time_interval_id')->textInput() ?>

    <?= $form->field($model, 'sensor_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
