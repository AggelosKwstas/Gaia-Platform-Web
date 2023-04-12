<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\EquipmentImage $model */

$this->title = Yii::t('app', 'Update Equipment Image: {name}', [
    'name' => $model->equipment_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipment Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->equipment_id, 'url' => ['view', 'equipment_id' => $model->equipment_id, 'equipment_image' => $model->equipment_image]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="equipment-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
