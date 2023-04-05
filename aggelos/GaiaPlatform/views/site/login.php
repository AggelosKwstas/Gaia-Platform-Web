<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
    <div class="col-7">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><b>Welcome Back!</b></h1>
            </div>
            <hr>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class'=>'user']
            ]); ?>

            <?= $form->field($model, 'username',
                [
                    'inputOptions'=>[
                        'class'=>'form-control form-control-user',
                        'placeholder'=>'Enter Username'
                    ]
                ]
            )->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password',
                [
                    'inputOptions'=>[
                        'class'=>'form-control form-control-user',
                        'placeholder'=>'Enter Password'
                    ]
                ]
            )->passwordInput() ?>
            <?= $form->field($model, 'rememberMe',
                [
                    'inputOptions'=>[
                        'class'=>''
                    ]
                ]
            )->checkbox() ?>
            <hr>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end()?>
            <hr>
            <div class="text-center">
                <a class="small" href="<?php echo \yii\helpers\Url::to(['site/forgot-password'])?>">Forgot Password?</a>
            </div>
        </div>
    </div>
