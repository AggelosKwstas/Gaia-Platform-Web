<?php

use yii\web\View;

$this->title = Yii::t("app", 'Dashboard');
$this->registerJs(
    "window.models={plants:$patients_date,images:$examinations_date,locations:$questions_date};",
    View::POS_BEGIN);

$this->registerJsFile("@web/theme/custom/pages/dashboard/js/index.js",
    ['depends' => [yii\web\JqueryAsset::className()]]
);
?>
<div class="row">
    <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
        <!--begin:: Widgets/Activity-->
        <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <?= Yii::t("app", "Customers") ?>
                    </h3>
                </div>

            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-widget17">
                    <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides"
                         style="background-color: #fd397a">
                        <div class="kt-widget17__chart" style="height:320px;">
                            <canvas id="kt_chart_activities"></canvas>
                        </div>
                    </div>
                    <div class="kt-widget17__stats">
                        <div class="kt-widget17__items">

                            <div class="kt-widget17__item">
                                <a href="<?= Yii::$app->user->identity->isAdmin ? \yii\helpers\Url::to(['/user/index']) : "#" ?>">
						<span class="kt-widget17__icon">
						<i class="fa     fa-users" style="color:purple"></i>			</span>
                                    <span class="kt-widget17__subtitle">
				               <?= Yii::t("app", "Users") ?>
						</span>
                                    <span class="kt-widget17__desc">
						  <?= $users ?>
						</span>
                                </a>
                            </div>

                            <div class="kt-widget17__item">
                                <a href="<?= \yii\helpers\Url::to(['/customer/index']) ?>">
						<span class="kt-widget17__icon">
							<i class="fas fa-briefcase" style="color:lightseagreen"></i>
                        </span>
                                    <span class="kt-widget17__subtitle">
							               <?= Yii::t("app", "Customers") ?>
						</span>
                                    <span class="kt-widget17__desc">
						<?= $patients ?>
						</span>
                                </a>
                            </div>
                        </div>
                        <div class="kt-widget17__items">
                            <div class="kt-widget17__item">
                                <a href="<?= \yii\helpers\Url::to(['/all/speciality/index']) ?>">
						<span class="kt-widget17__icon">
							<i class="fa    fa-user-astronaut" style="color:yellowgreen"></i>
											</span>
                                    <span class="kt-widget17__subtitle">
							               <?= Yii::t("app", "Specialities") ?>
						</span>
                                    <span class="kt-widget17__desc">
							<?= $examinations ?>
						</span>
                                </a>
                            </div>

                            <div class="kt-widget17__item">
                                <a href="<?= \yii\helpers\Url::to(['/all/file/index']) ?>">
						<span class="kt-widget17__icon">
									<i class="fa fa-plus-square" style="color:#fd397a"></i>
												</span>
                                    <span class="kt-widget17__subtitle">
						               <?= Yii::t("app", "Files") ?>
						</span>
                                    <span class="kt-widget17__desc">
							<?= $questions ?>
						</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Activity-->    </div>
    <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">
        <!--begin:: Widgets/Inbound Bandwidth-->
        <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid-half">
            <div class="kt-portlet__head kt-portlet__space-x">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <?= Yii::t("app", "Specialities") ?>
                    </h3>
                </div>

            </div>
            <div class="kt-portlet__body kt-portlet__body--fluid">
                <div class="kt-widget20">
                    <div class="kt-widget20__content kt-portlet__space-x">
                        <!--                        <span class="kt-widget20__number kt-font-brand">670+</span>-->
                        <!--                        <span class="kt-widget20__desc">Successful transactions</span>-->
                    </div>
                    <div class="kt-widget20__chart" style="height:130px;">
                        <canvas id="kt_chart_bandwidth1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Inbound Bandwidth-->
        <div class="kt-space-20"></div>
        <!--begin:: Widgets/Outbound Bandwidth-->
        <div class="kt-portlet kt-portlet--fit kt-portlet--head-noborder kt-portlet--height-fluid-half">
            <div class="kt-portlet__head kt-portlet__space-x">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <?= Yii::t("app", "Files") ?>
                    </h3>
                </div>

            </div>
            <div class="kt-portlet__body kt-portlet__body--fluid">
                <div class="kt-widget20">
                    <div class="kt-widget20__content kt-portlet__space-x">
                        <!--                        <span class="kt-widget20__number kt-font-danger">1340+</span>-->
                        <!--                        <span class="kt-widget20__desc">Completed orders</span>-->
                    </div>
                    <div class="kt-widget20__chart" style="height:130px;">
                        <canvas id="kt_chart_bandwidth2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!--end:: Widgets/Outbound Bandwidth-->    </div>


</div>
<!--End::Row-->
