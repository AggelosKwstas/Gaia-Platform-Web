<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Gender $model */

$this->title = Yii::t('app', 'Create Gender');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Genders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gender-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>