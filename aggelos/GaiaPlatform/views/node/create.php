<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Node $model */

$this->title = Yii::t('app', 'Create Node');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
