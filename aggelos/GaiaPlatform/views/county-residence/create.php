<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CountyResidence $model */

$this->title = Yii::t('app', 'Create County Residence');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'County Residences'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="county-residence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
