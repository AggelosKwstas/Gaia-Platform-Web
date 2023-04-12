<?php

use app\helpers\Override\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\pure\CustomerLanguage */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t("app", "Foreign Languages")." - $customer->fullname ";
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>
<?php $this->beginBlock('customer-foreign-language-block'); ?>
<div class="customer-foreign-language-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'english_diploma_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\EnglishDiploma::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>
    <?= $form->field($model, 'other_languages')->textarea(['maxlength' => true,'rows'=>2]) ?>



    <div class="text-danger">
        <?= Html::errorSummary($model, ['encode' => false]) ?>
    </div

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->endBlock() ?>
