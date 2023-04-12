<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\pure\Gender */

$this->title = Yii::t('app', 'Create Gender');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gender-create">

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

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
