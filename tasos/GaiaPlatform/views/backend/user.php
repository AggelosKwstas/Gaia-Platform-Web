<?php

use app\helpers\Override\GridView;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
Yii::$app->setHomeUrl('@web/index.php?r=backend%2Findex');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-page kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h4 style="font-family: system-ui">Showing all users</h4>
        </div>
    </div>

    <div class="kt-portlet__body">
        <?php if (Yii::$app->user->identity->isAdmin) { ?>
        <?php } ?>
        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],
                'username',
                'email:email',
                'firstname',
                'lastname',
                [
                    'attribute' => 'gender_id',
                    'value' => "gender.pretty_name",
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => yii\helpers\ArrayHelper::map(app\models\pure\Gender::find()->orderBy("name asc")->all(), 'id', 'pretty_name'),
                    'filterWidgetOptions' => [
                        'theme' => Select2::THEME_BOOTSTRAP,
                        'options' => ['prompt' => '             '],
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'format' => 'raw'
                ],
                [
                    "attribute" => "date_created",
                    'filterType' => GridView::FILTER_DATE,
                    'filterWidgetOptions' => [
                        'readonly' => true,
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,
                            'autoclose' => true
                        ]
                    ],
                ],
                ['class' => 'yii\grid\ActionColumn',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'update') {
                            return Url::to(['user/update', 'id' => $model->id]);
                        }
                        if ($action === 'view') {
                            return Url::to(['user/view', 'id' => $model->id]);
                        }
                        if ($action === 'delete') {
                            return Url::to(['user/delete', 'id' => $model->id]);
                        }
                        return '#';
                    },
                    'buttons' => [
                        'delete' => function ($url, $model, $key) {
                            return Html::a('<i class="fa fa-trash"></i>', $url, [
                                'title' => Yii::t('yii', 'Delete'),
                                'data' => [
                                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                                'data-pjax' => '0',
                            ]);
                        }
                    ],
                ],
            ],
        ]); ?>

        <p class="mt-2">
            <?= Html::a('<i class="fa-solid fa-square-plus"></i> ' . Yii::t('app', 'Create User'), ['user/create'], ['class' => 'btn btn-primary']) ?>
        </p>
        <?php Pjax::end(); ?>

    </div>
</div>
