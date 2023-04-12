<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Equipment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="equipment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ergo_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoice_number')->textInput() ?>

    <?= $form->field($model, 'invoice_date')->textInput() ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'borrowed_id')->textInput() ?>

    <?= $form->field($model, 'date_from')->textInput() ?>

    <?= $form->field($model, 'date_to')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
