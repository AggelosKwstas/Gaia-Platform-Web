<?php

namespace app\controllers;

use app\models\Node;
use yii\web\Controller;
use yii\web\Response;


class ApiController extends Controller
{

    public function actionTesting($id)
    {
        die($id);
        //Model logic
    }

}