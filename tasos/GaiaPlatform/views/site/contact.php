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
<!---->
<!--<section class="contact-layout">-->
<!--    <div class="container" style="text-align: center">-->
<!---->
<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    --><?php //if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
<!---->
<!--        <div class="alert alert-success">-->
<!--            Thank you for contacting us. We will respond to you as soon as possible.-->
<!--        </div>-->
<!---->
<!--        <p>-->
<!--            Note that if you turn on the Yii debugger, you should be able-->
<!--            to view the mail message on the mail panel of the debugger.-->
<!--            --><?php //if (Yii::$app->mailer->useFileTransport): ?>
<!--                Because the application is in development mode, the email is not sent but saved as-->
<!--                a file under <code>--><?php //= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?><!--</code>.-->
<!--                Please configure the <code>useFileTransport</code> property of the <code>mail</code>-->
<!--                application component to be false to enable email sending.-->
<!--            --><?php //endif; ?>
<!--        </p>-->
<!---->
<!--    --><?php //else: ?>
<!---->
<!--        <p>-->
<!--            If you have business inquiries or other questions, please fill out the following form to contact us.-->
<!--            Thank you.-->
<!--        </p>-->
<!--        <div class="login-wrap p-4 p-md-5">-->
<!--        <div class="row">-->
<!--            <div class="col ">-->
<!---->
<!--                --><?php //$form = ActiveForm::begin(['id' => 'contact-form']); ?>
<!---->
<!--<!--                    -->--><?php ////= $form->field($model, 'name', [
////                        'inputOptions' => [
////                            'class' => 'form-control form-control-user radius-contact',
////                            'placeholder' => 'Enter your full name'
////
////                        ]
////                    ])->textInput(['autofocus' => true]) ?>
<!---->
<!--<!--                    -->--><?php ////= $form->field($model, 'email',
////                        [
////                            'inputOptions' => [
////                                'class' => 'form-control form-control-user radius-contact',
////                                'placeholder' => 'Enter your email'
////                            ]
////                        ]) ?>
<!---->
<!--                    --><?php //= $form->field($model, 'subject',
//                        [
//                            'inputOptions' => [
//                                'class' => 'form-control form-control-user radius-contact',
//                                'placeholder' => 'Enter subject name'
//                            ]
//                        ]) ?>
<!---->
<!--                    --><?php //= $form->field($model, 'body',
//                        [
//                            'inputOptions' => [
//                                'class' => 'form-control form-control-user radius-contact',
//                                'placeholder' => 'Enter your comment'
//                            ]
//                        ])->textarea(['rows' => 6]) ?>
<!---->
<!--                    --><?php //= $form->field($model, 'verifyCode',[
//                        'inputOptions' => [
//                            'class' => 'form-control form-control-user radius-contact',
//                            'placeholder' => 'Prove you are not a robot'
//                        ]
//                    ])->widget(Captcha::class, [
//                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
//                    ]) ?>
<!---->
<!--                    <div class="form-group">-->
<!--                        --><?php //= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
<!--                    </div>-->
<!---->
<!--                --><?php //ActiveForm::end(); ?>
<!---->
<!--<!--            </div>-->-->
<!--        </div>-->
<!--        </div>-->
<!--    --><?php //endif; ?>
<!--</div>-->
<!--</section>-->
<!-- Created By CodingLab - www.codinglabweb.com -->

<div class="container-contact">
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
        </div>
        <div class="right-side">
            <div class="topic-text">Send us a message</div>
            <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>


                <?= $form->field($model, 'name', [
                    'inputOptions' => [
                        'class' => 'form-control form-control-user input-box',
                        'placeholder' => 'Enter your name'

                    ]
                ])->textInput(['autofocus' => true]) ?>
<!--                <div class="input-box">-->
<!--                    <input type="text" placeholder="Enter your name">-->
<!--                </div>-->

                <?= $form->field($model, 'email',
                [
                    'inputOptions' => [
                        'class' => 'form-control form-control-user input-box',
                        'placeholder' => 'Enter your email'
                    ]
                ]) ?>
<!--                <div class="input-box">-->
<!--                    <input type="text" placeholder="Enter your email">-->
<!--                </div>-->
            <?= $form->field($model, 'subject',
                [
                    'inputOptions' => [
                        'class' => 'form-control form-control-user input-box',
                        'placeholder' => 'Enter subject'
                    ]
                ]) ?>
<!--                <div class="input-box">-->
<!--                    <input type="text" placeholder="Enter your subject">-->
<!--                </div>-->
            <?= $form->field($model, 'body',
                [
                    'inputOptions' => [
                        'class' => 'form-control form-control-user radius-contact',
                        'placeholder' => 'Enter your comment'
                    ]
                ])->textarea(['rows' => 6]) ?>
<!--                <div class="input-box">-->
<!--                    <input type="text" placeholder="Enter your comment">-->
<!--                </div>-->
                <div class="input-box message-box">

                </div>
                <div class="button">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


