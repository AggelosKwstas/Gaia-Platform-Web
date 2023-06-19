<?php

namespace app\controllers;

use app\models\Node;
use yii\web\Controller;
use yii\web\Response;


class ApiController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionTesting($id, $title)
    {
//        $this->view->registerJs("var title = '" . base64_decode($title) . "';");
//        $this->view->registerJs("var name = '" . $id . "';");
//        return $this->redirect(['site/graphs', 'title' => base64_decode($title), 'name' => $id]);
    }

}