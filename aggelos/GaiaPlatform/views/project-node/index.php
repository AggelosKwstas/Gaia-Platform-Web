<?php

use app\models\ProjectNode;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProjectNodeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Project Nodes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-node-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Project Node'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'project_id',
            'node_id',
            'created_at',
            'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProjectNode $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'project_id' => $model->project_id, 'node_id' => $model->node_id]);
                 }
            ],
        ],
    ]); ?>


</div>
