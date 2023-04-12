<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\EquipmentImage $model */

$this->title = Yii::t('app', 'Create Equipment Image');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipment Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
