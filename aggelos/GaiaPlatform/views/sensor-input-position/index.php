<?php

use app\models\SensorInputPosition;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SensorInputPositionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Sensor Input Positions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-input-position-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Sensor Input Position'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sensor_id',
            'input_position_id',
            'created_at',
            'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SensorInputPosition $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'sensor_id' => $model->sensor_id, 'input_position_id' => $model->input_position_id]);
                 }
            ],
        ],
    ]); ?>


</div>
