<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ProjectNode $model */

$this->title = Yii::t('app', 'Update Project Node: {name}', [
    'name' => $model->project_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Project Nodes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_id, 'url' => ['view', 'project_id' => $model->project_id, 'node_id' => $model->node_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="project-node-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
