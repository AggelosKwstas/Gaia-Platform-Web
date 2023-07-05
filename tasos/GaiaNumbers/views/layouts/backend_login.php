<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\BackendAsset;

BackendAsset::register($this);
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
    <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="mainNav" style="position: relative!important;">
        <div class="container px-5">
            <a class="navbar-brand fw-bold" href="<?php
            if (\yii\helpers\Url::current() == \yii\helpers\Url::to(['site/login'])) {
                echo \yii\helpers\Url::to(['site/index']);
            } else
                echo \yii\helpers\Url::to(['site/index']);
            ?>"><img class="main_logo"
                     src="asset/LogoGaiaPlatform.png"
                     alt="">
                <!--                <h id="h_logo">GAIA PLATFORM</h>-->
            </a>
    </nav>
    <?php echo $content ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>