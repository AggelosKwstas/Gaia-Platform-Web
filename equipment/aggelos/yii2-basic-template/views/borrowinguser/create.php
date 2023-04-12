<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BorrowingUser $model */

$this->title = Yii::t('app', 'Create Borrowing User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Borrowing Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrowing-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
