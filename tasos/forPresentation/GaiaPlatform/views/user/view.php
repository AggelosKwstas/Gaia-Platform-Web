<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\pure\User */

$this->title = $model->fullname;
Yii::$app->setHomeUrl('@web/index.php?r=backend%2Fuser');
$this->params['breadcrumbs'][] = $this->title;

?>
<div>
    <div>
        <div>
					<span>
						<i></i>
					</span>
            <h3>
                <?= Html::encode($this->title) ?>

            </h3>

        </div>

    </div>

    <div>

        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

            <?php if (Yii::$app->user->identity->isAdmin) {

                ?>
                <?=
                Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ])
                ?>
                <?php

            }

            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                ["attribute" => "image",
                    'value' => function ($model) {

                        if ($model->image)
                            return yii\helpers\Html::img($model->image->fullImagePath, ["width" => "40px"]);
                        else
                            return null;
                    }, 'format' => "raw",
                    "filter" => false,
                ],
                'username',
                'email:email',
                'firstname',
                'lastname',

                ["attribute" => "gender_id",
                    "value" => function ($model) {
                        return $model->gender->pretty_name;
                    }],
                ["attribute" => "user_type_id",
                    "value" => function ($model) {
                        return $model->userType->pretty_name;
                    }],


                'status',
                'date_created',
                'date_updated',
            ],
        ])
        ?>

    </div>
</div>
