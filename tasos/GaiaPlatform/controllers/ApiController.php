<?php

namespace app\controllers;

use app\models\Node;
use yii\web\Controller;
use yii\web\Response;


class ApiController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionTesting($id='',$title='')
    {
        return $this->redirect(['site/graphs', 'id' => $id, 'title' => $title]);
    }

}