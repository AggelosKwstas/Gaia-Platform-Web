<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\SensorInputPosition $model */

$this->title = $model->sensor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sensor Input Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sensor-input-position-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'sensor_id' => $model->sensor_id, 'input_position_id' => $model->input_position_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'sensor_id' => $model->sensor_id, 'input_position_id' => $model->input_position_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sensor_id',
            'input_position_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
