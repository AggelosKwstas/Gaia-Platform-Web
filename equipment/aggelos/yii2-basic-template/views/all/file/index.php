<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Files');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-index">

    <div class=" kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="la la-adjust"></i>
					</span>
                <h3 class="kt-portlet__head-title">
                    <?= Html::encode($this->title) ?>

                </h3>

            </div>

        </div>
        <div class="kt-portlet__body">


            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    ['attribute' => 'customer_id',
                        "value" => function ($model) {
                            if ($model->customer_id)
                                return \app\models\pure\Customer::findOne($model->customer_id)->getFullname();
                        },
                        'width' => '200px',
                        'filter' => ArrayHelper::map(\app\models\pure\Customer::find()->orderBy("lastname asc")->all(), 'id', "fullname"),
                        'filterType' => GridView::FILTER_SELECT2,
                        'filterWidgetOptions' => [
                            'options' => ['prompt' => ''],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ],
                    ],

                   ["attribute"=>"title",
                   "format"=>"raw",
                   "value"=>function($model){
                return Html::a($model->name,$model->getFullFilePath(),['target' => '_blank', 'data-pjax' => 0] );
                   }],
                    'size',
                    'file_type',
                    ["attribute" => "date_created",
                        'filterType' => GridView::FILTER_DATE,
                        'filterWidgetOptions' => [
                            'readonly' => true,

                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                                'autoclose' => true
                            ]],
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {delete}'
                        ]
                ],
            ]); ?>

            <?php Pjax::end(); ?>

        </div>
    </div>
</div>
