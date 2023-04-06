<?php

/** @var yii\web\View $this */

/** @var yii\bootstrap5\ActiveForm $form */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><b><i class="fa fa-right-to-bracket "></i>&nbsp;&nbsp;Login to private
                        area</b></h1>
            </div>
            <hr>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'user']
            ]); ?>

            <?= $form->field($model, 'username',
                [
                    'inputOptions' => [
                        'class' => 'form-control form-control-user',
                        'placeholder' => 'Enter Username'
                    ]
                ]
            )->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password',
                [
                    'inputOptions' => [
                        'class' => 'form-control form-control-user',
                        'placeholder' => 'Enter Password'
                    ]
                ]
            )->passwordInput() ?>
            <hr>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>