<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;


use yii\bootstrap4\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\web\View;

AppAsset::register($this);

$web = Yii::getAlias('@web');
$viewLayoutPath = Yii::$app->basePath . '\views\layouts\main\\';

$app = $web;


$this->registerJs(
    "window.yiiPath={controller:'" . Yii::$app->controller->getUniqueId() . "',
     view:'" . Yii::$app->controller->action->id . "'};",
    View::POS_HEAD);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body
      class="kt-quick-panel--right background-white kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">
<?php $this->beginBody() ?>


<!-- begin:: Page -->
<!-- begin:: Header Mobile -->


<!-- begin:: Page -->
<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="./index.php?r=dashboard/">
            <img alt="Logo" class="logo-image"
                 src="<?= "$web/theme/custom/img/logo.png" ?>"/>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">

        <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more-1"></i></button>
    </div>
</div>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <!-- begin:: Header -->
            <?= $this->render("main/topBarAll.php"); ?>
            <!-- end:: Header -->
            <div class="kt-container  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id='whole-page-container'>
                <div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch"
                     id="kt_body">
                    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                        <!-- begin:: Subheader -->
                        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                            <div class="kt-container ">
                                <?=
                                Breadcrumbs::widget([
                                    'homeLink' => ['url' => './index.php', 'label' => Yii::t("app", 'Home')],
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ])
                                ?>

                            </div>
                        </div>
                        <!-- end:: Subheader -->
                        <div class="kt-container   kt-grid__item kt-grid__item--fluid">
                            <!-- begin:: Content -->
                            <?= $content ?>
                            <!-- end:: Content -->                            </div>
                    </div>
                </div>

                <!-- begin:: Footer -->

                <!-- end:: Footer -->            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Quick Panel -->

    <!-- end::Quick Panel -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>
    <!-- end::Scrolltop -->

    <div class="kt-footer  kt-grid__item" id="kt_footer">
        <div class="kt-container ">
            <p class="pull-left">&copy; Megatron <?= date('Y') ?></p>

            <p class="pull-right"><?= \Yii::t('yii', 'Powered by {qbase}', [
                    'qbase' => '<a href="https://qbase.gr/" target="_blank" rel="external">' . \Yii::t('app',
                            'QBase R&D') . '</a>',
                ]) ?></p>
        </div>
    </div>

    <?php $this->endBody() ?>
</div>
</body>
</html>
<?php $this->endPage() ?>
