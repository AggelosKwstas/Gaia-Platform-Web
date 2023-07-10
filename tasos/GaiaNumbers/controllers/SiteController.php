<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use webzop\notifications\Notification;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    function makeWeatherCalls($lat, $long)
    {
        #make api call
        $ch = curl_init();
        $lat = strval($lat);
        $long = strval($long);
            $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$long&APPID=697f06f42d81bbda7d75e9349aefc162";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        #handle error
        if ($e = curl_error($ch)) {
            die($e);
        } else {
            $decoded = json_decode($resp, true);
        }
        curl_close($ch);
        return $decoded;
    }

    function fiveWeatherCalls()
    {
        #make api call
        $ch = curl_init();
        $url = "https://api.openweathermap.org/data/2.5/forecast?q=Ioannina&APPID=697f06f42d81bbda7d75e9349aefc162&cnt=5";
        https://api.openweathermap.org/data/2.5/forecast/daily?lat=39.7147&lon=20.7572&cnt=3&appid=697f06f42d81bbda7d75e9349aefc162
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($ch);

        #handle error
        if ($e = curl_error($ch)) {
            die($e);
        } else {
            $decoded = json_decode($resp, true);
        }
        curl_close($ch);
        return $decoded;
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'basic',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        $this->layout = 'backend_login';

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['backend/index']);
        }

        $this->view->title = 'Login';
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['backend/index']);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionDownload()
    {
        $file = Yii::$app->request->get('file');
        $path = Yii::$app->request->get('path');
        $root = Yii::getAlias('@webroot') . $path . $file;
        if (file_exists($root)) {
            return Yii::$app->response->sendFile($root);
        } else {
            throw new \yii\web\NotFoundHttpException("{$file} is not found!");
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */

    public function actionContact()
    {
        $this->view->title = 'Contact';
        $this->layout = 'main_map';
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('success', 'Contact form submitted successfully.'); // Set success flash message
            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    public function actionMap()
    {
        $gardiki = $this->makeWeatherCalls(39.7147, 20.7572);
        $ioannis = $this->makeWeatherCalls(39.7027, 20.8122);
        $eleousa = $this->makeWeatherCalls(39.7066, 20.7926);
        $uoi = $this->makeWeatherCalls(39.6216, 20.8596);

        #change layout
        $this->view->title = 'Sensor Map';
        $this->layout = 'main_map';
        return $this->render('map', [
            'content_gardiki' => $gardiki,
            'content_ioannis' => $ioannis,
            'content_eleousa' => $eleousa,
            'content_uoi' => $uoi
        ]);
    }

    public function actionGraphs($id='',$title='',$name='',$time='')
    {
        $weatherCalls = $this->fiveWeatherCalls();
        $this->layout = 'graphs_layout';
        $this->view->title = 'Sensor Graphs';
        if($id == '4'){
            return $this->render('graphs', [
                'content' => $weatherCalls,
                'title' => $title,
                'id' => $id,
                'name' => $name,
                'time' => $time]);
            }
        elseif($id == '5'){
            return $this->render('graphs', [
                'content' => $weatherCalls,
                'title' => $title,
                'id' => $id,
                'name' => $name,
                'time' => $time]);
            }
        elseif($id == '6'){
            return $this->render('graphs', [
                'content' => $weatherCalls,
                'title' => $title,
                'id' => $id,
                'name' => $name,
                'time' => $time]);
            }
        return $this->render('graphs', [
//
//            'title' => $title,
//            'id' => $id,
//            'name' => $name,
//            'time' => $time
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
