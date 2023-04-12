<?php

use app\models\EquipmentImage;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EquipmentImageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Equipment Images');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-image-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Equipment Image'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'equipment_id',
            'equipment_image',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, EquipmentImage $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'equipment_id' => $model->equipment_id, 'equipment_image' => $model->equipment_image]);
                 }
            ],
        ],
    ]); ?>


</div>
