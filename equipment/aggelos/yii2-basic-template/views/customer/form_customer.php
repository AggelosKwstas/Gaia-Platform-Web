<?php

use app\helpers\Override\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\pure\Customer */
/* @var $form yii\widgets\ActiveForm */
$appender = "";
if ($model->id) {
    $appender=" - $customer->fullname ";
}
$this->title=Yii::t("app","Profile").$appender;
$this->params['breadcrumbs'][] = ['label' =>$this->title];

?>
<?php $this->beginBlock('customer-block'); ?>
<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?php
    if (!$model->date_born) {

        $model->date_born =   '1900-01-01';
    }
    echo $form->field($model, 'date_born')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'options' => ['placeholder' => ' '],
        'removeButton' => false,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => false,
            'startView'=>'year',
        ]
    ])
    ?>
    <?=
    $form->field($model, 'family_status_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\FamilyStatus::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>


    <?= $form->field($model, 'home_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?=
    $form->field($model, 'county_residence_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\CountyResidence::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>

    <?= $form->field($model, 'city_residence')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'gender_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\Gender::find()->orderBy("name asc")->all(), 'id', 'pretty_name'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>

    <?=
    $form->field($model, 'car_diploma_id')->select2(
        \yii\helpers\ArrayHelper::map(app\models\pure\CarDiploma::find()->orderBy("name asc")->all(), 'id', 'prettyName'),
        [
            'prompt' => Yii::t('app', 'Select'),
        ]
    ); ?>

    <?=
    $form->field($model, 'military_duties')->dropDownList(
        \app\models\Model::getBooleanArrayNA()
    )
    ?>

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
<?php $this->endBlock()?>
