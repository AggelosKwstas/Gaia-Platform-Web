<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TimeType $model */

$this->title = Yii::t('app', 'Create Time Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Time Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="time-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
