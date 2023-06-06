<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\InputPosition $model */

$this->title = Yii::t('app', 'Create Input Position');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Input Positions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="input-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
