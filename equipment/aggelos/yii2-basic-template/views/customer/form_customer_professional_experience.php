<?php

use app\helpers\Override\ActiveForm;
use app\models\pure\CustomerProfessionalExperienceSkills;
use kartik\select2\Select2;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\pure\CustomerLanguage */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t("app", "Professional Experience") . " - $customer->fullname ";
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>
<?php $this->beginBlock('customer-professional-experience-block'); ?>
<div class="customer-professional-experience-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'last_job_title_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\JobTitle::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>

    <div class="form-group field-customerprofessionalexperienceskills-skill_id ">
        <label class="control-label" for="customerprofessionalexperienceskills-skill_id"><?= Yii::t("app","Skills")?></label>


        <?php
        $data = [];
        if (isset($other["skills"]) && $other["skills"]) {
            foreach ($other["skills"] as $skill) {
                $data[] = $skill->skill_id;
            }
        }



        echo Select2::widget([
            'name' => 'CustomerProfessionalExperienceSkills[skill_id]',
            'value' => $data,
            'data' => \yii\helpers\ArrayHelper::map(app\models\pure\Skill::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
            'options' => ['multiple' => true, 'placeholder' => Yii::t('app', 'Select'),]
        ]); ?>

        <div class="help-block"></div>
    </div>
    <?= $form->field($model, 'last_company_worked')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'knows_photovoltaic')->booleanDropDownList(['maxlength' => true]) ?>

    <?= $form->field($model, 'knows_current')->booleanDropDownList(['maxlength' => true]) ?>


    <div class="text-danger">
        <?= Html::errorSummary($model, ['encode' => false]) ?>
    </div

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->endBlock() ?>
