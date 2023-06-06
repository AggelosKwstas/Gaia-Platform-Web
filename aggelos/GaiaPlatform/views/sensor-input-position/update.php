<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SensorInputPosition $model */

$this->title = Yii::t('app', 'Update Sensor Input Position: {name}', [
    'name' => $model->sensor_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sensor Input Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sensor_id, 'url' => ['view', 'sensor_id' => $model->sensor_id, 'input_position_id' => $model->input_position_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sensor-input-position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
