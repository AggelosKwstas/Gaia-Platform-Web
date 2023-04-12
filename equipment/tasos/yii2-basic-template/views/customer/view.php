<?php

use yii\bootstrap4\Tabs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;


/**
 * @var yii\web\View $this
 * @var app\models\pure\Customer $model
 */


$copyParams = $model->attributes;

$this->title = Yii::t('app', 'Customer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->getFullname(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="giiant-crud patient-tab-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('app', 'Customer') ?>
        <small>
            <?= Html::encode($model->getFullname() . " [{$model->id}]") ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
                '<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'),
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-info']) ?>



            <?= Html::a(
                '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'),
                ['create'],
                ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
                . Yii::t('app', 'Full list'), ['index'], ['class' => 'btn btn-default']) ?>
        </div>

    </div>

    <hr/>


    <div class="" id="accordionFullPatient">
        <?= (new \app\helpers\detail\CustomerDetail($model))->getWidget() ?>
        <?= (new \app\helpers\detail\CustomerDegreeDetail($model))->getWidget() ?>
        <?= (new \app\helpers\detail\CustomerLanguageDetail($model))->getWidget() ?>
        <?= (new \app\helpers\detail\CustomerComputerSkills($model))->getWidget() ?>
        <?= (new \app\helpers\detail\CustomerProfessionalExperienceDetail($model))->getWidget() ?>
        <?= (new \app\helpers\detail\CustomerInterviewDetail($model))->getWidget() ?>
    </div>
</div>

