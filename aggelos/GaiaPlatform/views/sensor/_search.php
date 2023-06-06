<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SensorSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sensor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'min_value') ?>

    <?= $form->field($model, 'max_value') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'hour_limit') ?>

    <?php // echo $form->field($model, 'eight_hours_limit') ?>

    <?php // echo $form->field($model, 'day_limit') ?>

    <?php // echo $form->field($model, 'month_limit') ?>

    <?php // echo $form->field($model, 'year_limit') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
