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
    <link rel="icon" type="image/x-icon" href="asset/favicon.ico" />
    <?php $this->head() ?>
</head>
<body id="page-top">
<?php $this->beginBody() ?>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
    <div class="container px-5">
        <a class="navbar-brand fw-bold" href="#page-top"><img class="main_logo" src="asset/logo.png" style="height: 75px!important;"> <h id="h_logo">GAIA PLATFORM</h></a>
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
<!-- Mashead header-->
<header class="masthead">
    <div class="container px-5" style="margin-right: 10em">
        <div class=" gx-5 align-items-center">
            <div class="col-lg">
                <!-- Mashead text and app badges-->
                <div class="mb-5 mb-lg-0 text-center text-lg-start">
                    <h1 class="display-2 lh-1 mb-3">Create powerful IoT networks, We’ve designed everything beyond...
                    </h1>
                    <img class="main_logo" src="asset/sensors.jpg" style="height: 200px;width: 95%">
                    <div style="text-align: center">

                        <div id="wrap">
                            <a href="#" class="btn-slide2">
                                <span class="circle2"><i class="fa fa-download"></i></span>
                                <span class="title2">Download GAIA Desktop Application</span>
                                <span class="title-hover2">Click here</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="bg-light">
   <div class="container" style="text-align: center">
       <div class="row">
           <div class="col offset-md-2 ">
               <h5><b>POWERFULL SENSOR NETWORKS</b></h5>
               <p>
                   Fast installation and minimum maintenance costs. Diverse services and applications. Robust equipment and network scalability.
               </p>
           </div>
           <div class="col">
               <h5><b>OVER 50 SENSOR TYPES</b></h5>
               <p>
                   Sensors for measuring air quality, water quality, ions concentration, container levels, structural health, noise, agriculture parameters, security parameters, radioactivity levels etc.
               </p>
           </div>
           <div class="col">
               <h5><b>SOLAR POWERED</b></h5>
               <p>
                   Each sensor node has a battery that can be recharged using an internal or external solar panel. Batteries have a 6600mAh load that ennsures non-stop working time, even in days with no sunlight at all.
               </p>
           </div>
       </div>
   </div>
</section>
<!-- Call to action section-->
<section class="cta" id="map-container">
<!--    <div id="map"></div>-->
</section>


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
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary-to-secondary p-4">
                <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Login</h5>
                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body border-0 p-4">
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Full name</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label for="email">Email address</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Phone number</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Message</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
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
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
