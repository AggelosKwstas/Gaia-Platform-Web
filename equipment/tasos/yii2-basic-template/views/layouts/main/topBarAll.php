<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


$web = Yii::getAlias('@web');

//depend on the user type
if (Yii::$app->user->identity->isAdmin) {

    $menu = new \app\helpers\menu\AuthedMenuHelper();
} else {
    $menu = new \app\helpers\menu\AnonymousMenuHelper();
}


?>

<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
    <div class="kt-header__top">
        <div class="kt-container ">
            <!-- begin:: Brand -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <a href="<?= "./index.php?r=product/index" ?>">
                <div class="kt-aside__brand-logo">
                        <img alt="Logo" class="logo-image"
                             src="<?= "$web/theme/custom/img/logo.png" ?>"/>
                    </a>
                </div>

            </div>
            <!-- end:: Brand -->            <!-- begin:: Header Topbar -->
            <div class="kt-header__topbar">


                <?php
                $active_en = '';
                $active_gr = '';
                if (Yii::$app->language === "el-GR") {
                    $image = "greek.svg";
                    $active_gr = 'kt-nav__item--active';

                } else {
                    $active_en = 'kt-nav__item--active';
                    $image = "uk.svg";
                }
                ?>


                <div class="kt-header__topbar-item kt-header__topbar-item--user">


                    <div class="kt-header__topbar-wrapper text-dark" data-toggle="dropdown" data-offset="0px,10px">

                        <?php if (!Yii::$app->user->isGuest) { ?>
                            <span
                                class="kt-header__topbar-welcome kt-visible-desktop text-dark"><?= Yii::t("app", "Hi") ?>,</span>
                            <span
                                class="kt-header__topbar-username kt-visible-desktop text-dark"><?= Yii::$app->user->identity->firstname ?></span>
                            <img alt="Pic" class="kt-radius-100"
                                 src="<?= Yii::$app->user->identity->image_id ? Yii::$app->user->identity->image->getFullThumbnailPath() : "" ?>"/>
                            <span
                                class="kt-header__topbar-icon kt-bg-brand kt-font-lg kt-font-bold kt-font-light kt-hidden">S</span>
                            <span class="kt-header__topbar-icon kt-hidden"><i class="flaticon2-user-outline-symbol"></i></span>

                        <?php } else {
                            ?>


                            <span class="kt-header__topbar-welcome kt-visible-desktop text-dark"><a
                                    href="<?= \yii\helpers\Url::to(['url/index']) ?>"
                                    class="btn btn-primary"><?= Yii::t("app", "Login") ?></a></span>

                        <?php } ?>

                    </div>

                    <?php if (!Yii::$app->user->isGuest) { ?>
                        <div
                            class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-md">
                            <!--begin: Head -->

                            <!--end: Head -->

                            <!--begin: Navigation -->
                            <div class="kt-notification">
                                <a href="./index.php?r=user/update&id=<?= Yii::$app->user->id ?>"
                                   class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-calendar-3 kt-font-success"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title kt-font-bold">
                                            <?= Yii::t("app", "My Profile") ?>
                                        </div>
                                        <div class="kt-notification__item-time">
                                            <?= Yii::t("app", "Settings") ?>
                                        </div>
                                    </div>
                                </a>


                                <div class="kt-notification__custom kt-space-between">
                                    <?php
                                    echo "" . Html::beginForm(['/site/logout'], 'post', ['class' => 'w-100'])
                                        . Html::submitButton(
                                            Yii::t("app", 'Logout'),
                                            ['class' => 'btn btn-primary w-100 logout']
                                        ) .
                                        Html::endForm() . "";
                                    ?>


                                </div>
                            </div>
                            <!--end: Navigation -->
                        </div>
                    <?php } ?>
                </div>
                <!-- end:: Header Topbar -->
            </div>
        </div>

    </div>


</div>
<!-- end:: Header -->
