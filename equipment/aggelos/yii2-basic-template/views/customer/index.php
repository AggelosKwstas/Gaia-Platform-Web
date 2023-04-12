<?php

use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customers');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="index-page kt-portlet overflow-x-hidden">
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

    <div class="kt-portlet__body customer-search">

        <p>
            <?= Html::a(
                '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'),
                ['create'],
                ['class' => 'btn btn-primary']) ?>
        </p>

        <?php Pjax::begin(); ?>
        <?php $export = new \app\helpers\ExportCustomer($dataProvider); ?>
        <div class="float-right pb-1"><?= $export->getMenuWidget() ?></div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                ['class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width: 8.7%'],
                    'buttons' => [
                        'view' => function ($url, $model) {

                            return Html::a('<i class="fas fa-eye"></i>', $url, ['value' => Url::to($url), 'class' => ' primary-color pr-1', 'target' => "_blank"]);
                        },
                        'update' => function ($url, $model) {

                            return Html::a('<i class="fas fa-pencil-alt"></i>', $url, ['value' => Url::to($url), 'class' => ' primary-color pr-1', 'target' => "_blank"]);
                        },

                    ],
                ],

                ["attribute" => 'fullname',
                    "value" => function ($model) {
                        return "<span class='nowrap'>$model->fullname</span>";
                    },
                    //         'width' => '200px',
                    "format" => "raw"],
                ["attribute" => 'county_residence_id',
                    "value" => function ($model) {
                        if ($model->county_residence_id)
                            return $model->countyResidence->title;

                    },
                    'width' => '200px',
                    'filter' => ArrayHelper::map(\app\models\pure\CountyResidence::find()->orderBy("name asc")->all(), 'id', "title"),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],

                'city_residence',

                ['attribute' => 'gender_id',
                    "value" => "gender.pretty_name",
                    //         'width' => '200px',
                    'filter' => ArrayHelper::map(\app\models\pure\Gender::find()->orderBy("name asc")->all(), 'id', "pretty_name"),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'car_diploma_id',
                    "value" => "carDiploma.title",
                    //         'width' => '200px',
                    'filter' => ArrayHelper::map(\app\models\pure\CarDiploma::find()->orderBy("name asc")->all(), 'id', "title"),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'military_duties',
                    "value" => function ($model) {
                        return \app\models\Model::findBooleanNA($model->military_duties);
                    },
                    //         'width' => '200px',
                    'filter' => \app\models\Model::getBooleanArrayNA(),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'study_degree_id',
                    "value" => function ($model) {
                        if ($model->study_degree_id)
                            return \app\models\pure\StudyDegree::findOne($model->study_degree_id)->title;
                    },
                    //         'width' => '200px',
                    'filter' => ArrayHelper::map(\app\models\pure\StudyDegree::find()->orderBy("name asc")->all(), 'id', "title"),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'speciality_id',
                    "value" => function ($model) {
                        if ($model->speciality_id)
                            return \app\models\pure\Speciality::findOne($model->speciality_id)->title;
                    },
                    //         'width' => '200px',
                    'filter' => ArrayHelper::map(\app\models\pure\Speciality::find()->orderBy("name asc")->all(), 'id', "title"),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],

                ['attribute' => 'skill_id',
                    "value" => function ($model) {

                        if ($model->skill_id)
                            return \app\models\pure\Skill::findOne(["id"=>$model->skill_id])->title;
                    },
                    //         'width' => '200px',
                    'filter' => ArrayHelper::map(\app\models\pure\Skill::find()->orderBy("name asc")->all(), 'id', "title"),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'english_diploma_id',
                    "value" => function ($model) {
                        if ($model->english_diploma_id)
                            return \app\models\pure\EnglishDiploma::findOne($model->english_diploma_id)->title;
                    },
                    //         'width' => '200px',
                    'filter' => ArrayHelper::map(\app\models\pure\EnglishDiploma::find()->orderBy("name asc")->all(), 'id', "title"),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'pc_autocad_id',
                    "value" => function ($model) {
                        if ($model->pc_autocad_id)
                            return \app\models\pure\PCAutoCad::findOne($model->pc_autocad_id)->title;
                    },
                    //         'width' => '200px',
                    'filter' => ArrayHelper::map(\app\models\pure\PCAutoCad::find()->orderBy("name asc")->all(), 'id', "title"),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'last_job_title_id',
                    "value" => function ($model) {
                        if ($model->last_job_title_id)
                            return \app\models\pure\JobTitle::findOne($model->last_job_title_id)->title;
                    },
                    //         'width' => '200px',
                    'filter' => ArrayHelper::map(\app\models\pure\JobTitle::find()->orderBy("name asc")->all(), 'id', "title"),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'knows_photovoltaic',
                    "value" => function ($model) {
                        return \app\models\Model::findBoolean($model->knows_photovoltaic);
                    },
                    //         'width' => '200px',
                    'filter' => \app\models\Model::getBooleanArray(),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'knows_current',
                    "value" => function ($model) {
                        return \app\models\Model::findBoolean($model->knows_current);
                    },
                    //         'width' => '200px',
                    'filter' => \app\models\Model::getBooleanArray(),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'complete_interview',
                    "value" => function ($model) {
                        return \app\models\Model::findBoolean($model->complete_interview);
                    },
                    //         'width' => '200px',
                    'filter' => \app\models\Model::getBooleanArray(),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],
                ['attribute' => 'phone_communication',
                    "value" => function ($model) {
                        return \app\models\Model::findBoolean($model->phone_communication);
                    },
                    //         'width' => '200px',
                    'filter' => \app\models\Model::getBooleanArray(),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ],
                ],


                ["attribute" => "date_interview",
                    'filterType' => GridView::FILTER_DATE,
                    'filterWidgetOptions' => [
                        'readonly' => true,

                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,
                            'autoclose' => true
                        ]],
                ],

                ["attribute" => "date_biography_arrival",
                    'filterType' => GridView::FILTER_DATE,
                    'filterWidgetOptions' => [
                        'readonly' => true,

                        'pluginOptions' => [
                            'format' => 'yyyy-mm',
                            'todayHighlight' => false,
                            'startView' => 'year',
                            'minViewMode'=>'months',
                            'autoclose' => true
                        ]],
                ],




//                'date_born',
//                'complete_interview',
//                'familyStatus.title',
//            [
//                'attribute' => 'ladder_id',
//                "value" => function ($model) {
//                    if ($model->ladder_id)
//                        return \app\models\all\Ladder::findOne($model->ladder_id)->prettyName;
//                },
//        //         'width' => '200px',
//                'vAlign' => 'middle',
//
//                'filter' => ArrayHelper::map(\app\models\all\Ladder::find()->orderBy("name asc")->all(), 'id', function ($model) {
//                    return $model->prettyName;
//                }),
//                'filterType' => GridView::FILTER_SELECT2,
//                'filterWidgetOptions' => [
//                    'options' => ['prompt' => ''],
//                    'pluginOptions' => [
//                        'allowClear' => true,
//
//                    ],
//                ],
//            ],
                //'home_phone',
                //'phone',

                //'gender_id',
                //'car_diploma_id',
                //'military_duties',
                //'field1',
                //'field2',
                //'field3',
                //'date_created',
                //'date_updated',

            ],
        ]); ?>

        <?php Pjax::end(); ?>
    </div>
</div>
