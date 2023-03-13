<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FA;

AppAsset::register($this);
rmrevin\yii\fontawesome\AssetBundle::register($this);
//$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GAIA V2</title>
    <link rel="icon" type="image/x-icon" href="asset/logo.png" />
    <?php $this->head() ?>
</head>
<body id="page-top">
<?php $this->beginBody() ?>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
    <div class="container px-5">
        <a class="navbar-brand fw-bold" href="#page-top"><img class="main_logo" src="asset/GaiaNewLogoEarth.png" style="height: 75px!important;"> <h id="h_logo">GAIA PLATFORM</h></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                <li class="nav-item"><a class="nav-link me-lg-3" href="#map-container"><b>Station Overview</b></a></li>
                <li class="nav-item"><a class="nav-link me-lg-3" href="#map"><b>Map</b></a></li>
            </ul>
            <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                        <span class="d-flex align-items-center"><i class="fa fa-sign-in pull-left"></i><span class="small">Login</span>
                        </span>
            </button>
        </div>
    </div>
</nav>
<?php echo $content?>
<!-- Footer-->
<footer class="bg-black text-center py-3">
    <div class="container px-5">
        <div class="text-white-50 small">
            <div class="mb-2">&copy; Neuron Energy Solutions 2023. All Rights Reserved.</div>
            <div class="mb-2">Powered By:</div>
            <img src="asset/logoNE.png">
            <img src="asset/zitsa.png">
            <div class="mb-2">Follow us for more:</div>
            <a href="https://www.neuronenergy.com/"><i class="fa fa-globe" style="font-size: 40px"></i></a>
            <span class="mx-1">&nbsp;&nbsp;</span>
            <a href="https://twitter.com/SolarEye_PV"><i class="fa fa-twitter" style="font-size: 40px"></i></a>
            <span class="mx-1">&nbsp;&nbsp;</span>
            <a href="https://www.facebook.com/profile.php?id=100051469122856"><i class="fa fa-facebook" style="font-size: 40px"></i></a>
        </div>
    </div>
</footer>
<!-- Feedback Modal-->
<!--<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-dialog-centered">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header bg-white p-4">-->
<!--                <h5 class="modal-title font-alt" id="feedbackModalLabel" style="color: #5caa32">Login</h5>-->
<!--                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body border-0 p-4">-->
<!--                <form id="contactForm" data-sb-form-api-token="API_TOKEN">-->
                    <!-- Name input-->
<!--                    <div class="form-floating mb-3" >-->
<!--                        <input class="form-control" id="firstname" type="text" style="border-radius: 100px;" placeholder="Enter your firstname..." data-sb-validations="required" />-->
<!--                        <label for="firstname">Firstname</label>-->
<!--                        <div class="invalid-feedback" data-sb-feedback="firstname:required">Firstname is required.</div>-->
<!--                    </div>-->
<!--                    lastname-->
<!--                    <div class="form-floating mb-3">-->
<!--                        <input class="form-control" id="lastname" type="text" style="border-radius: 100px;" placeholder="Enter your lastname here..." style="height: 10rem" data-sb-validations="required" />-->
<!--                        <label for="lastname">Lastname</label>-->
<!--                        <div class="invalid-feedback" data-sb-feedback="lastname:required">Lastname is required.</div>-->
<!--                    </div>-->
                    <!-- Email address input-->
<!--                    <div class="form-floating mb-3">-->
<!--                        <input class="form-control" id="email" type="email" style="border-radius: 100px;" placeholder="name@example.com" data-sb-validations="required,email" />-->
<!--                        <label for="email">Email address</label>-->
<!--                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>-->
<!--                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>-->
<!--                    </div>-->
                    <!-- Phone number input-->
<!--                    <div class="form-floating mb-3">-->
<!--                        <input class="form-control" id="phone" type="tel" style="border-radius: 100px;" placeholder="(123) 456-7890" data-sb-validations="required" />-->
<!--                        <label for="phone">Phone number</label>-->
<!--                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>-->
<!--                    </div>-->

                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                    <br>
                    <div class="form-floating mb-3" style="color: #5caa32">
                        <div class="modal-header">Already a User?</div>
                    </div>

                    <!-- Sign Up Button-->
                    <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="signUpButton" type="submit" href="<?php echo yii\helpers\Url::to(['site/map']) ?>">Sign Up</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
