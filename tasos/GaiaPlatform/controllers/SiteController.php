<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
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
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

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

        return $this->render('map', [
            'content_gardiki' => $gardiki,
            'content_ioannis' => $ioannis,
            'content_eleousa' => $eleousa,
            'content_uoi' => $uoi
//            'icon_gardiki' => $gardiki['weather'][0]['icon'],
//            'icon_ioannis' => $ioannis['weather'][0]['icon'],
//            'icon_eleousa' => $eleousa['weather'][0]['icon'],
//            'icon_uoi' => $uoi['weather'][0]['icon'],
//            'forecast_gardiki' => $gardiki['weather'][0]['main'],
//            'forecast_ioannis' => $ioannis['weather'][0]['main'],
//            'forecast_eleousa' => $eleousa['weather'][0]['main'],
//            'forecast_uoi' => $uoi['weather'][0]['main'],
//            'uoi_stats'=>$uoi['main']
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
