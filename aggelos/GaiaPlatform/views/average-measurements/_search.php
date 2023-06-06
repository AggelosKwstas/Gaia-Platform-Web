<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AverageMeasurementsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="average-measurements-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'timestamp') ?>

    <?= $form->field($model, 'average_value') ?>

    <?= $form->field($model, 'counter') ?>

    <?= $form->field($model, 'time_interval_id') ?>

    <?php // echo $form->field($model, 'sensor_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
