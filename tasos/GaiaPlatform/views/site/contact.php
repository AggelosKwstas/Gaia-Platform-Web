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

<section class="contact-layout">
    <div class="container" style="text-align: center">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>
        <div class="login-wrap p-4 p-md-5">
        <div class="row">
            <div class="col ">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name', [
                        'inputOptions' => [
                            'class' => 'form-control form-control-user radius-contact',
                            'placeholder' => 'Enter your full name'

                        ]
                    ])->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email',
                        [
                            'inputOptions' => [
                                'class' => 'form-control form-control-user radius-contact',
                                'placeholder' => 'Enter your email'
                            ]
                        ]) ?>

                    <?= $form->field($model, 'subject',
                        [
                            'inputOptions' => [
                                'class' => 'form-control form-control-user radius-contact',
                                'placeholder' => 'Enter subject name'
                            ]
                        ]) ?>

                    <?= $form->field($model, 'body',
                        [
                            'inputOptions' => [
                                'class' => 'form-control form-control-user radius-contact',
                                'placeholder' => 'Enter your comment'
                            ]
                        ])->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode',[
                        'inputOptions' => [
                            'class' => 'form-control form-control-user radius-contact',
                            'placeholder' => 'Prove you are not a robot'
                        ]
                    ])->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

<!--            </div>-->
        </div>
        </div>
    <?php endif; ?>
</div>
</section>

