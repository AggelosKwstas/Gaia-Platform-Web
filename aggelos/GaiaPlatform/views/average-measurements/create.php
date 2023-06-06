<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AverageMeasurements $model */

$this->title = Yii::t('app', 'Create Average Measurements');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Average Measurements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="average-measurements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
