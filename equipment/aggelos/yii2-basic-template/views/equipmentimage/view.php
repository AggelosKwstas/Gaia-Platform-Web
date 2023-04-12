<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\EquipmentImage $model */

$this->title = $model->equipment_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipment Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipment-image-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'equipment_id' => $model->equipment_id, 'equipment_image' => $model->equipment_image], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'equipment_id' => $model->equipment_id, 'equipment_image' => $model->equipment_image], [
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
            'equipment_id',
            'equipment_image',
        ],
    ]) ?>

</div>
