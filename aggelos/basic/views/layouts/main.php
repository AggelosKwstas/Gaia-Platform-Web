<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;

AppAsset::register($this);
//$this->registerCsrfMetaTags();

$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=yes']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => 'asset/logo.png']);
?>
<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>GAIA V2</title>
        <link rel="icon" type="image/x-icon" href="asset/logo.png"/>
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
                     src="asset/logo.png"
                     style="height: 75px!important;">
                <h id="h_logo">GAIA PLATFORM</h>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3" href="
<?php
                        if (\yii\helpers\Url::current() == \yii\helpers\Url::to(['site/map'])) {
                            echo \yii\helpers\Url::to(['site/index']) . '#map-container';
                        } else
                            echo '#map-container';
                        ?>
"><b>Station Overview</b></a></li>
                    <li class="nav-item"><a class="nav-link <?php
                        if (\yii\helpers\Url::current() == \yii\helpers\Url::to(['site/map']))
                            echo 'active ';
                        ?>me-lg-3"
                                            href="<?php echo \yii\helpers\Url::to(['site/map']) ?>"><b>Map</b></a></li>
                </ul>
                <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal"
                        data-bs-target="#feedbackModal">
                        <span class="d-flex align-items-center"><i style="display: block;text-align: left" class="fa-solid fa-right-to-bracket"></i>&nbsp;<span
                                    class="small">Login</span>
                        </span>
                </button>
            </div>
        </div>
    </nav>
    <?php echo $content ?>
    <!-- Footer-->
    <footer class="bg-black text-center py-1">
        <div class="container px-5">
            <div class="text-white-50 small">
                <div class="mb-2">&copy; Neuron Energy Solutions 2023. All Rights Reserved.</div>
                <div class="mb-2">Powered By:</div>
                <img src="asset/logoNE.png">
                <img src="asset/zitsa.png">
                <div class="mb-2">Follow us for more:</div>
                <a href="https://www.neuronenergy.com/"><i class="fa-solid fa-globe" style="font-size: 40px"></i></a>
                <span class="mx-1">&nbsp;&nbsp;</span>
                <a href="https://twitter.com/SolarEye_PV"><i class="fa-brands fa-square-twitter" style="font-size: 40px"></i></a>
                <span class="mx-1">&nbsp;&nbsp;</span>
                <a href="https://www.facebook.com/profile.php?id=100051469122856"><i class="fa-brands fa-facebook"
                                                                                     style="font-size: 40px"></i></a>
            </div>
        </div>
    </footer>



    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>