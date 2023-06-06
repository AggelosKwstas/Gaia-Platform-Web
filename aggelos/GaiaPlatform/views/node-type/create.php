<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NodeType $model */

$this->title = Yii::t('app', 'Create Node Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Node Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="node-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
