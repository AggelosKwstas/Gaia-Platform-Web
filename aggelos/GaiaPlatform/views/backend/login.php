<?php

/** @var yii\web\View $this */

/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>



<section class="contact-bg">
    <!--        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">-->
    <!--            <div class="col-12 col-lg-7">-->
    <div class="container-contact bg-light">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Science and Technology Park of Epirus, University Campus</div>
                    <div class="text-two">P.C. 45 110, Ioannina, Greece</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+30 26515 00012</div>
                </div>
                <div class="fax details">
                    <i class="fas fa-fax"></i>
                    <div class="topic">Fax</div>
                    <div class="text-one">+30 26510 40637</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">info@neuronenergy.com</div>
                </div>
                <div class="email details">
                    <a href="https://www.neuronenergy.com/">
                        <i class="fa-solid fa-globe"></i>
                    </a>
                    <div class="topic">Website</div>
                    <div class="text-one">www.neuronenergy.com</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Login to private area</div>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'user']
                ]); ?>

                <?= $form->field($model, 'username',
                    [
                        'inputOptions' => [
                            'class' => 'form-control form-control-user input-box',
                            'style' => 'border-radius: 25px; width: 40%',
                            'placeholder' => 'Enter Username'
                        ]
                    ]
                )->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password',
                    [
                        'inputOptions' => [
                            'class' => 'form-control form-control-user input-box',
                            'style' => 'border-radius: 25px; width: 40%',
                            'placeholder' => 'Enter Password'
                        ]
                    ]
                )->passwordInput() ?>

                <!--                <hr>-->
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
                <?php ActiveForm::end() ?>
            </div>
            <!--                    </div>-->
            <!--                </div>-->

            <!--            <div class="col-12 col-lg-5">-->
            <!--                <img src="asset/libe.png">-->
            <!--            </div>-->
</section>