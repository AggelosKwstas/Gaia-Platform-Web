<?php

use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\Tabs;
use yii\helpers\Html;

/* @var $form string */
/* @var $required boolean */
/* @var $model  app\models\Model */
/* @var $other  [] */
/* @var $customer  app\models\pure\Customer */


$done_icon = ' &nbsp;<i  class="fa fa-check text-primary"></i>';

$this->title = Yii::t('app', 'Customers');

$form_name = "form_" . $form;
$params = ["model" => $model,
    "customer" => $customer,
    "other"=>$other,
];
$this->registerJsFile(Yii::$app->request->baseUrl . '/theme/custom/pages/client/js/index.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>
<?= $this->render($form_name, $params); ?>
<div class="create-page kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="la la-adjust"></i>
					</span>
            <h3 class="kt-portlet__head-title">
                <?= Html::encode($this->title) ?>

            </h3>

        </div>

    </div>

    <div class="kt-portlet__body">


    <div class="client-tabs">
    <?=
    Tabs::widget(
        [
            'encodeLabels' => false,
            'items' => [
                [
                    'label' => Yii::t('app', 'Profile').' <span class="text-danger">*</span>' . ($customer->id ? $done_icon : null),
                    'content' => $form === "customer" ? $this->blocks['customer-block'] : null,
                    'linkOptions' => ['data-url' => \yii\helpers\Url::to(['/customer/create', "id" => $customer->id])],
                    'active' => $form === "customer",
                    "headerOptions" => ["class" => "text-center"]


                ],

                [
                    'label' => Yii::t('app', 'Degree') . (\app\models\pure\CustomerDegree::findOne($customer->id) ? $done_icon : null),
                    'content' => $form === "customer_degree" ? $this->blocks['customer-degree-block'] : null,
                    'linkOptions' => ['data-url' => \yii\helpers\Url::to(['/customer/degree', "id" => $customer->id])],
                    'active' => $form === "customer_degree",
                    "disabled" => $required,
                ],
                [
                    'label' => Yii::t('app', 'Foreign Languages') . (\app\models\pure\CustomerLanguage::findOne($customer->id) ? $done_icon : null),
                    'content' => $form === "customer_foreign_language" ? $this->blocks['customer-foreign-language-block'] : null,
                    'linkOptions' => ['data-url' => \yii\helpers\Url::to(['/customer/foreign-language', "id" => $customer->id])],
                    'active' => $form === "customer_foreign_language",
                    "disabled" => $required,
                ],

                [
                    'label' => Yii::t('app', 'Computer Skills') . (\app\models\pure\CustomerComputerSkills::findOne($customer->id) ? $done_icon : null),
                    'content' => $form === "customer_computer_skills" ? $this->blocks['customer-computer-skills-block'] : null,
                    'linkOptions' => ['data-url' => \yii\helpers\Url::to(['/customer/computer-skills', "id" => $customer->id])],
                    'active' => $form === "customer_computer_skills",
                    "disabled" => $required,
                ],

                [
                    'label' => Yii::t('app', 'Professional Experience') . (\app\models\pure\CustomerProfessionalExperience::findOne($customer->id) ? $done_icon : null),
                    'content' => $form === "customer_professional_experience" ? $this->blocks['customer-professional-experience-block'] : null,
                    'linkOptions' => ['data-url' => \yii\helpers\Url::to(['/customer/professional-experience', "id" => $customer->id])],
                    'active' => $form === "customer_professional_experience",
                    "disabled" => $required,
                ],
                [
                    'label' => Yii::t('app', 'Interview') . (\app\models\pure\CustomerInterview::findOne($customer->id) ? $done_icon : null),
                    'content' => $form === "customer_interview" ? $this->blocks['customer-interview-block'] : null,
                    'linkOptions' => ['data-url' => \yii\helpers\Url::to(['/customer/interview', "id" => $customer->id])],
                    'active' => $form === "customer_interview",
                    "disabled" => $required,
                ],

            ]]);

    ?>

    </div>

</div>

