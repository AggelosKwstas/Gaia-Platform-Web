<?php

namespace app\controllers;

use app\models\Node;
use yii\web\Controller;
use yii\web\Response;


class ApiController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionTesting($id)
    {
            
        $title = 'Aggelos';
        $id = '6';
        $this->view->registerJs("var title = '" . $title . "';");
        $this->view->registerJs("var name = '" . $id . "';");
        return $this->redirect(['site/graphs', 'title' => $title, 'name' => $id]);
    }

}