<?php

use app\models\NodeSensors;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NodeSensorsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Node Sensors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-sensors-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Node Sensors'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sensor_id',
            'node_id',
            'created_at',
            'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NodeSensors $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'sensor_id' => $model->sensor_id, 'node_id' => $model->node_id]);
                 }
            ],
        ],
    ]); ?>


</div>
