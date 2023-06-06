<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Measurements $model */

$this->title = Yii::t('app', 'Update Measurements: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Measurements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'timestamp' => $model->timestamp]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="measurements-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
