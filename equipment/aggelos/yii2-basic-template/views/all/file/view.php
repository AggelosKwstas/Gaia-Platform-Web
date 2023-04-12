<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\pure\File */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Files'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="file-view">

    <div class=" kt-portlet">
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

            <p>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    ['attribute' => "customer",
                        "value" => function ($model) {
                            $customer = \app\models\pure\Customer::findBySql("select customer.* from customer inner join customer_biography_file on customer_id=customer.id and biography_file_id=$model->id")->one();
                            if ($customer) {
                                return Html::a($customer->fullname,["customer/view","id"=>$customer->id]);
                            }
                        },
                           "label"=>Yii::t("app","Customer"),
                        "format"=>"raw"],
                    'title',
                    'path',

                    'size',
                    'file_type',
                    'date_created',
                    'date_updated',
                ],
            ]) ?>
        </div>
    </div>
</div>
