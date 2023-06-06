<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProjectNode $model */

$this->title = Yii::t('app', 'Create Project Node');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-node-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
