<?php
namespace app\controllers;
use app\models\Node;
use yii\web\Controller;
use yii\web\Response;


class ApiController extends Controller{
     public function beforeAction($action): bool
     {

         \Yii::$app->response->format = Response::FORMAT_JSON;
         return parent::beforeAction($action);
     }

     public function actionGetNodes(){

         return Node::find()->all();
     }
}