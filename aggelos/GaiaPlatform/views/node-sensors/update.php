<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NodeSensors $model */

$this->title = Yii::t('app', 'Update Node Sensors: {name}', [
    'name' => $model->sensor_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Node Sensors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sensor_id, 'url' => ['view', 'sensor_id' => $model->sensor_id, 'node_id' => $model->node_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="node-sensors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
