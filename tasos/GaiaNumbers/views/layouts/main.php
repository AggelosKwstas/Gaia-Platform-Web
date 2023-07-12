<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
//$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=yes']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => 'asset/BadgeGaiaPlatform.png']);
?>
<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <link rel="icon" type="image/x-icon" href="asset/LogoGaiaPlatform.png"/>
        <?php $this->head() ?>
    </head>
    <body id="page-top">
    <?php $this->beginBody() ?>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand fw-bold" href="<?php
            if (\yii\helpers\Url::current() == \yii\helpers\Url::to(['site/index'])) {
                echo '#page-top';
            } else
                echo \yii\helpers\Url::to(['site/index']);
            ?>"><img class="main_logo"
                     src="asset/LogoGaiaPlatform.png"
                     alt="">
<!--                <h id="h_logo">GAIA PLATFORM</h>-->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-0 my-3 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-lg-3"
                           href="<?php echo \yii\helpers\Url::to(['site/map']) ?>">
                            <b>Stations Overview</b></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link me-lg-3"
                           href="<?php echo \yii\helpers\Url::to(['site/contact']) ?>">
                            <b>Contact Us</b></a>
                    </li>
                </ul>
                <button class="btn btn-primary  px-3 mb-2 mb-lg-0"
                        onclick="location.href='<?php echo \yii\helpers\Url::to(['backend/login']) ?>'">
                        <span class="d-flex align-items-center"><i style="display: block;text-align: left"
                                                                   class="fa-solid fa-right-to-bracket"></i>&nbsp;<span
                                    class="small">Login</span>
                        </span>
                </button>
            </div>
        </div>
    </nav>
    <?php echo $content ?>
    <!-- Footer-->
    <footer class="text-center py-1" style="background-color: #1b1b1b">
        <div class="container px-5">
            <div class="text-white-50 small mt-2">
<!--                <a href="https://www.neuronenergy.com/" target="_blank"><img class="footer_logo" style="height: 60px;"-->
<!--                                                                             src="asset/logoNE.png"-->
<!--                                                                             title="Neuron Energy Solutions" alt=""></a>-->
                <div class="mb-2" style="font-size: 12px">© 2023 | All rights reserved.</div>
                <div class="it-icons">
                    <p>Follow us on:</p>
                    <a style="text-decoration: none;cursor: pointer" target="_blank" title="LinkedIn">
<!--                        href="https://www.linkedin.com/company/neuron-energy-solutions/"-->
                        <i class="fa-brands fa-linkedin-in"></i>&nbsp;&nbsp;
                    </a>
                    <a style="text-decoration: none;cursor: pointer" target="_blank" title="Facebook">
<!--                        href="https://www.facebook.com/profile.php?id=100068977243761"-->
                        <i class="fa-brands fa-facebook-f"></i>&nbsp;&nbsp;
                    </a>
                    <a style="text-decoration: none;cursor: pointer" title="Twitter" target="_blank">
<!--                        href="https://twitter.com/SolarEye_PV"-->
                        <i class="fa-brands fa-twitter"></i>&nbsp;&nbsp;
                    </a>
                    <a style="text-decoration: none;cursor: pointer" target="_blank" title="Pinterest">
<!--                        href="https://gr.pinterest.com/solareye/"-->
                        <i class="fa-brands fa-pinterest-p"></i>
                    </a>
                </div>
    </footer>
    <?php $this->endBody() ?>
    </body>
    <script>
        AOS.init({
            once: true,
        })
    </script>
    </html>
<?php $this->endPage() ?>