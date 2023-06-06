<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TimeInterval $model */

$this->title = Yii::t('app', 'Create Time Interval');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Time Intervals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-interval-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
