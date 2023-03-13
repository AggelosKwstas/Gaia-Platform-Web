<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'user']
        ]); ?>
<!--        <div class="modal-header bg-white p-4">-->
<!--            <h5 class="modal-title font-alt" id="feedbackModalLabel" style="color: #5caa32">Login</h5>-->
<!--            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--        </div>-->

        <div class="modal-body border-0 p-4">
                <!-- Name input-->

            <?= $form->field($model, 'username', [
                'inputOptions' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Enter your username'

                ]
            ])->textInput(['autofocus' => true]) ?>
<!--                <div class="form-floating mb-3" >-->
<!--                    <input class="form-control" id="firstname" type="text" style="border-radius: 100px;" placeholder="Enter your firstname..." data-sb-validations="required" />-->
<!--                    <label for="firstname">Firstname</label>-->
<!--                    <div class="invalid-feedback" data-sb-feedback="firstname:required">Firstname is required.</div>-->
<!--                </div>-->

                <!--                    lastname-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="lastname" type="text" style="border-radius: 100px;" placeholder="Enter your lastname here..." style="height: 10rem" data-sb-validations="required" />
                    <label for="lastname">Lastname</label>
                    <div class="invalid-feedback" data-sb-feedback="lastname:required">Lastname is required.</div>
                </div>
                <!-- Email address input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="email" type="email" style="border-radius: 100px;" placeholder="name@example.com" data-sb-validations="required,email" />
                    <label for="email">Email address</label>
                    <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                </div>
                <!-- Phone number input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="phone" type="tel" style="border-radius: 100px;" placeholder="(123) 456-7890" data-sb-validations="required" />
                    <label for="phone">Phone number</label>
                    <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                </div>
            </form></div>

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
