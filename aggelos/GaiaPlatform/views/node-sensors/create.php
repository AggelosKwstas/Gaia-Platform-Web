<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NodeSensors $model */

$this->title = Yii::t('app', 'Create Node Sensors');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Node Sensors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-sensors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
