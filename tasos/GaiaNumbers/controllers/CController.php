<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use app\models\pure\User;
use app\models\search\UserSearch;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Request;

/**
 * Description of CController
 * @author odyss
 */
class
CController extends Controller
{


    protected $controller_name = null;

    public $user = null;

    public $is_logged = false;


    public function beforeAction($action)
    {
        $result = parent::beforeAction($action);
        $session = Yii::$app->session;
        !$session->isActive ? $session->open() : $session->close();

        if (!$session->get('language')){

            self::setLocale("en");
        }

        Yii::$app->language = $session->get('language');
        $session->close();
        $this->setLayout();

        return $result;
    }


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    protected function setLayout()
    {


        if ($this->user && $this->user->id) {



                $this->layout = "all";

        } else
            $this->layout = "main";


    }

    /**
     * @throws ForbiddenHttpException
     */
    public function forbid()
    {
        throw new ForbiddenHttpException(Yii::t("app", "Can't be accessed"));
    }

    public function actionLocale($name)
    {
        $this->setLocale($name);


        return isset($_SERVER['HTTP_REFERER']) ? $this->redirect($_SERVER['HTTP_REFERER']) : $this->redirect(Yii::$app->homeUrl);


    }


    public static function setLocale($name)
    {
        $allowed_languages = ['el-GR', 'en', 'it-IT'];

        $selected_language = in_array($name, $allowed_languages) ? $name : 'en';


        $session = Yii::$app->session;

        !$session->isActive ? $session->open() : $session->close();

        $session->set('language', $selected_language);

        $session->close();
    }
    public function setResponseJson(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }
}
