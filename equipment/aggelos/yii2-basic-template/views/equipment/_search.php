<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EquipmentSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="equipment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ergo_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'supplier') ?>

    <?= $form->field($model, 'invoice_number') ?>

    <?php // echo $form->field($model, 'invoice_date') ?>

    <?php // echo $form->field($model, 'serial_number') ?>

    <?php // echo $form->field($model, 'borrowed_id') ?>

    <?php // echo $form->field($model, 'date_from') ?>

    <?php // echo $form->field($model, 'date_to') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
