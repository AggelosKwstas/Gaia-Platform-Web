<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contact';
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
                <div class="topic-text">Send us a message</div>
                <p>If you have any work from me or any types of quries related to my tutorial, you can send us message from here. It's our pleasure to help you.</p>
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name', [
                    'inputOptions' => [
                        'class' => 'form-control form-control-user input-box',
                        'style' => 'border-radius: 25px;',
                        'placeholder' => 'Enter your name'

                    ]
                ])->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email',
                    [
                        'inputOptions' => [
                            'class' => 'form-control form-control-user input-box',
                            'style' => 'border-radius: 25px;',
                            'placeholder' => 'Enter your email'
                        ]
                    ]) ?>

                <?= $form->field($model, 'subject',
                    [
                        'inputOptions' => [
                            'class' => 'form-control form-control-user input-box',
                            'style' => 'border-radius: 25px;',
                            'placeholder' => 'Enter subject'
                        ]
                    ]) ?>

                <?= $form->field($model, 'body',
                    [
                        'inputOptions' => [
                            'class' => 'form-control form-control-user radius-contact',
                            'style' => 'border-radius: 25px; width:80%',
                            'placeholder' => 'Enter your comment'
                        ]
                    ])->textarea(['rows' => 6]) ?>


<!--                <div class="input-box message-box">-->
<!---->
<!--                </div>-->
                <div class="button">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <!--                    </div>-->
            <!--                </div>-->

            <!--            <div class="col-12 col-lg-5">-->
            <!--                <img src="asset/libe.png">-->
            <!--            </div>-->
</section>
