<?php

use app\helpers\Override\ActiveForm;
use app\models\pure\File;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\pure\CustomerInterview */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t("app", "Degree") . " - $customer->fullname ";
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>
<?php $this->beginBlock('customer-interview-block'); ?>
<div class="customer-interview-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'complete_interview')->booleanDropDownList(['maxlength' => true]) ?>
    <?= $form->field($model, 'date_interview')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'options' => ['placeholder' => ' '],
        'removeButton' => false,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => false,
            'startView' => 'year',
        ]
    ])
    ?>

    <?= $form->field($model, 'date_biography_arrival')->widget(DatePicker::className(), [
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'options' => ['placeholder' => ' '],
        'removeButton' => false,
        'pluginOptions' => [
            'format' => 'yyyy-mm',
            'todayHighlight' => false,
            'startView' => 'year',
            'minViewMode'=>'months',
        ]
    ])
    ?>


    <?= $form->field($model, 'phone_communication')->booleanDropDownList(['maxlength' => true]) ?>

    <?= $form->field($model, 'asking_job')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comments')->textarea(['maxlength' => true, "rows" => 6]) ?>
    <?= $form->field($model, 'comments_2')->textarea(['maxlength' => true, "rows" => 6]) ?>
    <?= $form->field($model, 'comments_3')->textarea(['maxlength' => true, "rows" => 6]) ?>
    <?php
    $files = $other["files"];
    $initial_preview = [];

    $initial_config = [];

    foreach ($files as $file) {
        $initial_preview[] = Html::a($file->title, $file->getFullFilePath());

        $initial_config[] = ['caption' => $file->title, 'size' => $file->size,
            "key" => $file->id
        ];


    }


    echo $form->field(new File(), 'files_input')->widget(FileInput::classname(), [
        'options' => ['accept' => '*',
            'multiple' => true,],
        "language" => Yii::$app->language,

        'pluginOptions' => [
            'initialPreview' => $initial_preview,
            'deleteUrl' => "index.php?r=customer/delete-biography-file&customer_id=$customer->id",
            'initialCaption' => "",
            'showRemove' => false,
            'showUpload' => false,
            'overwriteInitial'=>false,
            'initialPreviewConfig' =>

                $initial_config

        ]]);
    ?>


    <div class="text-danger">
        <?= Html::errorSummary($model, ['encode' => false]) ?>
    </div

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->endBlock() ?>
