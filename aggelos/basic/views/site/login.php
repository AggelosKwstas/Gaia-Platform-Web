<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="ftco-section" style="z-index: 2">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4">
            <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 style="padding-top: 2rem"><b>Login to Private Area</b></h3>
                    </div>
                    <div class="w-100">
                        <p class="social-media d-flex justify-content-end">
                            <img src="asset/logGlobe.png" style="width: 75px" alt="">
                        </p>
                    </div>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center" style="top:2.3rem;color: white"><span
                                class="fa fa-user"></span></div>
                    <b style="color: black">
                    <?= $form->field($model, 'username')->textInput() ?>
                    </b>
                </div>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center" style="top:2.3rem;color: white"><span
                                class="fa fa-lock"></span></div>
                    <b style="color: black">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    </b>
                </div>
                <div class="form-group">
                    <div>
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>

