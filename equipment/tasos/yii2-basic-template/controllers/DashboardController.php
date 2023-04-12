<?php

namespace app\controllers;

use app\helpers\DashboardHelper;
use app\helpers\notification\NotificationHelper;
use app\models\generated\Customer;

use app\models\pure\File;

use app\models\pure\Speciality;
use app\models\pure\User;
use Yii;

class DashboardController extends AuthedController
{

    public function actionIndex()
    {

        $users = User::find()->count("*");
        $customers = Customer::find()->count("*");
        $specialities = Speciality::find()->count("*");
        


        return $this->render("index", [

            "users" => $users,
            "patients" => $customers,
            "examinations" => $specialities,
            "questions" => 0,//$files,
            "patients_date" => DashboardHelper::getPatientsByDateJSON(),
            "examinations_date" => DashboardHelper::getExaminationByDateJSON(),
            "questions_date" => DashboardHelper::getQuestionByDateJSON(),
        ]);


    }


    public function actionLocale($name)
    {

        self::setLocale($name);

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }


    public function actionReadNotifications()
    {

        return json_encode(NotificationHelper::updateAllNotifications($this->user->id));
    }

}
