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
    <body id="page-top" style="background-color: #e5e9ec">
    <?php $this->beginBody() ?>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="mainNav" style="position: relative!important;">
        <div class="container px-5">
            <a class="navbar-brand fw-bold" href="<?php
            if (\yii\helpers\Url::current() == \yii\helpers\Url::to(['site/index'])) {
                echo '#page-top';
            } else
                echo \yii\helpers\Url::to(['site/index']);
            ?>"><img class="main_logo"
                     src="asset/LogoGaiaPlatform.png">
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
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>