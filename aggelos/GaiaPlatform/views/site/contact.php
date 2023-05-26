<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->params['breadcrumbs'][] = $this->title;
?>

<title>GAIA Platform - Contact</title>
<section class="contact-bg">
    <div class="container-contact bg-light">
        <div class="content">
            <!-- Left Side -->
            <div class="left-side">
                <!-- Address Details -->
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic"><b>Address</b></div>
                    <div class="text-one">Science and Technology Park of Epirus, University Campus</div>
                    <div class="text-two">P.C. 45 110, Ioannina, Greece</div>
                </div>
                <!-- Phone Details -->
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic"><b>Phone</b></div>
                    <div class="text-one">+30 26515 00012</div>
                </div>
                <!-- Fax Details -->
                <div class="fax details">
                    <i class="fas fa-fax"></i>
                    <div class="topic"><b>Fax</b></div>
                    <div class="text-one">+30 26510 40637</div>
                </div>
                <!-- Email Details -->
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic"><b>Email</b></div>
                    <div class="text-one">info@neuronenergy.com</div>
                </div>
                <!-- Website Details -->
                <div class="email details">
                    <a href="https://www.neuronenergy.com/">
                        <i class="fa fa-globe"></i>
                    </a>
                    <div class="topic"><b>Website</b></div>
                    <div class="text-one">www.neuronenergy.com</div>
                </div>
            </div>
            <!-- Right Side -->
            <div class="right-side">
                <div class="topic-text">Support</div>
                <p>If you have technical problems to report or other questions, please fill out the following form to contact us. Thank you.</p>

                <!-- Flash Message -->
                <?php if (Yii::$app->session->hasFlash('success')): ?>
                    <div class="alert alert-success" style="width: 400px!important;">
                       <i class="fa fa-check"></i> <?= Yii::$app->session->getFlash('success') ?><br>
                        We will get to you as soon as possible.
                    </div>
                <?php endif; ?>

                <!-- Contact Form -->
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

                <?= $form->field($model, 'reCaptcha')->widget(
                    \himiklab\yii2\recaptcha\ReCaptcha2::className(),
                    [
                        'siteKey' => '6LdttZ4lAAAAAMtEMELAsWOL_NwPs6MLMxLv0FQC', // unnecessary if reCaptcha component was set up
                    ]
                ) ?>

                <div class="button">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>

<?php
$script = <<< JS
document.getElementsByClassName("g-recaptcha")[0].setAttribute("data-size", "compact");
JS;
$this->registerJs($script);
?>
