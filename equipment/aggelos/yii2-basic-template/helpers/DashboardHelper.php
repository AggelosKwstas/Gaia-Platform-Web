<?php

namespace app\helpers;

use app\models\all\Demographic;
use app\models\all\Examination;
use app\models\all\Hospitality;
use app\models\all\Patient;
use app\models\all\Question;
use app\models\generated\Customer;
use app\models\pure\File;
use app\models\pure\Speciality;

class DashboardHelper
{


    public static function getPatientsByDateJSON()
    {

        $models = Customer::findBySql("")->all();
        $result = [];
        foreach ($models as $model)
            $result[] = ["count" => $model->id, "date" => $model->date_created,
            ];

        return json_encode($result);

    }

    public static function getExaminationByDateJSON()
    {

        $models = Speciality::findBySql("")->all();
        $result = [];
        foreach ($models as $model)
            $result[] = ["count" => $model->id, "date" => $model->date_created,
            ];

        return json_encode($result);

    }

    public static function getQuestionByDateJSON()
    {
        $models = Speciality::findBySql("")->all();

        $result = [];
        foreach ($models as $model)
            $result[] = ["count" => $model->id, "date" => $model->date_created,
            ];

        return json_encode($result);

    }
}
