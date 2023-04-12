<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ergo $model */

$this->title = Yii::t('app', 'Create Ergo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ergos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ergo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
