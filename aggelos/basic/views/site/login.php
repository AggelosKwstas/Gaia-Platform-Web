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
        <div class="col-md-7 col-lg-5">
            <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="mb-4"><b>Login to Private Area</b></h3>
                    </div>
                    <div class="w-100">
                        <p class="social-media d-flex justify-content-end">
                            <img src="asset/logGlobe.png" style="width: 50px" alt="">
                        </p>
                    </div>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center" style="top:2.3rem"><span
                                class="fa fa-user"></span></div>
                    <?= $form->field($model, 'username')->textInput() ?>
                </div>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center" style="top:2.3rem"><span
                                class="fa fa-lock"></span></div>
                    <?= $form->field($model, 'password')->passwordInput() ?>
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

