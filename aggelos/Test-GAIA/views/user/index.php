<?php

use app\helpers\Override\GridView;
use kartik\select2\Select2;
use yii\helpers\Html;
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

            <h3 class="kt-portlet__head-title">
                <?= Html::encode($this->title) ?>

            </h3>

        </div>

    </div>

    <div class="kt-portlet__body">
        <?php if (Yii::$app->user->identity->isAdmin) { ?>
            <p>
                <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-primary']) ?>
            </p>
        <?php } ?>
        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn'],

//            'id',

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


                //'user_type_id',
                //'token',
                //'country_id',
                //'auth_key',
                //'password_hash',
                //'password_reset_token',

                //'status',
                //'date_created',
                //'date_updated',
                //'verification_token',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

        <?php Pjax::end(); ?>

    </div>
</div>
