<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SensorInputPosition $model */

$this->title = Yii::t('app', 'Create Sensor Input Position');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sensor Input Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-input-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
