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
        <link rel="icon" type="image/x-icon" href="asset/BadgeGaiaPlatform.png"/>
        <?php $this->head() ?>
    </head>
    <body id="page-top">
    <?php $this->beginBody() ?>
    <div id="wrapper">

        <ul class="navbar-nav sidebar sidebar-dark accordion toggled" style="background-color: #212121"
            id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center inactiveLink"
               style="color: white!important;">
                <div class="sidebar-brand-text">GAIA Backend</div>
                <img src="asset/BadgeGaiaPlatform.png" style="width: 3rem;position: relative;left: 5px">
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item <?php
            if (\yii\helpers\Url::current() == \yii\helpers\Url::to(['backend/index']))
                echo 'active';
            ?>">
                <a class="nav-link" href="<?php
                if (\yii\helpers\Url::current() == \yii\helpers\Url::to(['backend/index'])) {
                    echo '#page-top';
                } else
                    echo \yii\helpers\Url::to(['backend/index']);
                ?>">
                    <i class="fas fa-fw fa-home fa-lg"></i>
                    <span>Home</span></a>
            </li>


            <hr class="sidebar-divider">


            <div class="sidebar-heading">
                Configure
            </div>


            <li class="nav-item">
                <!--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"-->
                <!--                   aria-expanded="true" aria-controls="collapseTwo">-->
                <!--                    <i class="fas fa-fw fa-cog fa-lg"></i>-->
                <!--                    <span>Components</span>-->
                <!--                </a>-->
                <!--                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
                <!--                    <div class="bg-white py-2 collapse-inner rounded">-->
                <!--                        <h6 class="collapse-header">Custom Components:</h6>-->
                <!--                        <a class="collapse-item" href="buttons.html">Buttons</a>-->
                <!--                        <a class="collapse-item" href="cards.html">Cards</a>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </li>-->
                <!---->
                <!---->
                <!--            <li class="nav-item">-->
                <!--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"-->
                <!--                   aria-expanded="true" aria-controls="collapseUtilities">-->
                <!--                    <i class="fas fa-fw fa-wrench fa-lg"></i>-->
                <!--                    <span>Utilities</span>-->
                <!--                </a>-->
                <!--                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"-->
                <!--                     data-parent="#accordionSidebar">-->
                <!--                    <div class="bg-white py-2 collapse-inner rounded">-->
                <!--                        <h6 class="collapse-header">Custom Utilities:</h6>-->
                <!--                        <a class="collapse-item" href="utilities-color.html">Colors</a>-->
                <!--                        <a class="collapse-item" href="utilities-border.html">Borders</a>-->
                <!--                        <a class="collapse-item" href="utilities-animation.html">Animations</a>-->
                <!--                        <a class="collapse-item" href="utilities-other.html">Other</a>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </li>-->
                <!---->
                <!---->
                <!--            <hr class="sidebar-divider">-->
                <!---->
                <!---->
                <!--            <div class="sidebar-heading">-->
                <!--                Addons-->
                <!--            </div>-->
                <!---->
                <!---->
                <!--            <li class="nav-item">-->
                <!--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"-->
                <!--                   aria-expanded="true" aria-controls="collapsePages">-->
                <!--                    <i class="fas fa-fw fa-folder fa-lg"></i>-->
                <!--                    <span>Pages</span>-->
                <!--                </a>-->
                <!--                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">-->
                <!--                    <div class="bg-white py-2 collapse-inner rounded">-->
                <!--                        <h6 class="collapse-header">Login Screens:</h6>-->
                <!--                        <a class="collapse-item" href="login.html">Login</a>-->
                <!--                        <a class="collapse-item" href="register.html">Register</a>-->
                <!--                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>-->
                <!--                        <div class="collapse-divider"></div>-->
                <!--                        <h6 class="collapse-header">Other Pages:</h6>-->
                <!--                        <a class="collapse-item" href="404.html">404 Page</a>-->
                <!--                        <a class="collapse-item" href="blank.html">Blank Page</a>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </li>-->
                <!---->
                <!---->
                <!--            <li class="nav-item">-->
                <!--                <a class="nav-link" href="-->
                <?php //echo \yii\helpers\Url::to(['site/map']) ?><!--">-->
                <!--                    <i class="fas fa-fw fa-chart-area fa-lg"></i>-->
                <!--                    <span>Charts</span></a>-->
                <!--            </li>-->
                <!---->

            <li class="nav-item <?php
            if (\yii\helpers\Url::current() == \yii\helpers\Url::to(['backend/user']))
                echo 'active';
            ?>">
                <a class="nav-link" href="<?php echo \yii\helpers\Url::to(['backend/user']) ?>">
                    <i class="fas fa-fw fa-user fa-lg"></i>
                    <span>Users</span></a>
            </li>


            <hr class="sidebar-divider d-none d-md-block">


        </ul>


        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">


                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"
                            style="color: #212121!important;">
                        <i class="fa fa-bars"></i>
                    </button>


                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>


                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 medium"><b><?php echo \Yii::$app->user->identity->username; ?></b></span>
                                <img class="img-profile rounded-circle"
                                     src="backend/img/user.png">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php \yii\helpers\Url::to(['backend/logout']) ?>"
                                   data-toggle="modal" data-target="#logoutModal">
                                    <div style="display: block;text-align: center;font-size: 17px">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-"></i>
                                        Logout
                                    </div>
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <?php echo $content ?>

                </div>


            </div>


        </div>


        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel"><b>Ready to Leave?</b></p>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body"><em>Select "Logout" below if you are ready to end your current session.</em>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary"
                           href="<?php echo \yii\helpers\Url::to(['backend/logout']) ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>