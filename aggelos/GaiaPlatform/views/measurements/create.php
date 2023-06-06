<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Measurements $model */

$this->title = Yii::t('app', 'Create Measurements');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Measurements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="measurements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
