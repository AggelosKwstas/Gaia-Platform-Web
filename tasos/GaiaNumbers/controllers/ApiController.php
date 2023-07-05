<?php

namespace app\controllers;

use app\models\Node;
use yii\web\Controller;
use yii\web\Response;


class ApiController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionTesting($id='',$title='',$name='',$time='')
    {
        return $this->redirect(['site/graphs', 'id' => $id, 'title' => $title, 'name' => $name, 'time' => $time]);
    }

}