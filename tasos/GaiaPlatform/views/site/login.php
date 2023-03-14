<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="modal-dialog modal-dialog-centered" style="padding-top: 1%">
    <div class="modal-content">
        <h5 class="modal-title font-alt center-block" id="feedbackModalLabel" style="color: #5caa32;">Login to Private Area</h5>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'user']
        ]); ?>
        <div class="modal-body border-0 p-4">
            <form>
                <!-- Name input-->

            <?= $form->field($model, 'username', [
                'inputOptions' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Enter your username'

                ]
            ])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password', [
                'inputOptions' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Enter your password'
                ]
            ])->passwordInput() ?>

                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>

            </form>

        </div>

<!--<div class="site-login">-->
<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>Please fill out the following fields to login:</p>-->
<!---->
<!--    --><?php //$form = ActiveForm::begin([
//        'id' => 'login-form',
//        'layout' => 'horizontal',
//        'fieldConfig' => [
//            'template' => "{label}\n{input}\n{error}",
//            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
//            'inputOptions' => ['class' => 'col-lg-3 form-control'],
//            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
//        ],
//    ]); ?>
<!---->
<!--        --><?php //= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
<!---->
<!--        --><?php //= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--        --><?php //= $form->field($model, 'rememberMe')->checkbox([
//            'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
//        ]) ?>
<!---->
<!--        <div class="form-group">-->
<!--            <div class="offset-lg-1 col-lg-11">-->
<!--                --><?php //= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>
<!---->
<!--    <div class="offset-lg-1" style="color:#999;">-->
<!--        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>-->
<!--        To modify the username/password, please check out the code <code>app\models\User::$users</code>.-->
<!--    </div>-->
<!--</div>-->
