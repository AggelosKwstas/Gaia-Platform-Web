<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Sensor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sensor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_value')->textInput() ?>

    <?= $form->field($model, 'max_value')->textInput() ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hour_limit')->textInput() ?>

    <?= $form->field($model, 'eight_hours_limit')->textInput() ?>

    <?= $form->field($model, 'day_limit')->textInput() ?>

    <?= $form->field($model, 'month_limit')->textInput() ?>

    <?= $form->field($model, 'year_limit')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
