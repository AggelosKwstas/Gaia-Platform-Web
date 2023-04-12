<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-index">

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

    <p>
        <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'),
            ['create'],
            ['class' => 'btn btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'pretty_name',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
    </div>
</div>
