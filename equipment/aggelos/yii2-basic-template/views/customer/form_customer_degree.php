<?php

use app\helpers\Override\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\pure\CustomerDegree */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t("app", "Degree") . " - $customer->fullname ";
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>
<?php $this->beginBlock('customer-degree-block'); ?>
<div class="customer-degree-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'study_degree_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\StudyDegree::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>
    <?=
    $form->field($model, 'speciality_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\Speciality::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>
    <?=
    $form->field($model, 'master_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\Master::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>
    <?=
    $form->field($model, 'phd_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\Phd::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>
    <div class="text-danger">
        <?= Html::errorSummary($model, ['encode' => false]) ?>
    </div

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->endBlock() ?>
