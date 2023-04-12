<?php

use app\helpers\Override\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\pure\CustomerComputerSkills */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t("app", "Computer Skills")." - $customer->fullname ";
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>
<?php $this->beginBlock('customer-computer-skills-block'); ?>
<div class="customer-degree-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'pc_general_knowledge_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\PCGeneralKnowledge::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>

    <?=
    $form->field($model, 'pc_autocad_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\PCAutoCad::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>
    <?=
    $form->field($model, 'pc_pvsyst_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\PCPvsyst::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>
    <?=
    $form->field($model, 'pc_erp_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\PCERP::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>

    <?= $form->field($model, 'field1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field3')->textInput(['maxlength' => true]) ?>


    <div class="text-danger">
        <?= Html::errorSummary($model, ['encode' => false]) ?>
    </div

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->endBlock() ?>
